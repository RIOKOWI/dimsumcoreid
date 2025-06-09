<x-app-layout>
    <h2>Edit Pelanggan</h2>

    <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required>
        @error('nama')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>No Telepon:</label>
        <input type="text" name="no_telepon" value="{{ old('no_telepon', $pelanggan->no_telepon) }}" required>
        @error('no_telepon')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}">
        @error('email')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Instagram:</label>
        <input type="text" name="instagram" value="{{ old('instagram', $pelanggan->instagram) }}">
        @error('instagram')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Alamat:</label>
        <textarea name="alamat" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
        @error('alamat')<div class="text-red-600">{{ $message }}</div>@enderror

        <label>Catatan:</label>
        <textarea name="catatan">{{ old('catatan', $pelanggan->catatan) }}</textarea>
        @error('catatan')<div class="text-red-600">{{ $message }}</div>@enderror

        <button type="submit">Update</button>
        <a href="{{ route('pelanggan.index') }}">Batal</a>
    </form>
</x-app-layout>
