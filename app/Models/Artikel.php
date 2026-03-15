<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel_grapha';
    
    protected $primaryKey = 'id_artikel';
    
    public $timestamps = false;
    
    protected $guarded = [];
}