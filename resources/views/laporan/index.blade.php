<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Laporan Penjualan</h1>

    <form method="GET" class="mb-4 flex flex-wrap items-center gap-4">
        <div>
            <label for="filter" class="mr-2">Filter:</label>
            <select name="filter" id="filter" onchange="toggleTanggalRange()" class="border rounded px-2 py-1">
                <option value="harian" {{ $filter == 'harian' ? 'selected' : '' }}>Harian</option>
                <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $filter == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                <option value="custom" {{ $filter == 'custom' ? 'selected' : '' }}>Custom</option>
            </select>
        </div>

        <div id="tanggal-range" class="{{ $filter == 'custom' ? '' : 'hidden' }} flex gap-2 items-center">
            <label>Dari:</label>
            <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}" class="border px-2 py-1 rounded">
            <label>Sampai:</label>
            <input type="date" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}" class="border px-2 py-1 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tampilkan</button>
    </form>

    <table class="w-full border-collapse mb-4">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Pelanggan</th>
                <th class="border p-2">Item</th>
                <th class="border p-2">Total Harga</th>
                <th class="border p-2">Metode</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $penjualan)
            <tr>
                <td class="border p-2">{{ $penjualan->tanggal_penjualan }}</td>
                <td class="border p-2">{{ $penjualan->produk->nama ?? '-' }}</td>
                <td class="border p-2">{{ $penjualan->nama_pelanggan }}</td>
                <td class="border p-2">{{ $penjualan->total_item }}</td>
                <td class="border p-2">Rp{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                <td class="border p-2 capitalize">{{ $penjualan->metode_pembayaran }}</td>
                <td class="border p-2 capitalize">{{ $penjualan->status_transaksi }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center p-4 text-gray-500">Tidak ada data penjualan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="font-semibold text-lg">
        Total Omset: Rp{{ number_format($totalOmset, 0, ',', '.') }}
    </div>
</div>

<script>
    function toggleTanggalRange() {
        const filter = document.getElementById('filter').value;
        const range = document.getElementById('tanggal-range');
        range.classList.toggle('hidden', filter !== 'custom');
    }

    // Auto toggle saat halaman dimuat
    document.addEventListener('DOMContentLoaded', toggleTanggalRange);
</script>
</x-app-layout>
