<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    
    // Matikan timestamps karena di DDL tidak ada created_at & updated_at
    public $timestamps = false; 

    protected $fillable = [
        'username',
        'pass',
        'level',
        'salt',
    ];

    // INI WAJIB: Memberitahu Laravel bahwa kolom password bernama 'pass'
    public function getAuthPassword()
    {
        return $this->pass;
    }
}