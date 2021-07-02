<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * mengarahkan pengguna pada akses tampilan
     * sesuai dengan role masing-masing
     */
    public function index(Request $request)
    {
        # Role User
        if ($request->user()->hasRole('user')) {
            return redirect('home');
        }

        # Role Admin
        if ($request->user()->hasRole('admin')){
            return redirect('admin');
        }
    }
}
