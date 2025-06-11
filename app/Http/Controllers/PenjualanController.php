<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::with('produk')->get(); // with('produk') penting!

        return view('penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjualan.create', [
        'produks' => Produk::all(),
        'pelanggans' => Pelanggan::all(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'id_produk' => 'required|exists:produks,id',
            'nama_pelanggan' => 'required|string|max:255',
            'total_item' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|in:cash,transfer',
            'status_transaksi' => 'required|in:selesai,tertunda',
            'catatan_transaksi' => 'nullable|string',
        ]);

        $produk = Produk::findOrFail($request->id_produk);
        $total_harga = $produk->harga * $request->total_item;

        Penjualan::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'id_produk' => $request->id_produk,
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_item' => $request->total_item,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_transaksi' => $request->status_transaksi,
            'catatan_transaksi' => $request->catatan_transaksi,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Penjualan $penjualan)
    {
        return view('penjualan.edit', [
            'penjualan' => $penjualan,
            'produks' => Produk::all(),
            'pelanggans' => Pelanggan::all(),
        ]);
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'id_produk' => 'required|exists:produks,id',
            'nama_pelanggan' => 'required|string|max:255',
            'total_item' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|in:cash,transfer',
            'status_transaksi' => 'required|in:selesai,tertunda',
            'catatan_transaksi' => 'nullable|string',
        ]);

        $produk = Produk::findOrFail($request->id_produk);
        $total_harga = $produk->harga * $request->total_item;

        $penjualan->update([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'id_produk' => $request->id_produk,
            'nama_pelanggan' => $request->nama_pelanggan,
            'total_item' => $request->total_item,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_transaksi' => $request->status_transaksi,
            'catatan_transaksi' => $request->catatan_transaksi,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus.');
    }
}
