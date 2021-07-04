<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramStudiController extends Controller
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
        $pageActive = "Prodi";
        $pageName = "Daftar Program Studi";
        $data = ProgramStudi::all();
        return view('admin.programstudi.index', compact('data','pageActive','pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageActive = "Program Studi";
        $pageName = "Tambah Program Studi";
        return view('admin.programstudi.create', compact('pageName','pageActive'));
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
            'program_studi' => 'required|string',
            'backgroundColor' => 'required|string',
            'borderColor' => 'required|string',
            'pointBorderColor' => 'required|string'
        ]);

        $request->request->add(['slug' => Str::slug($request->program_studi)]);

        ProgramStudi::create(
            $request->only(['program_studi', 'backgroundColor', 'borderColor', 'pointBorderColor', 'slug'])
        );

        // return response()->json($programstudi, 200);
        return redirect()->route('programstudi.index')->with('success','Program Studi Baru Berhasil ditambahkan');
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
    public function edit(ProgramStudi $id)
    {
        $data = $id;
        $pageName = "Edit Program Studi";
        return view('admin.programstudi.edit',compact('data','pageName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramStudi $id)
    {
        $request->validate([
            'program_studi' => 'required|string',
            'backgroundColor' => 'required|string',
            'borderColor' => 'required|string',
            'pointBorderColor' => 'required|string'
        ]);

        $request->request->add(['slug' => Str::slug($request->program_studi)]);

        $id->update(
            $request->only(['program_studi', 'backgroundColor', 'borderColor', 'pointBorderColor', 'slug'])
        );

        return redirect()->route('programstudi.index')->with('success','Daftar Program Studi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudi $id)
    {
        $id->delete();
        return redirect()->route('programstudi.index')->with('success','Program Studi Berhasi Dihapus');
    }
}
