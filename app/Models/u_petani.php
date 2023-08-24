<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class u_petani extends Model
{
    use HasFactory;
    protected $fillable = [
        'nohp',
        'gambar',
        'email',
        'nik',
        'jeniskelamin',
        'tanggallahir',
        'alamat'
    ];
}
