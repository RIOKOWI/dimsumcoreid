<?php

namespace Database\Seeders;

use App\Models\Stok;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stok::create([
            'namaBahan' => 'Tepung Terigu',
            'stok' => 50,
            'satuan' => 'kg',
            'harga' => 7000,
            'kategori' => 'bahan mentah',
            'statusBahan' => 'tersedia',
            'catatan' => 'Untuk produksi dimsum',
        ]);
    }
}
