<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'harian');
        $penjualans = Penjualan::query();

        // Filter cepat
        if ($filter === 'harian') {
            $penjualans->whereDate('tanggal_penjualan', Carbon::today());
        } elseif ($filter === 'mingguan') {
            $penjualans->whereBetween('tanggal_penjualan', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
        } elseif ($filter === 'bulanan') {
            $penjualans->whereMonth('tanggal_penjualan', Carbon::now()->month)
                       ->whereYear('tanggal_penjualan', Carbon::now()->year);
        } elseif ($filter === 'tahunan') {
            $penjualans->whereYear('tanggal_penjualan', Carbon::now()->year);
        } elseif ($filter === 'custom') {
            if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
                $penjualans->whereBetween('tanggal_penjualan', [
                    $request->tanggal_mulai,
                    $request->tanggal_selesai
                ]);
            }
        }

        $data = $penjualans->orderBy('tanggal_penjualan', 'desc')->get();
        $totalOmset = $data->sum('total_harga');

        return view('laporan.index', compact('data', 'totalOmset', 'filter'));
    }
}
