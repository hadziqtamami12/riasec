<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{DimensiPasangan,Pernyataan, Soal};

class SoalController extends Controller
{
    /**
     * Tampilkan data Soal dan Pernyataan
    */
    public function index() {
        $pageActive = "Soal";
        $pageName = "Daftar Soal & Jawaban";
        $daftarsoal = Soal::all();
        // return response()->json($daftarsoal, 200);
        return view('admin.soal.index', compact('pageName','daftarsoal', 'pageActive'));
    }

    /**
     * Tampilkan form tambah Soal dan Pernyataan
    */
    public function view() 
    {
        $pageName = "Tambah Soal & Jawaban";
        return view('admin.soal.create', [
            'dimensi' => DimensiPasangan::with(['dimA', 'dimB'])->get()
        ],compact('pageName'));
    }

        /**
     * @param int $id
     * @param mixed $statement
     * @return mixed
    */
    public static function insert(int $id, $statement) 
    {
        # Memasukan data baru pada Table Pernyataan
        return Pernyataan::create([
            'pernyataan' => $statement,
            'dimensi_id' => $id
        ])->id;
    }

    /**
     * Form tambah Pernyataan
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
    */
    public function save(Request $request) 
    {
        # validasi dimensi, apakah dimensi tersebut tersedia pada tabel sebelumnya
        $request->validate([
            'dimensi' => 'required|integer|exists:'.DimensiPasangan::class.',id',
            'a'       => 'required',
            'b'       => 'required',
            'soal'    => 'required|string'
        ]);
        # mencari dimensi pada pada tabel berdasarkan masukan dari admin
        $find = DimensiPasangan::find($request->get('dimensi'));

        # menambahkan pada tabel pernyataan berdasarkan fungsi diatas,
        # bersamaan dengan value pernyataan yang dimasukan oleh admin
        $a = self::insert($find->dimensiA, $request->get('a'));
        $b = self::insert($find->dimensiB, $request->get('b'));
        
        # menambahkan pada tabel soal dengan berdasarkan pasangan dimensi yang dipilih
        Soal::create([
            'soal'        => $request->soal,
            'pernyataanA' => $a,
            'pernyataanB' => $b
        ]);

        return response()->json('success', 201);
    }

    /**
     * Tampilkan form tambah Soal dan Pernyataan
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    */
    public function viewedit($id)
    {
        $pageName = "Edit Soal Baru";
        $daftarsoal = Soal::with('jawabA', 'jawabB')->find($id);

        # membaca dimensi_id pada masing2 pernyataan untuk melihat pasangan dimensinya
        $dimensi = [
            $daftarsoal->jawabA->dimensi_id,
            $daftarsoal->jawabB->dimensi_id
        ];

        # pasDimSelect untuk menampilkan dimensi_id yang terbaca dari penyataan yang akan diedit
        # dan ditampilkan berupa pasangan dimensi
        $pasDimSelect = DimensiPasangan::whereIn('dimensiA', $dimensi)
        ->whereIn('dimensiB', $dimensi)->first()->id;

        return view('admin.soal.edit', [
            'dimensi' => DimensiPasangan::with(['dimA', 'dimB'])->get() # mengenalkan atribut pada tabel pasangan dimensi
        ],compact('daftarsoal','pageName', 'pasDimSelect', 'id'));
    }

    /**
     * @param int $id
     * @param mixed $statement
     * @return mixed
    */
    public static function edit(int $id, $statement, int $dimensi_id) 
    {
        # Mengubah data pernyataan pada Table Pernyataan didapat dari fungsi update
        return Pernyataan::find($id)->update([
            'pernyataan' => $statement, # self::edit untuk mengetahui value yang dubah dari setiap pernyataan
            'dimensi_id' => $dimensi_id # untuk mengetahui id dimensi dari proses select pasangan dimensi
        ]);
    }

    /**
     * Form Ubah Pernyataan
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, $id)
    {
        # validasi dimensi, apakah dimensi tersebut tersedia pada tabel sebelumnya
        $request->validate([
            'dimensi' => 'required|integer|exists:'.DimensiPasangan::class.',id',
            'a'       => 'required',
            'b'       => 'required',
            'soal'    => 'required|string'
        ]);

        $find = DimensiPasangan::find($request->get('dimensi')); # memperbarui Pasangan Dimensi pada Soal
        $soal = Soal::find($id); # mencocokan id soal yang akan diubah
        
        # update isi pernyataan dan pasangan dimensi
        # bersamaan dengan value yang dimasukan oleh admin
        $a = self::edit($soal->pernyataanA, $request->get('a'), $find->dimensiA);
        $b = self::edit($soal->pernyataanB, $request->get('b'), $find->dimensiB);

        # mengubah value soal baru tanpa mengubah id pernyataan
        $soal->update([
            'soal'        => $request->soal
        ]);

        return redirect('soal')->with('success','Soal berhasil di perbarui');

        // return response()->json('success', 201);
    }

    /**
     * Hapus Soal
     *
     * @param App\Models\Soal $id
     */
    public function destroy(Soal $id)
    {
        Pernyataan::whereIn('id', [$id->pernyataanA, $id->pernyataanB])->delete(); # hapus data berdasarkan pernyataan pada soal
        $id->delete();
        return redirect('soal')->with('success','Soal berhasil di hapus');
        // return response()->json('success', 204);
    }
}
