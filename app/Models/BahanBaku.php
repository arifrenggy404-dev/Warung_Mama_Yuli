<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';

    protected $fillable = [
        'kategori_bahan_id',
        'nama_bahan',
        'satuan',
        'stok',
    ];

    protected $casts = [
        'stok' => 'decimal:2',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBahan::class, 'kategori_bahan_id');
    }
}

