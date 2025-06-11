<x-app-layout>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Data Penjualan Dimsum</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 dark:bg-green-900 dark:text-green-100">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('penjualan.create') }}"
               class="inline-block bg-blue-600 text-red px-5 py-2 rounded-lg shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                + Tambah Penjualan
            </a>
        </div>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-100">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <tr>
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">Tanggal</th>
                        <th class="p-3 border">Produk</th>
                        <th class="p-3 border">Pelanggan</th>
                        <th class="p-3 border">Item</th>
                        <th class="p-3 border">Total Harga</th>
                        <th class="p-3 border">Metode</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Catatan</th>
                        <th class="p-3 border">Dibuat</th>
                        <th class="p-3 border">Diubah</th>
                        <th class="p-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penjualans as $penjualan)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 border-b">
                            <td class="p-3 border">{{ $loop->iteration }}</td>
                            <td class="p-3 border">{{ $penjualan->tanggal_penjualan }}</td>
                            <td class="p-3 border">{{ $penjualan->produk->nama ?? '-' }}</td>
                            <td class="p-3 border">{{ $penjualan->nama_pelanggan }}</td>
                            <td class="p-3 border">{{ $penjualan->total_item }}</td>
                            <td class="p-3 border">Rp{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                            <td class="p-3 border capitalize">{{ $penjualan->metode_pembayaran }}</td>
                            <td class="p-3 border capitalize">{{ $penjualan->status_transaksi }}</td>
                            <td class="p-3 border">{{ $penjualan->catatan_transaksi ?? '-' }}</td>
                            <td class="p-3 border text-sm">{{ $penjualan->created_at->format('d M Y H:i') }}</td>
                            <td class="p-3 border text-sm">{{ $penjualan->updated_at->format('d M Y H:i') }}</td>
                            <td class="p-3 border text-center">
                                <a href="{{ route('penjualan.edit', $penjualan->id) }}"
                                   class="text-blue-600 hover:underline dark:text-blue-400">Edit</a>

                                <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST"
                                      class="inline-block ml-2"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:underline dark:text-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center p-5 text-gray-500 dark:text-gray-300">Belum ada data penjualan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
