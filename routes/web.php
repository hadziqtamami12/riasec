<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Auth\AcountAuthController;
use App\Http\Controllers\App\{TestKepribadianController, ArtikelTipeController};
use App\Http\Controllers\Auth\{UserAuthController, ProfileController, RecoveryController};
use App\Http\Controllers\Admin\{CiriTipeController, SoalController, PartnerTipeController, ProfesiTipeController,KelebihanTipeController, KekuranganTipeController, TipeKepribadianController, ProgramStudiController};

Route::get('/', function () {
    return view('welcome');
});

/*
    ===============================
			Middleware Guest
	===============================
*/
Route::middleware(['guest'])->group(function () {
    Route::get('login', [UserAuthController::class, 'login'])->name('formlogin');
    Route::get('register', [UserAuthController::class, 'register'])->name('formregister');
    Route::post('login', [UserAuthController::class, 'postLogin'])->name('auth.check');
    Route::post('register',[UserAuthController::class, 'postRegister'])->name('auth.create');
});

/*
    ===============================
			Middleware AUTH
	===============================
*/
Route::middleware(['auth'])->group(function () {

    # auth proses 
    Route::get('homecontroller',[HomeController::class,'index']);
    Route::post('logout',[UserAuthController::class,'signOut'])->name('logout');
    Route::get('admin', [RoleController::class, 'roleAdmin'])->name('roleAdmin')->middleware('role:admin');
    Route::get('home', [RoleController::class, 'roleUser'])->name('roleUser')->middleware('role:user');
    
    // todo : profile
    Route::get('profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::post('setting-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    
    // todo : change password
    Route::get('change-password',[RecoveryController::class,'changePassword'])->name('password.edit');
    Route::patch('password',[RecoveryController::class,'updatePassword'])->name('password.update');
    
    // todo : session test
    Route::get('test',[TestKepribadianController::class, 'startTest'])->name('startTest');
    Route::post('finish/{id}', [TestKepribadianController::class, 'finish'])->name('finishTest'); # simpan hasil tes dan prentase dimensi
    Route::get('hasil/{id}', [TestKepribadianController::class, 'hasil'])->name('hasil');

/*
    ===============================
			Session User
	===============================
*/
    Route::group(['middleware' => 'role:user'], function() {

        Route::get('tipekepribadian', [ArtikelTipeController::class, 'artikel'])->name('tipekepribadian');
        Route::get('/artikel/{tipe}', [ArtikelTipeController::class, 'readmore'])->name('artikel');
        Route::view('/contact', 'apps.contact')->name('contact');
        # print hasil pdf
        Route::get('pdf/{id}', [TestKepribadianController::class,'printPDF'])->name('cetak');

    }); # role 'user'


/*
    ===============================
			Session Admin
	===============================
*/
    Route::group(['middleware' => 'role:admin'], function() {
    
        // todo : Session Manage Account User
        Route::get('account',[AcountAuthController::class,'index'])->name('account.index'); # view Semua Pengguna
        Route::get('account/insert_user', [AcountAuthController::class,'createUser'])->name('account.createUser'); # view form create
        Route::get('account/insert_admin', [AcountAuthController::class,'createAdmin'])->name('account.createAdmin'); # view form create
        Route::post('account/user', [AcountAuthController::class,'storeUser'])->name('account.storeUser'); # tambah data baru Pengguna via admin
        Route::post('account/admin', [AcountAuthController::class,'storeAdmin'])->name('account.storeAdmin'); # tambah data baru Pengguna via admin
        Route::get('account/{id}/edit',[AcountAuthController::class,'edit'])->name('account.edit'); # view form edit
        Route::patch('account/{id}', [AcountAuthController::class, 'update'])->name('account.update'); # update data Pengguna via admin
        Route::get('account/{id}',[AcountAuthController::class,'show'])->name('account.show'); # view show
        Route::delete('account/{id}',[AcountAuthController::class,'destroy'])->name('account.destroy'); # delete data Pengguna via admin
    
        // todo : Session CRUD Tipekepribadian
        Route::get('tipekep',[TipeKepribadianController::class,'index'])->name('tipekep.index'); # view all tipe kerpibadian
        Route::get('tipekep/insert', [TipeKepribadianController::class,'create'])->name('tipekep.create'); # view form create
        Route::get('tipekep/{id}/edit',[TipeKepribadianController::class,'edit'])->name('tipekep.edit'); # view form edit
        Route::get('tipekep/{id}',[TipeKepribadianController::class,'show'])->name('tipekep.show'); # view show
        Route::post('tipekep', [TipeKepribadianController::class,'store'])->name('tipekep.store'); # tambah data baru tipekepribadian
        Route::put('tipekep/{id}', [TipeKepribadianController::class, 'update'])->name('tipekep.update'); # update data tipekepribadian
        Route::delete('tipekep/{id}',[TipeKepribadianController::class,'destroy'])->name('tipekep.destroy'); # delete data tipekepribadian
            
        // todo : Session Tambahan Ciri Kepribadian
        Route::resource('ciritipe', CiriTipeController::class)->except(['show']);
        
        // todo : Session Tambahan Kelebihan Kepribadian
        Route::resource('kelebihantipe', KelebihanTipeController::class)->except(['show']);
        
        // todo : Session Tambahan Kekurangan Kepribadian
        Route::resource('kekurangantipe',KekuranganTipeController::class)->except(['show']);
            
        // todo : Session Tambahan Profesi Kepribadian
        Route::resource('profesitipe', ProfesiTipeController::class)->except(['show']);
        
        // todo : Session Tambahan Partner Kepribadian
        Route::resource('partnertipe', PartnerTipeController::class)->except(['show']);
        
        // todo : Session CRUD Program Studi
        Route::resource('programstudi', ProgramStudiController::class)->except(['show']);

        // todo : Session CRUD Soal & Jawaban
        Route::get('soal', [SoalController::class,'index'])->name('soal.index'); # view index
        Route::get('soal/insert', [SoalController::class, 'view'])->name('soal.create'); # view create form
        Route::get('soal/{id}/edit', [SoalController::class, 'viewedit'])->name('soal.edit'); # view edit form
    
    }); #  'middleware' => 'role:admin'

});


/*
    ===============================
        Session Verify Email
	===============================
*/
Route::get('dashboard', [UserAuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']); # opsi diganti pada get role user
Route::get('account/verify/{token}', [UserAuthController::class, 'verifyAccount'])->name('user.verify');