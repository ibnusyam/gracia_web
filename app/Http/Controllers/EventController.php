<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Obat;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $daftar_event = Artikel::where('statusnya', 3)
            ->orderBy('tgl_artikel', 'desc')
            ->get();

        return view('front.list_events', compact('kategori_product', 'daftar_event'));
    }

    public function show($id)
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $detail_event = Artikel::where('statusnya', 3)
            ->where('id_artikel', $id)
            ->firstOrFail();

        return view('front.detail_event', compact('kategori_product', 'detail_event'));
    }
}