@extends('layouts.admin')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.css" rel="stylesheet">
    <style>
        .note-editor.note-frame {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="container-fluid" style="padding: 0 30px; margin-top: 30px;">
            <div class="modern-card"
                style="background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">

                <div style="margin-bottom: 25px;">
                    <h3 style="font-weight: 800; color: #1e293b; margin-top: 0;">Tambah Produk Baru</h3>
                    <p style="color: #94a3b8;">Masukkan detail obat dan upload kemasan (Maks 16MB).</p>
                    <hr style="border-top: 1px solid #f1f5f9; margin-top: 20px;">
                </div>

                <form action="{{ url('produk/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="color: #475569; font-weight: 600;">Kode Obat <small
                                        class="text-danger">*</small></label>
                                <input name="kode" class="form-control" type="text" placeholder="Contoh: OBT-001"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label style="color: #475569; font-weight: 600;">Nama Produk <small
                                        class="text-danger">*</small></label>
                                <input name="produk" class="form-control" type="text"
                                    placeholder="Contoh: Paracetamol 500mg" required>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #475569; font-weight: 600;">Golongan Obat <small
                                        class="text-danger">*</small></label>
                                <select name="golongan_gabungan" class="form-control" required>
                                    <option value="">-- Pilih Golongan --</option>
                                    @foreach ($kategori_product as $kategori)
                                        <option value="{{ $kategori->kode_golongan }}|{{ $kategori->golongan }}">
                                            {{ $kategori->golongan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color: #475569; font-weight: 600;">Still Produced (Status) <small
                                        class="text-danger">*</small></label>
                                <select name="status_obat" class="form-control" required>
                                    <option value="0">0 - Yes (Still Produced)</option>
                                    <option value="1">1 - No (Discontinued)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: #475569; font-weight: 600;">Deskripsi Produk / Indikasi</label>
                                <textarea name="deskripsi" class="editor-html"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: #475569; font-weight: 600;">Upload Gambar Kemasan (JPG/PNG)</label>
                                <input name="filenya" type="file" class="form-control" style="padding-top: 10px;"
                                    accept="image/*">
                                <small style="color: #94a3b8;">Sistem akan otomatis memberikan watermark dan meresize
                                    gambar.</small>
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #f1f5f9; margin-top: 30px; margin-bottom: 30px;">

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg"
                            style="background-color: #f97316; color: white; font-weight: 700; padding: 12px 30px; border-radius: 8px; border: none;">
                            <i class="fa fa-save"></i> Simpan Produk
                        </button>
                        <a href="{{ url('produk/list') }}" class="btn btn-lg btn-default"
                            style="padding: 12px 30px; border-radius: 8px; font-weight: 600; margin-left: 10px;">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editor-html').summernote({
                height: 200,
                placeholder: 'Tuliskan indikasi, dosis, dan aturan pakai obat...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endsection
