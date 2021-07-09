<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{TipekepPartner, TipeKepribadian};
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PartnerTipeController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('role:admin');
    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Partner";
        $pageName = "Partner Alami Tipe Kepribadian";

        // $partneralami = TipekepPartner::with('tipekepribadian')->get();
        $partneralami = TipeKepribadian::with('partnerTipekeps.partner')->get();
        
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
        // cek setiap value array itu ada di table tipe kepribadian, berbeda dengan value tipekep_id, dan setiap value dalam array bersifat unik, tidak terduplikat
        $request->validate([
            'tipekep_id' => 'required',
            'partner_tipe' => 'required|array|min:1|max:3',
            'partner_tipe.*' => 'required|exists:App\Models\TipeKepribadian,id|different:tipekep_id|distinct'
        ]);

        return $this->autosave($request->tipekep_id, $request->partner, 'Partner Tipe berhasil ditambahkan');
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
     * @param  TipeKepribadian  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKepribadian $id)
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
     * @param  TipeKepribadian  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeKepribadian $id)
    {
        $request->validate([
            'partner_tipe' => 'required|array|min:1|max:3',
            'partner_tipe.*' => 'required|exists:App\Models\TipeKepribadian,id|different:tipekep_id|distinct'
        ]);

        return $this->autosave($id->id, $request->partner_tipe, 'Partner Tipe berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TipekepPartner  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipekepPartner $id)
    {
        $id->delete();
        return redirect()->route('partnertipe.index')->with('success','Partner Tipe berhasil dihapus');
    }

    /**
     * Joining Saved at Store and Update
     * 
     * @param  int $tipe
     * @param  array $partners
     * @param mixed $message
     * @return \Illuminate\Http\Response
     */
    private function autosave($tipe, $partners, $message)
    {
        // hapus yang sudah ada sebelumnya
        TipekepPartner::whereNotIn('partner_tipe', $partners)
        ->where('tipekep_id', $tipe)->delete();
        
        # cek tipekep_id 
        foreach ($partners as $partner){
            TipekepPartner::updateOrCreate([
                'tipekep_id' => $tipe,
                'partner_tipe' => $partner
            ]);
        }
        return redirect()->route('partnertipe.index')->with('success', $message);
    }
}
