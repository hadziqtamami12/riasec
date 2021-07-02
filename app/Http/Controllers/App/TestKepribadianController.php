<?php

namespace App\Http\Controllers\App;

use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, TipeKepribadian, DimensiPasangan, Presentase, Dimensi, Soal};

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
        if (empty(TestKepribadian::where('user_id', $request->user()->id)
        ->where('finished_at', NULL)
        ->find($id))) return response()->json(['errors' => 'ID tes tidak ditemukan'], 419);

        # validasi inputan hasil persentase
        $request->validate([
            'present' => 'array|size:'. Dimensi::count(), # total yang harus dikirim
            'present.*' => 'array|size:2',  # setiap isian harus ada 2 field
            'present.*.id' => 'integer|distinct|exists:App\Models\Dimensi,id',
            'present.*.value' => 'integer|between:0,100' # tidak lebih dari jumlah soal yang ada
        ]);

        $columnID = array_column($request->get('present'), 'id');
        $hasil = '';
        $insert = [];

        foreach(DimensiPasangan::with(['dimA', 'dimB'])->get() as $dimensi) {

            # mendapatkan hasil presentase masing-masing dimensi
            $kiri = $request->get('present')[array_search($dimensi->dimensiA, $columnID)];
            $kanan = $request->get('present')[array_search($dimensi->dimensiB, $columnID)];

            // # cari apakah sisi sebelah kiri lebih besar dari kanan atau sebaliknya
            $hasil .= $kiri['value'] > $kanan['value'] ? $dimensi->dimA->code : $dimensi->dimB->code;

            // # validasi total wajib 100 persen
            // if ($kiri['value'] + $kanan['value'] !== 100) return response()->json(['errors' => 'Hasil tidak seimbang'], 419);
            
            # insert hasil presentase pada masing-masing dimensi
            $insert[] = ['dimensi_id' => $dimensi->dimensiA, 'test_id' => $id, 'totalpresent' => ($kiri['value']/ ($kiri['value'] + $kanan['value'])) * 100 ];
            $insert[] = ['dimensi_id' => $dimensi->dimensiB, 'test_id' => $id, 'totalpresent' => ($kanan['value']/ ($kiri['value'] + $kanan['value'])) * 100 ];
        }

        # cari tipe kepribadian
        $tipe = TipeKepribadian::where('namatipe', $hasil)->first();

        # return $insert;
        # insert hasil Presentase dimensi
        Presentase::insert($insert);

        # selesaikan tes & output Tipe Keprtibadian
        TestKepribadian::where('id', $id)->update([
            'finished_at' => now()->toDateTimeString(),
            'tipekep_id' => $tipe->id
        ]);

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
                return $q->with('ciriTipekeps', 'kelebihanTipekeps', 'kekuranganTipekeps', 'profesiTipekeps', 'partnerTipekeps');
            }])->with('presentases')->findOrFail($id),
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get()
        ]);
    }
}
