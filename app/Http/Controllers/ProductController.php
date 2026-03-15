<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $daftar_product = Obat::where('status_obat', 0)
            ->where('kode_golongan', $id)
            ->orderBy('produk', 'asc')
            ->get();

        $nama_kategori = Obat::where('kode_golongan', $id)->value('golongan') ?? 'Unknown Category';

        return view('welcome.product_list', compact('kategori_product', 'daftar_product', 'nama_kategori'));
    }

    public function show($id)
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $detail_product = Obat::where('status_obat', 0)
            ->where('id_obat', $id)
            ->firstOrFail();

        return view('welcome.product_detail', compact('kategori_product', 'detail_product'));
    }
}