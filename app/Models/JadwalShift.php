<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalShift extends Model
{
    protected $table = 'jadwal_kerjas';

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'shift',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}

