<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $table = 'memo';
    
    protected $primaryKey = 'id_memo';
    
    public $timestamps = false;
    
    protected $guarded = [];
}