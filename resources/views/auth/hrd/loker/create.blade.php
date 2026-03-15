@extends('layouts.admin')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.css" rel="stylesheet">
<style>
    .note-editor.note-frame { border: 1px solid #e2e8f0; border-radius: 4px; }
</style>
@endsection

@section('content')
<section>
    <div class="container-fluid" style="padding: 0 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="modern-card" style="background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f0f0f0; margin-bottom: 30px;">
                    
                    <div style="margin-bottom: 25px;">
                        <h3 class="page-title" style="font-weight: 800; color: #1e293b; margin-bottom: 5px;">
                            {{ isset($loker) ? 'Edit Lowongan Kerja' : 'Tambah Lowongan Baru' }}
                        </h3>
                        <p style="color: #94a3b8; font-size: 14px;">Isi detail informasi lowongan pekerjaan secara lengkap untuk diterbitkan.</p>
                        <hr style="border-top: 1px solid #f1f5f9; margin-top: 20px;">
                    </div>

                    <form action="{{ isset($loker) ? url('hrd/loker/update/'.$loker->id_loker) : url('hrd/loker/store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Jabatan / Posisi <small class="text-danger">*</small></label>
                                    <input name="jabatan" class="form-control" type="text" value="{{ $loker->jabatan ?? '' }}" placeholder="Contoh: SUPERVISOR MARKETING FARMASI" required style="height: 45px; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Penempatan</label>
                                    <input name="penempatan" class="form-control" type="text" value="{{ $loker->penempatan ?? '' }}" placeholder="Contoh: Nasional / Rancaekek" style="height: 45px; border-radius: 8px;">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Kualifikasi</label>
                                    <textarea name="kualifikasi" class="editor-html">{!! $loker->kualifikasi ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Job Deskripsi</label>
                                    <textarea name="jobdes" class="editor-html">{!! $loker->jobdes ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Tanggal Berakhir <small class="text-danger">*</small></label>
                                    <input name="tgl_berakhir" class="form-control" type="date" value="{{ $loker->tgl_berakhir ?? '' }}" required style="height: 45px; border-radius: 8px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Alamat Surat / Email</label>
                                    <input name="alamat_surat" class="form-control" type="text" value="{{ $loker->alamat_surat ?? '' }}" placeholder="hrd@graciapharmindo.com" style="height: 45px; border-radius: 8px;">
                                </div>
                            </div>
                            @if(isset($loker))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Status (Flag)</label>
                                    <select name="flag" class="form-control" style="height: 45px; border-radius: 8px;">
                                        <option value="0" {{ $loker->flag == 0 ? 'selected' : '' }}>Aktif</option>
                                        <option value="10" {{ $loker->flag == 10 ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>

                        <hr style="border-top: 1px solid #f1f5f9; margin-top: 30px; margin-bottom: 30px;">

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg" style="background-color: #f97316; color: white; font-weight: 700; padding: 12px 30px; border-radius: 8px; border: none; box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);">
                                <i class="fa fa-paper-plane"></i> {{ isset($loker) ? 'Update Loker' : 'Simpan & Publish' }}
                            </button>
                            <a href="{{ url('hrd/loker') }}" class="btn btn-lg btn-default" style="padding: 12px 30px; border-radius: 8px; font-weight: 600; margin-left: 10px;">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.editor-html').summernote({
            height: 250,
            placeholder: 'Ketikkan rincian di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endsection