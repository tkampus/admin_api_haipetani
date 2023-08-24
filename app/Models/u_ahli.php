<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class u_ahli extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nohp',
        'gambar',
        'email',
        'nik',
        'jeniskelamin',
        'tanggallahir',
        'alamat',
        // ahli
        'nip',
        'bintang',
        'keahlian1',
        'keahlian2',
        'kantor'
    ];
}
