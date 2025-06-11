<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'tanggal_penjualan',
        'id_produk',
        'nama_pelanggan',
        'total_item',
        'total_harga',
        'metode_pembayaran',
        'catatan_transaksi',
        'status_transaksi',
    ];

    public function produk()
    {
        
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
