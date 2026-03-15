<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 't_obat';

    protected $primaryKey = 'id_obat'; 
    

    public $timestamps = false; 

protected $fillable = [
        'kode',
        'produk',
        'deskripsi',
        'pict',
        'golongan',
        'kode_golongan',
        'status_obat' 
    ];
}