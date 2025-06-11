<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori',
        'gambar',
    ];

        // relasi ke model transaction
    public function transactions()
    {
        return $this->hasMany(Penjualan::class);
    }
}
