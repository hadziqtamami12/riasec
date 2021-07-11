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
            'dimensi' => Dimensi::orderBy('id')->get()->pluck('keterangan')->toJson(), # untuk mengambil data keterangan dimensi
            'tipe' => $tipe->pluck('namatipe')->toJson(), # untuk mengambil data nama tipekepribadian
            'dominasi' => $tipe->pluck('tests_count')->toJson(), # untuk statistik kecenderungan kepribadian
            # function untuk membentuk grafik pada setiap prodi, dengan menampilkan data dari hasil test yang dilakukan oleh pengguna
            # data yang ditampilkan meliputi nama prodi dan juga warna identitas dari program studi itu sendiri. 
            'prodi' => ProgramStudi::with('statistics')->get()->map(function($item) { 
                return (object) [
                    'id' => $item->id,
                    'program_studi' => $item->program_studi,
                    'backgroundColor' => $item->backgroundColor,
                    'borderColor' => $item->borderColor,
                    'pointBorderColor' => $item->pointBorderColor,
                    'statistics' => $item->statistics->pluck('presentase')->toJson()
                ];
            })
        ],compact('pageName'));
    }
}
