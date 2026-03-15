@extends('layouts.admin')

@section('styles')
<style>
    .form-control { border-radius: 8px; height: 45px; }
</style>
@endsection

@section('content')
<section>
    <div class="container-fluid" style="padding: 0 30px; margin-top: 30px; margin-bottom: 30px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="modern-card" style="background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f0f0f0;">
                    
                    <div style="margin-bottom: 25px;">
                        <h3 class="page-title" style="font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 5px;">Edit Akun: {{ $user->username }}</h3>
                        <p style="color: #94a3b8; font-size: 14px;">Ubah hak akses atau *reset password* akun ini.</p>
                        <hr style="border-top: 1px solid #f1f5f9; margin-top: 20px;">
                    </div>

                    <form action="{{ url('admin/update/'.$user->id_user) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Username <small class="text-danger">*</small></label>
                                    <input name="username" class="form-control" type="text" value="{{ old('username', $user->username) }}" required>
                                    @error('username') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Password Baru</label>
                                    <input name="password" class="form-control" type="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                    <small style="color: #ef4444; font-weight: 500; display: block; margin-top: 5px;">Hanya isi kolom ini jika ingin me-reset password akun.</small>
                                    @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color: #475569; font-weight: 600;">Hak Akses (Level) <small class="text-danger">*</small></label>
                                    <select name="level" class="form-control" required>
                                        <option value="admin" {{ (old('level', $user->level) == 'Admin') ? 'selected' : '' }}>Admin (Super User)</option>
                                        <option value="hrd" {{ (old('level', $user->level) == 'HRD') ? 'selected' : '' }}>HRD</option>
                                        <option value="produk" {{ (old('level', $user->level) == 'Produk') ? 'selected' : '' }}>Produk</option>
                                    </select>
                                    @error('level') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <hr style="border-top: 1px solid #f1f5f9; margin-top: 30px; margin-bottom: 30px;">

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg" style="background-color: #f97316; color: white; font-weight: 700; padding: 12px 30px; border-radius: 8px; border: none; box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);">
                                <i class="fa fa-refresh"></i> Update User
                            </button>
                            <a href="{{ url('admin/list') }}" class="btn btn-lg btn-default" style="padding: 12px 30px; border-radius: 8px; font-weight: 600; margin-left: 10px;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection