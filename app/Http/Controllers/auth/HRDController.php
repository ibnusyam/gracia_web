<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller; 
use App\Models\Loker;
use Illuminate\Http\Request;

class HRDController extends Controller
{
    
    // List Loker
    public function index()
    {
        $data['loker'] = Loker::orderBy('tgl_upload', 'desc')->get();
        return view('auth.hrd.loker.index', $data);
    }

public function update_status($id, $status)
{
    // Cari loker berdasarkan ID
    $loker = \App\Models\Loker::findOrFail($id);
    
    // Sesuaikan dengan logika CI2 kamu:
    // status 0 = Active, status 10 = Deactive
    $loker->flag = $status;
    $loker->save();

    $pesan = ($status == 0) ? 'Loker berhasil diaktifkan (Flag 0)!' : 'Loker berhasil dinon-aktifkan (Flag 10)!';
    
    return redirect()->back()->with('success', $pesan);
}

    // Form Tambah
    public function create()
    {
        return view('auth.hrd.loker.create');
    }

    // Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
            'tgl_berakhir' => 'required|date',
        ]);

        Loker::create([
            'jabatan'      => $request->jabatan,
            'kualifikasi'  => $request->kualifikasi,
            'jobdes'       => $request->jobdes,
            'penempatan'   => $request->penempatan,
            'tgl_upload'   => now(), // Mengisi datetime sekarang
            'tgl_berakhir' => $request->tgl_berakhir,
            'alamat_surat' => $request->alamat_surat,
            'flag'         => 1, // Default aktif
        ]);

        return redirect('/hrd/loker')->with('success', 'Loker berhasil dipublish!');
    }

    // Form Edit
    public function edit($id)
    {
        $data['loker'] = Loker::findOrFail($id);
        return view('auth.hrd.loker.edit', $data);
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $loker = Loker::findOrFail($id);
        $loker->update($request->all());

        return redirect('/hrd/loker')->with('success', 'Loker berhasil diupdate!');
    }

    // Hapus Data
    public function destroy($id)
    {
        Loker::destroy($id);
        return redirect('/hrd/loker')->with('success', 'Loker berhasil dihapus!');
    }
}