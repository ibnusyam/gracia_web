@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
<style>
    body { background-color: #f4f7f9; }
    .modern-card { background: #ffffff; border-radius: 12px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f0f0f0; }
    .page-title { font-size: 22px; font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 5px; }
    .page-subtitle { font-size: 13px; color: #94a3b8; margin-bottom: 25px; }
    
    .btn-orange { background-color: #f97316; color: white; border-radius: 6px; padding: 8px 16px; font-weight: 600; border: none; transition: 0.2s; box-shadow: 0 2px 4px rgba(249, 115, 22, 0.2); text-decoration: none !important; display: inline-block; }
    .btn-orange:hover { background-color: #ea580c; color: white; }

    .modern-table { width: 100%; margin-bottom: 0; }
    .modern-table th { border-bottom: 1px solid #f1f5f9 !important; color: #64748b; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 15px 10px; }
    .modern-table td { border-bottom: 1px solid #f8fafc !important; vertical-align: middle !important; padding: 12px 10px; color: #475569; font-size: 13px; }
    
    .user-avatar { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0; margin-right: 10px; }
    .user-info-flex { display: flex; align-items: center; }
    
    .action-icons { display: flex; align-items: center; gap: 15px; justify-content: center; }
    .btn-icon { color: #94a3b8; font-size: 16px; transition: 0.2s; text-decoration: none !important; }
    .btn-icon:hover { color: #3b82f6; }
    .btn-icon.delete:hover { color: #ef4444; }
    
    .role-badge { background-color: #e0e7ff; color: #4338ca; padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.active a { background-color: #f97316 !important; border-color: #f97316 !important; color: white !important; }
</style>
@endsection

@section('content')
<section>
    <div class="container-fluid" style="padding: 0 30px; margin-top: 30px; margin-bottom: 30px;">
        
        @if (session('success'))
            <div class="alert alert-success" style="border-radius: 8px;">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" style="border-radius: 8px;">{{ session('error') }}</div>
        @endif

        <div class="modern-card">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div>
                    <h2 class="page-title">Manajemen Akun User</h2>
                    <p class="page-subtitle">Kelola akses *login* untuk Admin, HRD, dan divisi lainnya.</p>
                </div>
                <a href="{{ url('admin/create') }}" class="btn-orange">
                    <i class="fa fa-user-plus"></i> Tambah User
                </a>
            </div>

            <div class="table-responsive">
                <table id="tableUser" class="table modern-table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th width="40%">NAMA USER / USERNAME</th>
                            <th width="35%">HAK AKSES (LEVEL)</th>
                            <th width="20%" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $row)
                            <tr>
                                <td style="color: #94a3b8; font-weight: 500;">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div class="user-info-flex">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($row->username) }}&background=e2e8f0&color=2d3748&bold=true" class="user-avatar">
                                        <strong style="color: #1e293b; font-size: 14px;">{{ $row->username }}</strong>
                                        @if(Auth::user()->id_user == $row->id_user)
                                            <span style="font-size: 10px; color: #10b981; margin-left: 8px; font-weight: 600;">(Anda)</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="role-badge">{{ $row->level }}</span>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <a href="{{ url('admin/edit/' . $row->id_user) }}" class="btn-icon" title="Edit"><i class="fa fa-pencil"></i></a>
                                        
                                        @if(Auth::user()->id_user != $row->id_user)
                                            <a href="{{ url('admin/delete/' . $row->id_user) }}" class="btn-icon delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus akun {{ $row->username }}?')"><i class="fa fa-trash-o"></i></a>
                                        @else
                                            <span class="btn-icon" style="color: #cbd5e1; cursor: not-allowed;" title="Tidak bisa menghapus akun sendiri"><i class="fa fa-trash-o"></i></span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tableUser').DataTable({
            "pageLength": 10,
            "language": {
                "search": "Cari Akun:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "paginate": { "previous": "Mundur", "next": "Maju" }
            },
            "columnDefs": [ { "orderable": false, "targets": [3] } ] 
        });
    });
</script>
@endsection