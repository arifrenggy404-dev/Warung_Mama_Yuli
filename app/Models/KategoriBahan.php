<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBahan extends Model
{
    protected $table = 'kategoris_bahan';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function bahanBaku()
    {
        return $this->hasMany(BahanBaku::class, 'kategori_bahan_id');
    }
}

