<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TipeKepribadian;
use App\Http\Controllers\Controller;

class TipeKepribadianController extends Controller
{
    use UploadTrait;
    
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "tipe";
        $pageName = "Daftar Tipe Kepribadiain";
        $tipekepribadian = TipeKepribadian::all();
        return view('admin.tipekepribadian.index', compact('pageActive','pageName','tipekepribadian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageActive = "Tambah Tipe Baru";
        $pageName = "Tambah Tipe Kepribadian";
        return view('admin.tipekepribadian.create', compact('pageName', 'pageActive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # form validasi
        $request->validate([
            'namatipe'              => 'required|string|max:70', 
            'keterangan_tipe'       => 'required|string',
            'julukan_tipe'          => 'required|string',
            'deskripsi_tipe'        => 'required|string',
            'arti_sukses'           => 'required|string',
            'saran_pengembangan'    => 'required|string',
            'kebahagiaan_tipe'      => 'required|string',
            'image_tipe'            => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        # create tipe kepribadian baru
        $tipekepribadian = new TipeKepribadian;
        $tipekepribadian->namatipe = $request->namatipe;
        $tipekepribadian->slug = Str::slug($request->namatipe);
        $tipekepribadian->keterangan_tipe = $request->keterangan_tipe;
        $tipekepribadian->julukan_tipe = $request->julukan_tipe;
        $tipekepribadian->deskripsi_tipe = $request->deskripsi_tipe;
        $tipekepribadian->arti_sukses = $request->arti_sukses;
        $tipekepribadian->saran_pengembangan = $request->saran_pengembangan;
        $tipekepribadian->kebahagiaan_tipe = $request->kebahagiaan_tipe;
        
        # Periksa apakah gambar Tipe telah diunggah
        if ($request->has('image_tipe')) {
            # Dapatkan file gambar
            $image = $request->file('image_tipe');
            # Buat nama gambar berdasarkan tipekepribadian dan tandai waktu saat ini
            $name = Str::slug($request->input('namatipe')).'_'.time();
            # Folder path
            $folder = '/uploads/TipeKepribadian/';
            # Buat jalur file tempat gambar akan disimpan [ jalur folder + nama file + ekstensi file]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            # Menghapus foto yang sudah ada dan menganti dengan yang baru
            if ($id->image != null) {
                $this->deleteOne($id->image);
            }
            # Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            # Setel jalur gambar profil pengguna di database ke filePath
            $tipekepribadian->image_tipe = $filePath;
        }
        # simpan data User pada Database
        $tipekepribadian->save();
        return redirect('tipekep')->with('success','Data Tipe Kepribadian berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipekep = TipeKepribadian::findOrFail($id);
        $pageActive = 'Edit Tipe Kepribadian';
        $pageName = 'Edit Tipe Kepribadian';
        return view('admin.tipekepribadian.edit', compact('tipekep','pageActive','pageName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        # form validasi
        $request->validate([
            'namatipe'              => 'required|string|max:70', 
            'keterangan_tipe'       => 'required|string',
            'julukan_tipe'          => 'required|string',
            'deskripsi_tipe'        => 'required|string',
            'arti_sukses'           => 'required|string',
            'saran_pengembangan'    => 'required|string',
            'kebahagiaan_tipe'      => 'required|string',
            'image_tipe'            => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        # Dapatkan tipekepribadian saat ini
        $tipekepribadian = TipeKepribadian::findOrFail($request->id);
        $tipekepribadian->namatipe = $request->input('namatipe');
        $tipekepribadian->slug = Str::slug($request->input('namatipe'));
        $tipekepribadian->keterangan_tipe = $request->input('keterangan_tipe');
        $tipekepribadian->julukan_tipe = $request->input('julukan_tipe');
        $tipekepribadian->deskripsi_tipe = $request->input('deskripsi_tipe');
        $tipekepribadian->arti_sukses = $request->input('arti_sukses');
        $tipekepribadian->saran_pengembangan = $request->input('saran_pengembangan');
        $tipekepribadian->kebahagiaan_tipe = $request->input('kebahagiaan_tipe');
        
        # Periksa apakah gambar tipekepribadian telah diungah
        if ($request->has('image_tipe')) {
            # Dapatkan file gambar
            $image = $request->file('image_tipe');
            # Buat nama gambar berdasarkan nama tipekepribadian dan stempel waktu saat ini
            $name = Str::slug($request->input('namatipe')).'_'.time();
            # Menetapkan folder path
            $folder = '/uploads/TipeKepribadian/';
            # Buat jalur file tempat gambar akan disimpan[ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            # menghapus foto yang sudah ada dan menganti dengan yang baru
            if ($tipekepribadian->image != null) {
                $this->deleteOne($tipekepribadian->image);
            }
            # Unggah gambar + memperbarui gambar
            $this->uploadOne($image, $folder, 'public', $name);
            # Setel jalur gambar profil tipekepribadian di database ke filePath
            $tipekepribadian->image_tipe = $filePath;
        }
        // simpan data User pada Database
        $tipekepribadian->save();
        return redirect('tipekep')->with('success','Data Tipe Kepribadian berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKepribadian $id)
    {
        $id->delete();
        return redirect()->route('tipekep.index')->with('success','Data Tipe Kepribadian berhasi dihapus');
    }
}
