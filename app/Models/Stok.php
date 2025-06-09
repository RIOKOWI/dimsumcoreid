<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'nama',
        'namaBahan',
        'stok',
        'satuan',
        'harga',
        'kategori',
        'statusBahan',
        'catatan',
    ];
}
