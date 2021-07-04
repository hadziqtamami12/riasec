<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{TipekepKekurangan, TipeKepribadian};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KekuranganTipeController extends Controller
{
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
        $pageActive = "Kekurangan";
        $pageName = "Kekurangan Tipe Kepribadian";
        $kekurangantipe = TipekepKekurangan::with('tipekepribadian')->get();
        return view('admin.tipekepribadian.kekurangan.index', compact('pageActive','pageName','kekurangantipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekep = TipeKepribadian::all();
        $pageActive = "Kekurangan Tipe Kepribadian";
        $pageName = "Tambah Kekurangan Tipe Kepribadian";
        return view('admin.tipekepribadian.kekurangan.create', compact('tipekep','pageName','pageActive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipekep_id' => 'required',
            'kekurangan_tipe' => 'required|string'
        ]);

        TipekepKekurangan::create($request->get(['tipekep_id', 'kekurangan_tipe']));
        return redirect()->route('kekurangantipe.index')->with('success','Kekurangan Tipe Kepribadian berhasil ditambahkan');
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
    public function edit(TipekepKekurangan $id)
    {
        $kekurangantipe = $id;

        $pageActive = "Kekurangan Tipe Kepribadian";
        $pageName = "Ubah Kekurangan Tipe Kepribadian";

        $tipekep = TipeKepribadian::all();
        
        # mengirim collection pada view kekurangan
        return view('admin.tipekepribadian.kekurangan.edit', compact('kekurangantipe','tipekep','pageName','pageActive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipekepKekurangan $id)
    {
        $request->validate([
            'tipekep_id' => 'required',
            'kekurangan_tipe' => 'required|string'
        ]);

        $id->update($request->only(['tipekep_id', 'kekurangan_tipe']));
        return redirect()->route('kekurangantipe.index')->with('success','Kekurangan Tipe berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipekepKekurangan $id)
    {
        $id->delete();
        return redirect()->route('kekurangantipe.index')->with('success','Kekurangan Tipe berhasil dihapus');
    }
}
