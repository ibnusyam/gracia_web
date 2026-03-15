@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap.min.css">
<style>
    body { background-color: #f4f7f9; }

    /* Card & Header Styling */
    .modern-card { background: #ffffff; border-radius: 12px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid #f0f0f0; }
    .page-title { font-size: 22px; font-weight: 800; color: #1e293b; margin-top: 0; margin-bottom: 5px; }
    .page-subtitle { font-size: 13px; color: #94a3b8; margin-bottom: 25px; }
    
    .btn-orange { background-color: #f97316; color: white; border-radius: 6px; padding: 8px 16px; font-weight: 600; border: none; transition: 0.2s; box-shadow: 0 2px 4px rgba(249, 115, 22, 0.2); text-decoration: none !important; display: inline-block; }
    .btn-orange:hover { background-color: #ea580c; color: white; }
    .btn-orange i { margin-right: 5px; }

    /* Table Styling */
    .modern-table { width: 100%; margin-bottom: 0; }
    .modern-table th { border-top: none !important; border-bottom: 1px solid #f1f5f9 !important; color: #64748b; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; padding: 15px 10px; }
    .modern-table td { border-top: none !important; border-bottom: 1px solid #f8fafc !important; vertical-align: middle !important; padding: 16px 10px; color: #475569; font-size: 13px; }
    .modern-table tbody tr:hover { background-color: #fbfcfd; }
    
    .col-no { color: #94a3b8; font-weight: 500; }
    .col-jabatan { color: #1e293b; font-weight: 700; font-size: 14px; }

    /* Badges Status */
    .status-badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
    .status-badge .dot { width: 6px; height: 6px; border-radius: 50%; margin-right: 6px; }
    .status-active { background-color: #ecfdf5; color: #10b981; }
    .status-active .dot { background-color: #10b981; }
    .status-inactive { background-color: #f1f5f9; color: #64748b; }
    .status-inactive .dot { background-color: #64748b; }

    /* Action Icons & Toggle */
    .action-icons { display: flex; align-items: center; gap: 15px; }
    .btn-icon { color: #94a3b8; font-size: 16px; transition: 0.2s; text-decoration: none !important; }
    .btn-icon:hover { color: #3b82f6; }
    .btn-icon.delete:hover { color: #ef4444; }
    .action-divider { width: 1px; height: 20px; background-color: #e2e8f0; margin: 0 5px; }

    .toggle-switch { display: inline-block; width: 36px; height: 20px; border-radius: 20px; position: relative; transition: 0.3s; }
    .toggle-switch::after { content: ''; position: absolute; top: 2px; left: 2px; width: 16px; height: 16px; background: white; border-radius: 50%; transition: 0.3s; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
    .toggle-switch.active { background: #f97316; } 
    .toggle-switch.active::after { left: 18px; }
    .toggle-switch.inactive { background: #cbd5e1; }

    /* Kustomisasi Tampilan DataTables agar serasi dengan desain modern */
    .dataTables_wrapper .dataTables_paginate .paginate_button.active a { background-color: #f97316 !important; border-color: #f97316 !important; color: white !important; }
    .dataTables_wrapper .dataTables_filter input { border-radius: 6px; border: 1px solid #e2e8f0; padding: 5px 10px; margin-left: 10px; outline: none; }
    .dataTables_wrapper .dataTables_filter input:focus { border-color: #f97316; }
    .dataTables_wrapper .dataTables_length select { border-radius: 6px; border: 1px solid #e2e8f0; padding: 5px; outline: none; }
</style>
@endsection

@section('content')
<section>
    <div class="container pt-30 pb-30">
        
        @if (session('success'))
            <div class="alert alert-success" style="border-radius: 8px;">{{ session('success') }}</div>
        @endif

        <div class="modern-card">
            
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div>
                    <h2 class="page-title">Daftar Jabatan & Penempatan</h2>
                    <p class="page-subtitle">Kelola posisi jabatan dan masa berlaku penempatan karyawan.</p>
                </div>
                <a href="{{ url('hrd/loker/create') }}" class="btn-orange">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>

            <div class="table-responsive" style="overflow-x: hidden;">
                <table id="tableLoker" class="table modern-table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th width="20%">JABATAN</th>
                            <th width="15%">PENEMPATAN</th>
                            <th width="15%">TGL UPLOAD</th>
                            <th width="15%">TGL BERAKHIR</th>
                            <th width="10%">STATUS</th>
                            <th width="20%" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loker as $key => $row)
                            <tr>
                                <td class="col-no">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="col-jabatan">{{ $row->jabatan }}</td>
                                <td>{{ $row->penempatan }}</td>
                                <td>{{ date('d M Y', strtotime($row->tgl_upload)) }}</td>
                                <td>{{ date('d M Y', strtotime($row->tgl_berakhir)) }}</td>
                                
                                <td>
                                    @if ($row->flag == 0)
                                        <span class="status-badge status-active"><i class="dot"></i> Aktif</span>
                                    @else
                                        <span class="status-badge status-inactive"><i class="dot"></i> Nonaktif</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <div class="action-icons" style="justify-content: center;">
                                        <a href="{{ url('hrd/loker/edit/' . $row->id_loker) }}" class="btn-icon" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        
                                        <a href="{{ url('hrd/loker/delete/' . $row->id_loker) }}" class="btn-icon delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus loker ini?')">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        
                                        <div class="action-divider"></div>

                                        @if ($row->flag == 0)
                                            <a href="{{ url('hrd/loker/status/' . $row->id_loker . '/10') }}" class="toggle-switch active" title="Nonaktifkan"></a>
                                        @else
                                            <a href="{{ url('hrd/loker/status/' . $row->id_loker . '/0') }}" class="toggle-switch inactive" title="Aktifkan"></a>
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
        // Inisialisasi DataTables
        $('#tableLoker').DataTable({
            "pageLength": 10, // Default tampilkan 10 baris
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]], // Pilihan jumlah baris
            "language": {
                // Translate bahasanya biar ramah pengguna
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data lowongan tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Cari Cepat:",
                "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Maju",
                    "previous":   "Mundur"
                }
            },
            // Matikan fitur sorting default di kolom Aksi (karena isinya tombol)
            "columnDefs": [
                { "orderable": false, "targets": 6 }
            ]
        });
    });
</script>
@endsection