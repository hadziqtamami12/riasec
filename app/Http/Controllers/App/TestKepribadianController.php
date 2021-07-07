<?php

namespace App\Http\Controllers\App;

// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, TipeKepribadian, DimensiPasangan, Presentase, Dimensi, Soal, Statistic, ProgramStudi};

class TestKepribadianController extends Controller
{
    use TestTrait;
        /**
     * Mulai sesi test baru
     * [Menampilkan Response Soal Random ]
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function start(){

        # Buat ID Test baru & ambil Soal(dari Traits)

        return response()->json($this->createSoal() ,201);
    }

    /**
     * Mulai sesi test baru
     * [Menampilkan view Soal ]
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function startTest()
    {
        # direct response json to view
        $tests = $this->createSoal();
        $dimensis = Dimensi::select('id', DB::raw("0 as value"))->get()->toJson();

        return view('apps.soal', compact('tests', 'dimensis'));
    }

    /**
     * Selesai sesi
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function finish($id, Request $request){

        # mengecek sesi test
        $test = TestKepribadian::where('user_id', $request->user()->id)
        ->where('finished_at', NULL)
        ->find($id);

        if (empty($test))
            return response()->json(['errors' => 'ID tes tidak ditemukan'], 419);

        # validasi inputan hasil persentase
        $request->validate([
            'present' => 'array|size:'. Dimensi::count(), # total yang harus dikirim
            'present.*' => 'array|size:2',  # setiap isian harus ada 2 field
            'present.*.id' => 'integer|distinct|exists:App\Models\Dimensi,id',
            'present.*.value' => 'integer|between:0,100' # tidak lebih dari jumlah soal yang ada
        ]);

        $prodi = ProgramStudi::find($request->user()->programstudi_id);

        $columnID = array_column($request->get('present'), 'id');
        $hasil = '';
        $insert = [];

        foreach(DimensiPasangan::with(['dimA', 'dimB'])->get() as $dimensi) {

            # mendapatkan hasil presentase masing-masing dimensi / 0
            $kiri = $request->get('present')[array_search($dimensi->dimensiA, $columnID)]['value'] ?? 0;
            $kanan = $request->get('present')[array_search($dimensi->dimensiB, $columnID)]['value'] ?? 0;

            // # cari apakah sisi sebelah kiri lebih besar dari kanan atau sebaliknya
            $hasil .= $kiri > $kanan ? $dimensi->dimA->code : $dimensi->dimB->code;

            // # validasi total wajib 100 persen
            // if ($kiri + $kanan !== 100) return response()->json(['errors' => 'Hasil tidak seimbang'], 419);
            $left = $this->parsePresentasi($kiri, $kanan);
            $right = $this->parsePresentasi($kanan, $kiri);
            
            # insert hasil presentase pada masing-masing dimensi
            $insert[] = ['dimensi_id' => $dimensi->dimensiA, 'test_id' => $id, 'totalpresent' => $left];
            $insert[] = ['dimensi_id' => $dimensi->dimensiB, 'test_id' => $id, 'totalpresent' => $right];

            // Masukkan Ke Statistik
            $this->fillStatistic($prodi, $dimensi->dimensiA, $left);
            $this->fillStatistic($prodi, $dimensi->dimensiB, $right);
        }

        # cari tipe kepribadian
        $tipe = TipeKepribadian::where('namatipe', $hasil)->first();

        # return $insert;
        # insert hasil Presentase dimensi
        Presentase::insert($insert);

        # selesaikan tes & output Tipe Keprtibadian
        $test->update([
            'finished_at' => now()->toDateTimeString(),
            'tipekep_id' => $tipe->id
        ]);

        // Tambahkan total test dalam prodi
        $prodi->update(['jumlah_tes' => ++$prodi->jumlah_tes]);

        return response()->json($tipe, 201);
    }

    /**
     * View Hasil Kepribadian
     *
     *
    */
    public function hasil($id){
        
        return view('apps.hasil', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())
            ->with(['tipe' => function($q) {
                return $q->with('ciriTipekeps', 'kelebihanTipekeps', 'kekuranganTipekeps', 'profesiTipekeps', 'partnerTipekeps.partner');
            }])->with('presentases')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get(),
            'id' => $id
        ]);
    }

    /**
     * [Fungsi Bersama] Parsing Persentase
     */
    private function parsePresentasi($validated, $other)
    {
        return ($validated / ($validated + $other)) * 100;
    }


    /**
     * Isi Statistik
     */
    private function fillStatistic(ProgramStudi $prodi, $dimensi, $presentase)
    {
        $check = Statistic::where('program_studi_id', $prodi->id)
        ->where('dimensi_id', $dimensi)->first();

        $used = $check ? 1 + $check->total_used : 1;

        return Statistic::updateOrCreate([
            'program_studi_id' => $prodi->id,
            'dimensi_id' => $dimensi
        ], [
            'presentase' => $check ? (
                ($check->presentase * $check->total_used)
                + $presentase)
                / $used : $presentase,
            'total_used' => $used
        ]);
    }

    /**
     * Cetak Hasil menjasi PDF
     */ 
    public function printPDF($id)
    {   
        $pdf = PDF::loadView('export.print', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())
            ->with('presentases', 'tipe')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get()
        ]);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('Test-Kerpibadian.pdf');
    }
}
