<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawans';

    protected $fillable = [
        'nama',
        'jabatan',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'tanggal_masuk',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];
}

