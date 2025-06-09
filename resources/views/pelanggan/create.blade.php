<x-app-layout>
    <h2>Tambah Pelanggan</h2>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required>
        @error('nama')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>No Telepon:</label>
        <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" required>
        @error('no_telepon')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Instagram:</label>
        <input type="text" name="instagram" value="{{ old('instagram') }}">
        @error('instagram')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Alamat:</label>
        <textarea name="alamat" required>{{ old('alamat') }}</textarea>
        @error('alamat')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Catatan:</label>
        <textarea name="catatan">{{ old('catatan') }}</textarea>
        @error('catatan')<div class="text-red-600">{{ $message }}</div>@enderror

        <button type="submit">Simpan</button>
        <a href="{{ route('pelanggan.index') }}">Batal</a>
    </form>
</x-app-layout>
