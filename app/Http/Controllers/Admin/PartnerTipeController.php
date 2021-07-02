<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TipekepPartner;
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
        $tipekep = DB::table('tipe_kepribadians')
        ->select('id','namatipe')
        ->get();

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
        
        TipekepPartner::create($request->all());
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
    public function edit($id)
    {
        $partneralami = TipekepPartner::find($id);

        $pageActive = "Partner Alami Tipe Kepribadian";
        $pageName = "Ubah Partner Tipe";

        $tipekep = DB::table('tipe_kepribadians')
        ->select('id','namatipe')
        ->get();

        # mengirim collection pada view parner
        return view('admin.tipekepribadian.partner.edit', compact('partneralami','pageName','pageActive','tipekep'));
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
        $request->validate([
            'tipekep_id' => 'required',
            'partner_tipe' => 'required'
        ]);
        
        $partneralami = TipekepPartner::find($id);
        $partneralami->update($request->all());
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partneralami = TipekepPartner::find($id);
        $partneralami->delete();
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil dihapus');
    }
}
