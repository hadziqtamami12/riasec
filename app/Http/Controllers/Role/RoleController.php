<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\Database\Eloquent\Builder;
use App\Models\{Dimensi,ProgramStudi,TipeKepribadian, TestKepribadian, User};

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
        $totalPengujian = TestKepribadian::whereNotNull('finished_at')->count()
        /*  DB::table('program_studis')->selectRaw('SUM(jumlah_tes) as total_tes')->first() */;
        
        return view('admin.beranda', [
            // 'selected' => User::select('nim')->whereRelation('roles', 'roles.id', 3)->get()
            'selected' => User::select('nim')->whereHas('roles', function (Builder $query){
                $query->where('roles.id', 3); })->get()
            ->groupBy(function ($item, $key){ return substr($item->nim, 2,2); })
            ->sortKeys()->map(function($item, $key){ return 'Angkatan '.$key; }),
            'dimensi' => Dimensi::orderBy('id')->get()->pluck('keterangan')->toJson(), # untuk mengambil data keterangan dimensi
            'tipe' => $tipe->pluck('namatipe')->toJson(), # untuk mengambil data nama tipekepribadian
            'dominasi' => $tipe->pluck('tests_count')->toJson(), # untuk statistik kecenderungan kepribadian
            'prodi' => ProgramStudi::get()
        ],compact('pageName','totalPengujian'));
    }

    /** 
     * function untuk membentuk grafik pada setiap prodi, dengan menampilkan data dari hasil test yang dilakukan oleh pengguna
     * data yang ditampilkan meliputi nama prodi dan juga warna identitas dari program studi itu sendiri. 
     * Berdasarkan Angkatan
     */
    public function tipe(int $angkatan)
    {
        return response()->json([
            'prodi' =>  ProgramStudi::with(['statistics' => 
                function($query) use ($angkatan) { return $query->where('tahun', $angkatan); }])
                ->get()->map(function($item) use ($angkatan){
                    return(object)[
                        'id' => $item->id,
                        'tahun' =>  $angkatan,
                        'statistics' => $item->statistics->pluck('presentase'),
                        'jumlah_tes' => $item->statistics->isNotEmpty() ? $item->statistics->get(0)->total_used : 0,
                        'data_all' => $item
                    ];
                })
            ]);   
    }
}
