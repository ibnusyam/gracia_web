<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // --- 1. Tampilkan Daftar User ---
    public function index()
    {
        $users = User::orderBy('id_user', 'desc')->get();
        return view('auth.admin.user.index', compact('users'));
    }

    // --- 2. Tampilkan Form Tambah User ---
    public function create()
    {
        return view('auth.admin.user.create');
    }

    // --- 3. Proses Simpan User Baru ---
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'password' => 'required|min:5',
            'level'    => 'required'
        ]);

        User::create([
            'username' => $request->username,
            // Simpan password ke kolom 'pass'
            'pass'     => Hash::make($request->password), 
            'level'    => $request->level,
            // Isi kolom 'salt' dengan 15 karakter acak agar MySQL tidak protes
            'salt'     => Str::random(15), 
        ]);

        return redirect('/admin/list')->with('success', 'Akun User berhasil ditambahkan!');
    }

    // --- 4. Tampilkan Form Edit ---
public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.admin.user.edit', compact('user'));
    }

    // --- 5. Proses Update User ---
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:user,username,' . $id . ',id_user',
            'level'    => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'level'    => $request->level,
        ];

        // Jika admin mengisi kolom password baru, maka update 'pass' dengan SHA256
        if ($request->filled('password')) {
            $salt = Str::random(15);
            $data['pass'] = hash('sha256', $request->password);
            $data['salt'] = $salt; 
        }

        $user->update($data);

        return redirect('/admin/list')->with('success', 'Data User berhasil diperbarui!');
    }

    // --- 6. Proses Delete User ---
    public function delete($id)
    {
        $user = User::findOrFail($id);
        
        // Proteksi: Mencegah admin menghapus dirinya sendiri
        if (auth()->user()->id_user == $id) {
            return redirect('/admin/list')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri saat sedang login!');
        }

        $user->delete();

        return redirect('/admin/list')->with('success', 'Akun User berhasil dihapus!');
    }
}