<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
// Panggil library Image dari Intervention
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProdukController extends Controller
{
    // 1. Tampilkan Daftar Produk
    public function index()
    {
        $obat = Obat::orderBy('id_obat', 'desc')->get();
        return view('auth.produk.obat.index', compact('obat'));
    }

    // 2. Tampilkan Form Tambah
public function create()
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        return view('auth.produk.obat.create', compact('kategori_product'));
    }

    // 3. Proses Simpan Produk Baru
   public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'produk' => 'required',
            'filenya' => 'image|mimes:jpeg,png,jpg,gif|max:16000',
            'golongan_gabungan' => 'required',
            'status_obat' => 'required'
        ]);

        $file_baru = "no_image.jpg";

        if ($request->hasFile('filenya')) {
            $image = $request->file('filenya');
            $time_photo = time();
            $file_baru = $time_photo . "_" . $image->getClientOriginalName();
            
            $destination_medium = public_path('/pict_produk/' . $file_baru);
            $destination_thumb = public_path('/pict_produk/thumb/' . $file_baru);
            $watermark_path = public_path('/photo/logo.gif');

            $manager = new ImageManager(new Driver());

            $img = $manager->read($image->getRealPath());
            $img->scale(width: 400); 
            
            if (File::exists($watermark_path)) {
                $img->place($watermark_path, 'center');
            }
            $img->save($destination_medium, quality: 99);

            $imgThumb = $manager->read($image->getRealPath());
            $imgThumb->cover(275, 370); 
            
            if (File::exists($watermark_path)) {
                $imgThumb->place($watermark_path, 'center');
            }
            $imgThumb->save($destination_thumb, quality: 99);
        }

        $golongan_data = explode('|', $request->golongan_gabungan);
        $kode_golongan = $golongan_data[0] ?? '0';
        $nama_golongan = $golongan_data[1] ?? '-';

        Obat::create([
            'kode' => $request->kode,
            'produk' => $request->produk,
            'deskripsi' => $request->deskripsi ?? '',
            'pict' => $file_baru,
            'golongan' => $nama_golongan,
            'kode_golongan' => $kode_golongan,
            'status_obat' => $request->status_obat,
        ]);

        return redirect('/produk/list')->with('success', 'Produk berhasil ditambahkan!');
    }

    // --- 4. Tampilkan Form Edit ---
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        
        // Ambil daftar golongan untuk dropdown
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        return view('auth.produk.obat.edit', compact('obat', 'kategori_product'));
    }

    // --- 5. Proses Update Database ---
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'kode' => 'required',
            'produk' => 'required',
            'filenya' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16000',
            'golongan_gabungan' => 'required',
            'status_obat' => 'required'
        ]);

        // Secara default, pertahankan nama file lama
        $file_baru = $obat->pict;

        // Jika HRD mengupload gambar baru
        if ($request->hasFile('filenya')) {
            // Hapus gambar lama fisik dari server (kecuali kalau no_image.jpg)
            if ($file_baru && $file_baru != 'no_image.jpg') {
                $old_medium = public_path('/pict_produk/' . $file_baru);
                $old_thumb = public_path('/pict_produk/thumb/' . $file_baru);
                if (File::exists($old_medium)) File::delete($old_medium);
                if (File::exists($old_thumb)) File::delete($old_thumb);
            }

            // Proses upload gambar baru dengan Intervention V3
            $image = $request->file('filenya');
            $time_photo = time();
            $file_baru = $time_photo . "_" . $image->getClientOriginalName();
            
            $destination_medium = public_path('/pict_produk/' . $file_baru);
            $destination_thumb = public_path('/pict_produk/thumb/' . $file_baru);
            $watermark_path = public_path('/photo/logo.gif');

            $manager = new ImageManager(new Driver());

            // Medium
            $img = $manager->read($image->getRealPath());
            $img->scale(width: 400); 
            if (File::exists($watermark_path)) {
                $img->place($watermark_path, 'center');
            }
            $img->save($destination_medium, quality: 99);

            // Thumb
            $imgThumb = $manager->read($image->getRealPath());
            $imgThumb->cover(275, 370); 
            if (File::exists($watermark_path)) {
                $imgThumb->place($watermark_path, 'center');
            }
            $imgThumb->save($destination_thumb, quality: 99);
        }

        // Pecah value dropdown golongan
        $golongan_data = explode('|', $request->golongan_gabungan);
        $kode_golongan = $golongan_data[0] ?? '0';
        $nama_golongan = $golongan_data[1] ?? '-';

        // Update ke Database
        $obat->update([
            'kode' => $request->kode,
            'produk' => $request->produk,
            'deskripsi' => $request->deskripsi ?? '',
            'pict' => $file_baru,
            'golongan' => $nama_golongan,
            'kode_golongan' => $kode_golongan,
            'status_obat' => $request->status_obat,
        ]);

        return redirect('/produk/list')->with('success', 'Produk berhasil diupdate!');
    }

    // --- 6. Proses Delete Data ---
    public function delete($id)
    {
        $obat = Obat::findOrFail($id);
        
        // Hapus file fisik gambar dari server agar tidak jadi sampah
        if ($obat->pict && $obat->pict != 'no_image.jpg') {
            $old_medium = public_path('/pict_produk/' . $obat->pict);
            $old_thumb = public_path('/pict_produk/thumb/' . $obat->pict);
            if (File::exists($old_medium)) File::delete($old_medium);
            if (File::exists($old_thumb)) File::delete($old_thumb);
        }

        $obat->delete();

        return redirect('/produk/list')->with('success', 'Produk berhasil dihapus!');
    }
}