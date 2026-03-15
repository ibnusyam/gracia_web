<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    protected $table = 'loker';
    protected $primaryKey = 'id_loker';
    
    // Matikan timestamps karena tabelmu pakai tgl_upload manual
    public $timestamps = false;

    protected $fillable = [
        'jabatan',
        'kualifikasi',
        'jobdes',
        'penempatan',
        'tgl_upload',
        'tgl_berakhir',
        'alamat_surat',
        'flag'
    ];
}