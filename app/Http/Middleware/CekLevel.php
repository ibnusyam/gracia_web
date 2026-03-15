<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$levels
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        // Pastikan user sudah login dulu
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah level user yang sedang login ada di dalam daftar level yang diizinkan
        if (in_array(Auth::user()->level, $levels)) {
            return $next($request); // Silakan masuk
        }

        // Jika level tidak cocok, tendang ke halaman 403 (Akses Ditolak) atau ke dashboard bawaan
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        // atau bisa juga: return redirect('/home');
    }
}