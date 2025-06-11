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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_penjualan');
            $table->unsignedBigInteger('id_produk'); // hanya ini satu kali
            $table->string('nama_pelanggan');
            $table->integer('total_item');
            $table->decimal('total_harga', 12, 2);
            $table->enum('metode_pembayaran', ['cash', 'transfer']);
            $table->text('catatan_transaksi')->nullable();
            $table->enum('status_transaksi', ['selesai', 'tertunda']);
            $table->timestamps();

            // Foreign key-nya cukup di sini
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
