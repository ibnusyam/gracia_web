<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function index()
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $job_list = Loker::where('flag', 0)
            ->orderBy('tgl_upload', 'desc')
            ->get();

        return view('welcome.career', compact('kategori_product', 'job_list'));
    }

    public function show(Request $request)
    {
        $kategori_product = Obat::select('golongan', 'kode_golongan')
            ->groupBy('golongan', 'kode_golongan')
            ->orderBy('golongan', 'asc')
            ->get();

        $id_job = $request->input('id_loker');
        $job_detail = Loker::where('flag', 0)
            ->where('id_loker', $id_job)
            ->firstOrFail();

        return view('welcome.job_detail', compact('kategori_product', 'job_detail'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'form_email' => 'required|email',
            'form_name' => 'required',
            'form_post' => 'required',
            'form_message' => 'required',
            'form_attachment' => 'nullable|file|max:12288'
        ]);

        $data = $request->only('form_email', 'form_name', 'form_post', 'form_message', 'form_sex');

        Mail::send([], [], function ($message) use ($data, $request) {
            $message->from($data['form_email'], $data['form_name'])
                ->to('admin2.hrd@gracia.co.id')
                ->cc('mis@gracia.co.id')
                ->subject($data['form_post'] . "-" . $data['form_name'] . "-" . ($data['form_sex'] ?? ''))
                ->html($data['form_message']);

            if ($request->hasFile('form_attachment')) {
                $file = $request->file('form_attachment');
                $message->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                ]);
            }
        });

        return redirect()->to('/job-list')->with('pesan', '<center><strong>Your message has been sent successfully !</strong></center>');
    }
}