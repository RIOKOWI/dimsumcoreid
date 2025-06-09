<x-app-layout>
    <div class="max-w-lg mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold text-red-600 mb-6">➕ Tambah Produk</h2>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block mb-1 font-medium">Nama:</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('nama')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block mb-1 font-medium">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kategori" class="block mb-1 font-medium">Kategori:</label>
                <select name="kategori" id="kategori" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="siap saji" {{ old('kategori') == 'siap saji' ? 'selected' : '' }}>Siap Saji</option>
                    <option value="frozen" {{ old('kategori') == 'frozen' ? 'selected' : '' }}>Frozen</option>
                </select>
                @error('kategori')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="harga" class="block mb-1 font-medium">Harga:</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('harga')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stok" class="block mb-1 font-medium">Stok:</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok') }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('stok')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gambar" class="block mb-1 font-medium">Gambar:</label>
                <input type="file" name="gambar" id="gambar" accept="image/*"
                    class="w-full text-gray-700">
                @error('gambar')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition">Simpan</button>
                <a href="{{ route('produk.index') }}"
                    class="px-6 py-2 border border-gray-300 rounded-md hover:bg-gray-100 transition text-gray-700">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
