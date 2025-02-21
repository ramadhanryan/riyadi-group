<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session 'username' ada
        if (!Session::has('username')) {
            return redirect('/home')->with('error', 'Silakan login terlebih dahulu.');
        }

         // Debugging: Tampilkan session yang ada
    \Log::info('Middleware: Session username = ' . Session::get('username'));

        return $next($request);
    }
}