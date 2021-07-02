<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Dimensi,ProgramStudi,TipeKepribadian};

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mengarahkan role user pada halaman khusus user
     */
    public function roleUser(){
        return view('apps.home');
    }

    /**
     * Mengarahkan role admin pada halaman khusus admin
     */
    public function roleAdmin(){
        #get relasi tabel test
        $tipe = TipeKepribadian::withCount('tests')->get();
        $pageName = "Recap Hasil Test Kepribadian";
        # get data hasil test kepribadian
        return view('admin.beranda', [
            'dimensi' => Dimensi::all()->pluck('keterangan')->toJson(),
            'tipe' => $tipe->pluck('namatipe')->toJson(),
            'dominasi' => $tipe->pluck('tests_count')->toJson(),
            'prodi' => ProgramStudi::all()
        ],compact('pageName'));
    }
}
