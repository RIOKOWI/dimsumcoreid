<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->string('namaBahan');
            $table->integer('stok');
            $table->enum('satuan', ['kg', 'gram', 'liter', 'ml', 'pcs', 'pack']); // bisa ditambah sesuai kebutuhan
            $table->integer('harga');
            $table->enum('kategori', ['bahan mentah', 'bahan setengah jadi', 'bumbu', 'kemasan', 'lainnya']);
            $table->enum('statusBahan', ['tersedia', 'hampir habis', 'habis', 'dipesan']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
