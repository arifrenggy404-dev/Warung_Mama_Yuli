<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    protected $table = 'kritik_sarans';

    protected $fillable = [
        'nama_pelanggan',
        'isi',
    ];
}

