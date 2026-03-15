<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman form login
    public function index()
    {
        return view('auth.login'); 
    }

    // Proses validasi login
    public function proses(Request $request)
    {
        // dd($request);
        // Validasi input tidak boleh kosong
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Cari user di database berdasarkan username
        // Asumsi nama tabelnya 'user'
        $user = DB::table('user')->where('username', $request->username)->first();

        if ($user) {
            // Re-create password hash gaya CI lama (SHA256 + Salt)
            $salt = $user->salt ?? '';
            $hashedpw = hash('sha256', $request->password). $salt;
            // Jika password cocok
            if ($hashedpw === $user->pass.$salt) {

            
                
                // Daftarkan session login ke Laravel menggunakan ID User
                // Pastikan Model User kamu sudah diset primary key-nya ke 'id_user'
                Auth::loginUsingId($user->id_user);

                // Arahkan ke halaman sesuai level/departemen
                switch ($user->level) {
                    case 'admin':
                        return redirect('/admin/list');
                    case 'produk':
                        return redirect('/produk/list');
                    case 'hrd':
                        return redirect('/hrd/loker');
                    default:
                        // Jika level tidak dikenali
                        Auth::logout();
                        return back()->with('login_failed', 'Akses level tidak valid.');
                }
            }
        }

        // Jika user tidak ada atau password salah
        return back()->with('login_failed', '<strong>Username Atau Password Anda Salah</strong>');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}