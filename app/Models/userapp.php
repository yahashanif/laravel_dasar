<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class userapp extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'userapps';
    protected $fillable = [
        'nama', 'no_telp', 'alamat', 'email', 'jk'
    ];
}
