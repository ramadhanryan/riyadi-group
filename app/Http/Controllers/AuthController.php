<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        // Hapus session
        Session::flush();

        // Logout user
        Auth::logout();

        // Redirect ke halaman login
        return redirect('/home')->with('success', 'Anda berhasil logout.');
    }
}
