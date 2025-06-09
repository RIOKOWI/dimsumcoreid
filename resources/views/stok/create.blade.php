<x-app-layout>
    <div class="container mx-auto p-6 max-w-lg">
        <h2 class="text-2xl font-bold text-red-600 mb-6">➕ Tambah Stok Bahan</h2>

        <form action="{{ route('stok.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="namaBahan" class="block text-sm font-medium text-gray-700 mb-1">Nama Bahan:</label>
                <input type="text" name="namaBahan" id="namaBahan" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
                @error('namaBahan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok:</label>
                <input type="number" name="stok" id="stok" required min="0"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
                @error('stok')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">Satuan:</label>
                <select name="satuan" id="satuan" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">-- Pilih Satuan --</option>
                    <option value="kg">Kg</option>
                    <option value="gram">Gram</option>
                    <option value="liter">Liter</option>
                    <option value="ml">mL</option>
                    <option value="pcs">Pcs</option>
                </select>
                @error('satuan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga:</label>
                <input type="number" name="harga" id="harga" required min="0"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
                @error('harga')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori:</label>
                <select name="kategori" id="kategori" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="bahan mentah">Bahan Mentah</option>
                    <option value="bahan setengah jadi">Bahan Setengah Jadi</option>
                    <option value="bumbu">Bumbu</option>
                    <option value="kemasan">Kemasan</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                @error('kategori')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="statusBahan" class="block text-sm font-medium text-gray-700 mb-1">Status Bahan:</label>
                <select name="statusBahan" id="statusBahan" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">-- Pilih Status --</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="hampir habis">Hampir Habis</option>
                    <option value="habis">Habis</option>
                </select>
                @error('statusBahan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan:</label>
                <textarea name="catatan" id="catatan" rows="3" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                @error('catatan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" 
                    class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition">
                    Simpan
                </button>
                <a href="{{ route('stok.index') }}" 
                   class="ml-4 inline-block px-4 py-2 text-gray-700 hover:underline">
                   Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
