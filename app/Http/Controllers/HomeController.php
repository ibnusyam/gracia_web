<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $daftar_product = Obat::where('status_obat', 0)
            ->orderBy('kode', 'desc')
            ->get();

        $daftar_event = Artikel::where('statusnya', 3)
            ->orderBy('tgl_artikel', 'desc')
            ->get();

        return view('welcome.dashboard', compact('kategori_product', 'daftar_product', 'daftar_event'));
    }
}