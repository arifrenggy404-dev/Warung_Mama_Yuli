<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboards';
    protected $fillable = [
        'nama_menu', 'kategori', 'deskripsi', 'harga',
        'gambar', 'tersedia'
    ];

protected $casts = [
        'tersedia' => 'boolean',
        'harga' => 'decimal:2',
    ];
}

