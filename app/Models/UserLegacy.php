<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserLegacy extends Authenticatable
{
    protected $table = 'user';
    
    protected $primaryKey = 'id_user';
    
    public $timestamps = false;
    
    protected $guarded = [];

    protected $hidden = [
        'pass',
        'salt',
    ];
}