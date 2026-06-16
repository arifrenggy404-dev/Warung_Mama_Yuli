<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_bahan_id')->constrained('kategoris_bahan')->cascadeOnDelete();
            $table->string('nama_bahan');
            $table->string('satuan')->nullable();
            $table->decimal('stok', 12, 2)->default(0);
            $table->timestamps();
            $table->unique(['kategori_bahan_id', 'nama_bahan']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bahan_baku');
    }
};