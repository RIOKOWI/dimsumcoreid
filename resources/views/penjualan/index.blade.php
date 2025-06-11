<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Penjualan Dimsum</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('penjualan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Penjualan
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">No</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Pelanggan</th>
                <th class="border p-2">Item</th>
                <th class="border p-2">Total Harga</th>
                <th class="border p-2">Metode</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Catatan</th>
                <th class="border p-2">Aksi</th> <!-- Tambahan -->
            </tr>
        </thead>
        <tbody>
            @forelse($penjualans as $penjualan)
            <tr class="border-b">
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">{{ $penjualan->tanggal_penjualan }}</td>
                <td class="border p-2">{{ $penjualan->produk->nama ?? '-' }}</td>
                <td class="border p-2">{{ $penjualan->nama_pelanggan }}</td>
                <td class="border p-2">{{ $penjualan->total_item }}</td>
                <td class="border p-2">Rp{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                <td class="border p-2 capitalize">{{ $penjualan->metode_pembayaran }}</td>
                <td class="border p-2 capitalize">{{ $penjualan->status_transaksi }}</td>
                <td class="border p-2">{{ $penjualan->catatan_transaksi ?? '-' }}</td>
                <td class="border p-2 text-center">
                    <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>

                    <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center p-4 text-gray-500">Belum ada data penjualan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
