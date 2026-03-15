<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'master';
    
    protected $primaryKey = 'id_kryw';
    
    public $timestamps = false;
    
    protected $guarded = [];

    public function karir()
    {
        return $this->hasMany(Karir::class, 'id_kryw', 'id_kryw');
    }
}