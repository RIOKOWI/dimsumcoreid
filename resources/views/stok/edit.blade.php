<x-app-layout>
    <div class="container mx-auto p-6 max-w-lg">
        <h2 class="text-2xl font-bold text-red-600 mb-6">✏️ Edit Stok Bahan</h2>

        <form action="{{ route('stok.update', $stok->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="namaBahan" class="block text-sm font-medium text-gray-700 mb-1">Nama Bahan:</label>
                <input type="text" name="namaBahan" id="namaBahan" required
                    value="{{ old('namaBahan', $stok->namaBahan) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
                @error('namaBahan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok:</label>
                <input type="number" name="stok" id="stok" required min="0"
                    value="{{ old('stok', $stok->stok) }}"
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
                    <option value="kg" {{ old('satuan', $stok->satuan) == 'kg' ? 'selected' : '' }}>Kg</option>
                    <option value="gram" {{ old('satuan', $stok->satuan) == 'gram' ? 'selected' : '' }}>Gram</option>
                    <option value="liter" {{ old('satuan', $stok->satuan) == 'liter' ? 'selected' : '' }}>Liter</option>
                    <option value="ml" {{ old('satuan', $stok->satuan) == 'ml' ? 'selected' : '' }}>mL</option>
                    <option value="pcs" {{ old('satuan', $stok->satuan) == 'pcs' ? 'selected' : '' }}>Pcs</option>
                </select>
                @error('satuan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga:</label>
                <input type="number" name="harga" id="harga" required min="0"
                    value="{{ old('harga', $stok->harga) }}"
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
                    <option value="bahan mentah" {{ old('kategori', $stok->kategori) == 'bahan mentah' ? 'selected' : '' }}>Bahan Mentah</option>
                    <option value="bahan setengah jadi" {{ old('kategori', $stok->kategori) == 'bahan setengah jadi' ? 'selected' : '' }}>Bahan Setengah Jadi</option>
                    <option value="bumbu" {{ old('kategori', $stok->kategori) == 'bumbu' ? 'selected' : '' }}>Bumbu</option>
                    <option value="kemasan" {{ old('kategori', $stok->kategori) == 'kemasan' ? 'selected' : '' }}>Kemasan</option>
                    <option value="lainnya" {{ old('kategori', $stok->kategori) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                    <option value="tersedia" {{ old('statusBahan', $stok->statusBahan) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="hampir habis" {{ old('statusBahan', $stok->statusBahan) == 'hampir habis' ? 'selected' : '' }}>Hampir Habis</option>
                    <option value="habis" {{ old('statusBahan', $stok->statusBahan) == 'habis' ? 'selected' : '' }}>Habis</option>
                </select>
                @error('statusBahan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan:</label>
                <textarea name="catatan" id="catatan" rows="3"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('catatan', $stok->catatan) }}</textarea>
                @error('catatan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition">
                    Update
                </button>
                <a href="{{ route('stok.index') }}"
                   class="ml-4 inline-block px-4 py-2 text-gray-700 hover:underline">
                   Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
