<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Role,User};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Hash, Session, Mail, DB};

class UserAuthController extends Controller
{
    # mengarahkan pada form login
    public function login()
    {
        return view('auth.login');
    }

    # mengarahkan pada form register
    public function register()
    {
        $programstudi = DB::table('program_studis')
        ->select('id','program_studi')
        ->get();
        return view('auth.register', compact('programstudi'));
    }

    
    # register new user with verfikasi email
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|between:2,100',
            'email' => 'required|email|string|max:150|unique:users',
            'password' => 'required|string|confirmed|min:8|max:12',
            'nim' => 'required|string|max:40',
            'programstudi_id' =>'required',
        ]);
        # create account
        $check = User::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'nim' => $request->nim,
            'programstudi_id' => $request->programstudi_id,
        ]);
        # default role = user
        $check->roles()->attach(Role::where('name', 'user')->first());

        // # opsi verifikasi email
        // $token = Str::random(64); #create token
        
        // UserVerify::create([
        //     'user_id' => $createUser->id,
        //     'token' => $token
        // ]);

        // # kirim email verifikasi pada pengguna
        // Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Email Verification Mail');
        // });

        return redirect()->intended('/login')->with('success','Anda telah berhasil terdaftar');
    }

    # auth check user akun login
    public function postLogin(Request $request)
    {
        # validasi email, password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        # cek auth pengguna dengan melihat Role milik pengguna masing-masing
        if (Auth::attempt($credentials)) {
            return redirect('homecontroller')
                        ->with('success','Selamat Datang di Job Placement Center Poliwangi');
        }else{
            return back()->with('fail', 'Silakan Cek Kembali Email dan KataSandi anda');
        }
        
    }

    # User SignOut
    public function signOut() 
    {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    // public function verifyAccount($token)
    // {
    //     $verifyUser = UserVerify::where('token', $token)->first();
    //     $message = 'Maaf email Anda tidak dapat diidentifikasi.';

    //     if(!is_null($verifyUser) ){

    //         $user = $verifyUser->user;

    //         if(!$user->is_email_verified) {
    //             $verifyUser->user->is_email_verified = 1;
    //             $verifyUser->user->save();
    //             $message = "Email Anda telah diverifikasi. Anda sekarang dapat masuk.";
    //         } else {
    //             $message = "Email Anda sudah diverifikasi. Anda sekarang dapat masuk.";
    //         }
    //     }
    //     return redirect()->route('login')->with('message', $message);
    // }
}

// if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
//     // The user is being remembered...
// }