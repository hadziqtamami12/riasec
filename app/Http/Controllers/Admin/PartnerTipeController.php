<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{TipekepPartner, TipeKepribadian};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PartnerTipeController extends Controller
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
        $pageActive = "Partner";
        $pageName = "Partner Alami Tipe Kepribadian";

        $partneralami = TipekepPartner::with('tipekepribadian')->get();

        return view('admin.tipekepribadian.partner.index', compact('pageActive','pageName','partneralami'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipekep = TipeKepribadian::all();

        $pageActive = "Partner Alami Tipe Kepribadian";
        $pageName = "Tambah Partner Tipe";
        return view('admin.tipekepribadian.partner.create', compact('tipekep','pageActive','pageName'));
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
            'partner_tipe' => 'required'
        ]);
        
        TipekepPartner::create($request->only(['tipekep_id', 'partner_tipe']));
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil ditambahkan');
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
    public function edit(TipekepPartner $id)
    {
        $partneralami = $id;

        $pageActive = "Partner Alami Tipe Kepribadian";
        $pageName = "Ubah Partner Tipe";

        $tipekep = TipeKepribadian::all();

        $tipe_select = DB::table('tipe_kepribadians')->find($partneralami->tipekep_id);

        # mengirim collection pada view parner
        return view('admin.tipekepribadian.partner.edit', compact('partneralami','pageName','pageActive','tipekep', 'tipe_select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipekepPartner $id)
    {
        $request->validate([
            'tipekep_id' => 'required',
            'partner_tipe' => 'required'
        ]);
        
        $id->update($request->only(['tipekep_id', 'partner_tipe']));
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipekepPartner $id)
    {
        $id->delete();
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil dihapus');
    }
}
