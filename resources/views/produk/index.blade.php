<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-semibold text-red-600">📦 Daftar Produk</h2>
            <a href="{{ route('produk.create') }}"
               class="inline-block bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                ➕ Tambah Produk
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 text-green-700 bg-green-100 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-semibold uppercase">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-semibold uppercase">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-semibold uppercase">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-semibold uppercase">Harga</th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-semibold uppercase">Stok</th>
                        <th scope="col" class="px-6 py-3 text-center text-sm font-semibold uppercase">Gambar</th>
                        <th scope="col" class="px-6 py-3 text-center text-sm font-semibold uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($produks as $produk)
                        <tr>
                            <td class="px-6 py-4 whitespace-normal">{{ $produk->nama }}</td>
                            <td class="px-6 py-4 whitespace-normal max-w-xs truncate">{{ $produk->deskripsi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap capitalize">{{ $produk->kategori }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $produk->stok }}</td>
                            <td class="px-6 py-4 text-center">
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk" class="mx-auto h-16 w-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('produk.edit', $produk) }}"
                                   class="inline-block px-3 py-1 text-yellow-600 border border-yellow-600 rounded hover:bg-yellow-600 hover:text-white transition">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-500 italic">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
