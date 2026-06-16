<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jadwal_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->cascadeOnDelete();
            $table->date('tanggal');
            $table->enum('shift', ['Pagi', 'Siang', 'Malam'])->default('Pagi');
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->unique(['karyawan_id', 'tanggal', 'shift']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_kerjas');
    }
};

