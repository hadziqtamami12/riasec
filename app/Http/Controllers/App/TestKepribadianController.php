<?php

namespace App\Http\Controllers\App;

use Barryvdh\DomPDF\Facade as PDF;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, TipeKepribadian, DimensiPasangan, Presentase, Dimensi, Soal, Jawab, Statistic, ProgramStudi};

class TestKepribadianController extends Controller
{
    use TestTrait;
    /**
     * Mulai sesi test baru
     * [ Menampilkan Response Soal Random ]
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function start(){
        # Buat ID Test baru & ambil Soal(dari Traits)
        return response()->json($this->createSoal() ,201);
    }

    /**
     * Mulai sesi test baru
     * [ Menampilkan view Soal ]
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function startTest()
    {
        # Direct response json to view, buat id_test baru & ambil data soal(dari Trait)
        $tests = $this->createSoal();
        return view('apps.soal', compact('tests'));
    }

    /**
     * Selesai sesi
     * @return void|\Illuminate\Http\JsonResponse
    */
    public function finish($id, Request $request){     
        
        $hasil = DB::table("jawabs")
	            ->select(DB::raw("jawaban, COUNT(jawaban) as jumlah"))
                        ->where('nim', $id)
                        ->where('jawaban', 'not like', "%-%")
                        ->groupBy('jawaban')
                        ->orderBy('jumlah', 'desc')
                        ->latest()
                        ->first();

        // dd($hasil);

                        
        $karakter_id = TipeKepribadian::where('namatipe', 'like', '%' . $hasil->jawaban . '%')->first();
        $update_karakter = TestKepribadian::where('user_id', Auth::user()->id)->first();
        $update_karakter->tipekep_id = $karakter_id->id;
        $update_karakter->update();

        return redirect('hasil/'.$update_karakter->id);

    }

    public function jawab(Request $request){     
        
        $this->validate($request,[
            'soal_id' => 'required',
            'nim' => 'required',
            'jawaban' => 'required',
        ]);

        $jawab = new Jawab();
        $jawab->nim = $request->nim;
        $jawab->soal_id = $request->soal_id;
        $jawab->jawaban = $request->jawaban;
        $jawab->save();

        return response()->json(['message' => 'task was successful']);

    }

    /**
     * [Fungsi Bersama] Parsing Persentase
     */
    private function parsePresentasi($validated, $other): int
    {
        return ($validated / ($validated + $other)) * 100;
    }


    /**
     * Function fillStatistic digunakan untuk mendapatkan rekapitulasi hasil test dari pengguna yang digabungkan dengan data pengguna lain dalam prodi yang sama
     * Dimana data yang direcord terdiri dari programstudi dan presentase yang didapatkan setiap dimensi 
     * Fungsi ini dibuat tersendiri untuk mencegah duplikasi pembuatan, dan membuat code lebih reliable
     */
    private function fillStatistic(ProgramStudi $prodi, int $dimensi, int $presentase, int $tahun): Statistic
    {
        $check = Statistic::where('program_studi_id', $prodi->id)
        ->where('tahun', $tahun)
        ->where('dimensi_id', $dimensi)->first();

        $used = $check ? 1 + $check->total_used : 1;

        return Statistic::updateOrCreate([
            'program_studi_id' => $prodi->id,
            'dimensi_id' => $dimensi,
            'tahun' => $tahun
        ], [
            'presentase' => $check ? (
                ($check->presentase * $check->total_used)
                + $presentase)
                / $used : $presentase,
            'total_used' => $used
        ]);
    }

    /**
     * View Hasil Kepribadian
    */
    public function hasil($id){
        # mengirim collection pada view hasil
        return view('apps.hasil', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())
            ->with(['tipe' => function($q) {
                return $q->with('ciriTipekeps', 'kelebihanTipekeps', 'kekuranganTipekeps', 'profesiTipekeps', 'partnerTipekeps.partner');
            }])->with('presentases')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get(),
            'id' => $id
        ]);
    }
        # nested data untuk mengambil value

    /**
     * Cetak Hasil menjadi PDF
     */ 
    public function printPDF($id)
    {   
        $pdf = PDF::loadView('export.print', [
            'hasil' => TestKepribadian::where('user_id', Auth::id())
            ->with('presentases', 'tipe')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get()
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('Test-Kerpibadian.pdf');
    }
}
