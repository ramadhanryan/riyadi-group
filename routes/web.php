<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    $user = DB::table('users')->where('username', $username)->first();

    if ($user && Hash::check($password, $user->password)) {
        Session::put('username', $user->username);
        Session::put('role', $user->role);
        return redirect('/dashboard')->with('success', "Selamat datang, $user->username");
    } else {
        return redirect('/home')->with('error', 'Username atau password salah.');
    }
});

// 🛡️ Lindungi dashboard dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = Session::get('role');
        return view('dashboard', ['role' => $role]);
    });
});

Route::post('/logout', function () {
    Session::flush();
    return redirect('/home')->with('success', 'Anda berhasil logout.');
})->name('logout'); // Tambahkan name ini