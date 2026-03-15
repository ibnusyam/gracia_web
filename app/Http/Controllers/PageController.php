<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getKategori()
    {
        return Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();
    }

    public function randd()
    {
        $kategori_product = $this->getKategori();
        return view('front.r_and_d', compact('kategori_product'));
    }

    public function qc()
    {
        $kategori_product = $this->getKategori();
        return view('front.qc', compact('kategori_product'));
    }

    public function keyFacts()
    {
        $kategori_product = $this->getKategori();
        return view('front.key', compact('kategori_product'));
    }

    public function companyProfile()
    {
        $kategori_product = $this->getKategori();
        return view('welcome.about_us', compact('kategori_product'));
    }

    public function production()
    {
        $kategori_product = $this->getKategori();
        return view('front.production', compact('kategori_product'));
    }

    public function contact()
    {
        $kategori_product = $this->getKategori();
        return view('welcome.contact_us', compact('kategori_product'));
    }
}