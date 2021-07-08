<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\{TipekepProfesi, TipeKepribadian};

class ProfesiTipeController extends Controller
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
        $pageActive = "Profesi";
        $pageName = "Saran Profesi Tipe Kepribadian";
        $saranprofesi = TipekepProfesi::with('tipekepribadian')->get();
        return view('admin.tipekepribadian.profesi.index', compact('pageActive','pageName','saranprofesi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekep = TipeKepribadian::all();
        $pageActive = "Saran Profesi Tipe Kepribadian";
        $pageName = "Tambah Saran Profesi";
        return view('admin.tipekepribadian.profesi.create', compact('tipekep','pageActive','pageName'));
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
            'profesi_tipe' => 'required|string'
        ]);

        TipekepProfesi::create($request->only(['tipekep_id', 'profesi_tipe']));
        return redirect()->route('profesitipe.index')->with('success','Saran profesi berhasil ditambahkan');
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
        $saranprofesi = TipekepProfesi::find($id);

        $pageActive = "Saran Profesi Tipe Kepribadian";
        $pageName = "Ubah Saran Profesi";

        $tipekep = TipeKepribadian::all();

        # mengirim collection pada view saranprofesi
        return view('admin.tipekepribadian.profesi.edit', compact('saranprofesi','pageActive','pageName','tipekep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipekepProfesi $id)
    {
        $request->validate([
            'tipekep_id' => 'required',
            'profesi_tipe' => 'required|string'
        ]);

        $id->update($request->only(['tipekep_id', 'profesi_tipe']));
        return redirect()->route('profesitipe.index')->with('success','Saran profesi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saranprofesi = TipekepProfesi::find($id);
        $saranprofesi->delete();
        return redirect()->route('profesitipe.index')->with('success','Saran profesi berhasil dihapus');
    }
}