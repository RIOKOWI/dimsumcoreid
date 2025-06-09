<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::all();
        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        return view('stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaBahan' => 'required|string|max:255',
            'stok' => 'required|integer',
            'satuan' => 'required|in:kg,gram,liter,ml,pcs,pak',
            'harga' => 'required|integer',
            'kategori' => 'required|in:bahan mentah,bahan setengah jadi,bumbu,kemasan,lainnya',
            'statusBahan' => 'required|in:tersedia,hampir habis,habis,dipesan',
            'catatan' => 'nullable|string'
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan.');
    }

    public function show(Stok $stok)
    {
        return view('stok.show', compact('stok'));
    }

    public function edit(Stok $stok)
    {
        return view('stok.edit', compact('stok'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'namaBahan' => 'required|string|max:255',
            'stok' => 'required|integer',
            'satuan' => 'required|in:kg,gram,liter,ml,pcs,pack',
            'harga' => 'required|integer',
            'kategori' => 'required|in:bahan mentah,bahan setengah jadi,bumbu,kemasan,lainnya',
            'statusBahan' => 'required|in:tersedia,hampir habis,habis,dipesan',
            'catatan' => 'nullable|string'
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil diupdate.');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus.');
    }
}
