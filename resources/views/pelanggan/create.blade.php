<x-app-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        <h2 class="text-2xl font-semibold text-red-600 mb-6">➕ Tambah Pelanggan</h2>

        <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block mb-1 font-medium text-gray-700">Nama <span class="text-red-500">*</span></label>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 @error('nama') border-red-600 @enderror" />
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="no_telepon" class="block mb-1 font-medium text-gray-700">No Telepon <span class="text-red-500">*</span></label>
                <input id="no_telepon" type="text" name="no_telepon" value="{{ old('no_telepon') }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 @error('no_telepon') border-red-600 @enderror" />
                @error('no_telepon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 @error('email') border-red-600 @enderror" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="instagram" class="block mb-1 font-medium text-gray-700">Instagram</label>
                <input id="instagram" type="text" name="instagram" value="{{ old('instagram') }}"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 @error('instagram') border-red-600 @enderror" />
                @error('instagram')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block mb-1 font-medium text-gray-700">Alamat <span class="text-red-500">*</span></label>
                <textarea id="alamat" name="alamat" rows="3" required
                    class="w-full px-4 py-2 border rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-red-500 @error('alamat') border-red-600 @enderror">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="catatan" class="block mb-1 font-medium text-gray-700">Catatan</label>
                <textarea id="catatan" name="catatan" rows="3"
                    class="w-full px-4 py-2 border rounded-md resize-y focus:outline-none focus:ring-2 focus:ring-red-500 @error('catatan') border-red-600 @enderror">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-md shadow transition">
                    Simpan
                </button>
                <a href="{{ route('pelanggan.index') }}"
                    class="text-gray-600 hover:text-gray-900 font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
