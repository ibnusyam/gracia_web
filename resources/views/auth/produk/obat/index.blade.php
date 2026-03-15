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
    
    .img-thumb { width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0; cursor: pointer; transition: transform 0.2s; }
    .img-thumb:hover { transform: scale(1.1); box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    
    .action-icons { display: flex; align-items: center; gap: 15px; justify-content: center; }
    .btn-icon { color: #94a3b8; font-size: 16px; transition: 0.2s; text-decoration: none !important; }
    .btn-icon:hover { color: #3b82f6; }
    .btn-icon.delete:hover { color: #ef4444; }
    
    /* --- Style Badge Status --- */
    .status-badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
    .status-badge .dot { width: 6px; height: 6px; border-radius: 50%; margin-right: 6px; }
    .status-active { background-color: #ecfdf5; color: #10b981; }
    .status-active .dot { background-color: #10b981; }
    .status-inactive { background-color: #fef2f2; color: #ef4444; }
    .status-inactive .dot { background-color: #ef4444; }

    .dataTables_wrapper .dataTables_paginate .paginate_button.active a { background-color: #f97316 !important; border-color: #f97316 !important; color: white !important; }
</style>
@endsection

@section('content')
<section>
    <div class="container-fluid" style="padding: 0 30px; margin-top: 30px;">
        @if (session('success'))
            <div class="alert alert-success" style="border-radius: 8px;">{{ session('success') }}</div>
        @endif

        <div class="modern-card">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div>
                    <h2 class="page-title">Katalog Produk Obat</h2>
                    <p class="page-subtitle">Kelola daftar obat, gambar kemasan, dan deskripsi produk.</p>
                </div>
                <a href="{{ url('produk/create') }}" class="btn-orange">
                    <i class="fa fa-plus"></i> Tambah Produk
                </a>
            </div>

            <div class="table-responsive">
                <table id="tableProduk" class="table modern-table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th width="10%">GAMBAR</th>
                            <th width="15%">KODE OBAT</th>
                            <th width="20%">NAMA PRODUK</th>
                            <th width="20%">GOLONGAN</th>
                            <th width="15%" class="text-center">STATUS</th>
                            <th width="15%" class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $key => $row)
                            <tr>
                                <td style="color: #94a3b8; font-weight: 500;">{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <img src="{{ asset('pict_produk/thumb/' . ($row->pict ?: 'no_image.jpg')) }}" 
                                         data-src="{{ asset('pict_produk/' . ($row->pict ?: 'no_image.jpg')) }}"
                                         data-title="{{ $row->produk }}"
                                         alt="Foto" 
                                         class="img-thumb clickable-image" 
                                         onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
                                </td>
                                <td><strong>{{ $row->kode }}</strong></td>
                                <td style="color: #1e293b; font-weight: 700; font-size: 14px;">{{ $row->produk }}</td>
                                <td>{{ $row->golongan }}</td>
                                
                                <td class="text-center">
                                    @if ($row->status_obat == 0)
                                        <span class="status-badge status-active"><i class="dot"></i> Diproduksi</span>
                                    @else
                                        <span class="status-badge status-inactive" style="background-color: #f1f5f9; color: #64748b;"><i class="dot" style="background-color: #64748b;"></i> Discontinue</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="action-icons">
                                        <a href="{{ url('produk/edit/' . $row->id_obat) }}" class="btn-icon" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ url('produk/delete/' . $row->id_obat) }}" class="btn-icon delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')"><i class="fa fa-trash-o"></i></a>
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

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 12px; border: none;">
      <div class="modal-header" style="border-bottom: 1px solid #f1f5f9;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="imageModalLabel" style="font-weight: 700; color: #1e293b;">Preview Gambar</h4>
      </div>
      <div class="modal-body text-center" style="padding: 30px;">
        <img src="" id="modalImageTarget" class="img-responsive" style="margin: 0 auto; max-height: 450px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tableProduk').DataTable({
            "pageLength": 10,
            "language": {
                "search": "Cari Produk:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "paginate": { "previous": "Mundur", "next": "Maju" }
            },
            // Perhatian: Karena tambah 1 kolom (Status), kolom Aksi sekarang geser ke index 6
            "columnDefs": [ { "orderable": false, "targets": [1, 6] } ] 
        });

        // Script Modal Gambar
        $(document).on('click', '.clickable-image', function() {
            var fullImageSrc = $(this).data('src');
            var productName = $(this).data('title');
            
            $('#modalImageTarget').attr('src', fullImageSrc);
            $('#imageModalLabel').text(productName);
            $('#imageModal').modal('show');
        });
    });
</script>
@endsection