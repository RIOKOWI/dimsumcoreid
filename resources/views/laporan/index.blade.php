<x-app-layout>
<div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Laporan Penjualan</h1>

    <form method="GET" class="mb-6 grid gap-4 md:flex md:items-end md:gap-6">
        <div class="flex flex-col">
            <label for="filter" class="text-sm font-medium text-gray-700 mb-1">Filter Waktu</label>
            <select name="filter" id="filter" onchange="toggleTanggalRange()"
                class="border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
                <option value="harian" {{ $filter == 'harian' ? 'selected' : '' }}>Harian</option>
                <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                <option value="tahunan" {{ $filter == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                <option value="custom" {{ $filter == 'custom' ? 'selected' : '' }}>Custom</option>
            </select>
        </div>

        <div id="tanggal-range" class="{{ $filter == 'custom' ? 'flex' : 'hidden' }} flex-col sm:flex-row sm:items-center gap-2">
            <div class="flex flex-col">
                <label class="text-sm text-gray-700">Dari</label>
                <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>
            <div class="flex flex-col">
                <label class="text-sm text-gray-700">Sampai</label>
                <input type="date" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
            </div>
        </div>

       <button type="submit"
            class="bg-blue-600 text-red dark:bg-blue-500 dark:text-white font-bold text-base rounded-lg px-6 py-2 border border-blue-800 shadow-md hover:bg-blue-700 dark:hover:bg-blue-600 transition">
            Tampilkan
        </button>


    </form>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full text-sm text-left border border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Produk</th>
                    <th class="p-3 border">Pelanggan</th>
                    <th class="p-3 border">Item</th>
                    <th class="p-3 border">Total Harga</th>
                    <th class="p-3 border">Metode</th>
                    <th class="p-3 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $penjualan)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border">{{ $penjualan->tanggal_penjualan }}</td>
                        <td class="p-3 border">{{ $penjualan->produk->nama ?? '-' }}</td>
                        <td class="p-3 border">{{ $penjualan->nama_pelanggan }}</td>
                        <td class="p-3 border">{{ $penjualan->total_item }}</td>
                        <td class="p-3 border">Rp{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                        <td class="p-3 border capitalize">{{ $penjualan->metode_pembayaran }}</td>
                        <td class="p-3 border capitalize">{{ $penjualan->status_transaksi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 p-5">Tidak ada data penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-lg font-semibold text-gray-800">
        Total Omset: <span class="text-green-600">Rp{{ number_format($totalOmset, 0, ',', '.') }}</span>
    </div>
</div>

<script>
    function toggleTanggalRange() {
        const filter = document.getElementById('filter').value;
        const range = document.getElementById('tanggal-range');
        range.classList.toggle('hidden', filter !== 'custom');
    }

    document.addEventListener('DOMContentLoaded', toggleTanggalRange);
</script>
</x-app-layout>
