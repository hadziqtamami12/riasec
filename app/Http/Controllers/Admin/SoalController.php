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
        $daftarsoal = Soal::all(); # get data soal

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
     *  function insert digunakan untuk memasukan value baru pada table pernyataan 
     *  dimana fungsi ini berfungsi untuk multiple table antara table soal dan pernyataan
    */
    public static function insert(int $id, $statement) 
    {
        return Pernyataan::create([
            'pernyataan' => $statement,
            'dimensi_id' => $id
        ])->id;
    }

    /**
     * Store a newly created resource in storage.
     * 
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
        /**
         * Menambahkan pada tabel pernyataan berdasarkan function insert diatas
         * Bersamaan dengan value pernyataan yang dimasukan oleh admin
         */
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
        # get soal dengan relasi pernyataan didalamnya
        $daftarsoal = Soal::with('jawabA', 'jawabB')->find($id); 
        # membaca dimensi_id pada masing2 pernyataan untuk melihat pasangan dimensinya
        $dimensi = [
            $daftarsoal->jawabA->dimensi_id,
            $daftarsoal->jawabB->dimensi_id
        ];
        /**
         * var pasDimSelect digunakan untuk menampilkan dimensi_id yang terbaca dari pernyataan yang akan diedit
         * yang ditampilkan berupa pasangan dimensi pada form edit
         */
        $pasDimSelect = DimensiPasangan::whereIn('dimensiA', $dimensi)
        ->whereIn('dimensiB', $dimensi)->first()->id;
        /**
         * mengirim collection pada view soal
         * dan juga mengenalkan atribut pada table pasangan dimensi
         */
        return view('admin.soal.edit', [
            'dimensi' => DimensiPasangan::with(['dimA', 'dimB'])->get()
        ],compact('daftarsoal','pageName', 'pasDimSelect', 'id'));
    }

    /**
     * @param int $id
     * @param mixed $statement
     * @return mixed
     * function edit digunakan untuk mengubah value pada pernyataan berdasarkan id pada pernyataan tersebut
     * yang dimana didapatkan dari fungsi update dari soal
    */
    public static function edit(int $id, $statement, int $dimensi_id) 
    {
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

        $find = DimensiPasangan::find($request->get('dimensi')); # mencocokan pasangan dimensi pada soal
        $soal = Soal::find($id); # mencocokan id soal yang akan diubah
        /**
         * Update isi pernyataan dan pasangan dimensi
         * bersamaan dengan value yang dimasukan oleh admin
         */
        $a = self::edit($soal->pernyataanA, $request->get('a'), $find->dimensiA);
        $b = self::edit($soal->pernyataanB, $request->get('b'), $find->dimensiB);
        # mengubah value soal baru tanpa mengubah id pernyataan
        $soal->update([
            'soal'  => $request->soal
        ]);

        return redirect('soal')->with('success','Soal berhasil di perbarui');
    }

    /**
     * Hapus Soal
     *
     * @param App\Models\Soal $id
     */
    public function destroy(Soal $id)
    {
        # menghapus data soal dan juga pernyataan yang ada didalamnya 
        Pernyataan::whereIn('id', [$id->pernyataanA, $id->pernyataanB])->delete();
        $id->delete();
        return redirect('soal')->with('success','Soal berhasil di hapus');
    }
}
