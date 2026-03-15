<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    protected $table = 'karir';
    
    protected $primaryKey = 'id_karir';
    
    public $timestamps = false;
    
    protected $guarded = [];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_kryw', 'id_kryw');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen', 'id_dept');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan', 'id_jab');
    }
}