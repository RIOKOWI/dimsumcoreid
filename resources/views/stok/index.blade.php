<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <h2 class="text-2xl font-bold text-red-600">📋 Daftar Stok Bahan</h2>
            <a href="{{ route('stok.create') }}" 
               class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
               ➕ Tambah Bahan
            </a>
        </div>

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-red-100 text-red-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Nama</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold">Stok</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold">Satuan</th>
                        <th class="px-4 py-2 text-right text-sm font-semibold">Harga</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Kategori</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Catatan</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($stoks as $stok)
                        <tr class="hover:bg-red-50">
                            <td class="px-4 py-2 whitespace-normal">{{ $stok->namaBahan }}</td>
                            <td class="px-4 py-2 text-center">{{ $stok->stok }}</td>
                            <td class="px-4 py-2 text-center">{{ $stok->satuan }}</td>
                            <td class="px-4 py-2 text-right">{{ number_format($stok->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ ucfirst($stok->kategori) }}</td>
                            <td class="px-4 py-2">{{ ucfirst($stok->statusBahan) }}</td>
                            <td class="px-4 py-2">{{ $stok->catatan ?? '-' }}</td>
                            <td class="px-4 py-2 text-center whitespace-nowrap space-x-2">
                                <a href="{{ route('stok.edit', $stok->id) }}" 
                                   class="inline-block px-3 py-1 text-yellow-600 border border-yellow-600 rounded hover:bg-yellow-100 transition">
                                   ✏️ Edit
                                </a>
                                <form action="{{ route('stok.destroy', $stok->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus bahan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="inline-block px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-100 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">
                                Belum ada data stok bahan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
