<x-app-layout>
    <h2>Edit Stok Bahan</h2>

    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Bahan:</label>
        <input type="text" name="namaBahan" value="{{ old('namaBahan', $stok->namaBahan) }}" required><br>

        <label>Stok:</label>
        <input type="number" name="stok" value="{{ old('stok', $stok->stok) }}" required><br>

        <label>Satuan:</label>
        <select name="satuan" required>
            @foreach (['kg', 'gram', 'liter', 'ml', 'pcs'] as $unit)
                <option value="{{ $unit }}" {{ $stok->satuan == $unit ? 'selected' : '' }}>{{ ucfirst($unit) }}</option>
            @endforeach
        </select><br>

        <label>Harga:</label>
        <input type="number" name="harga" value="{{ old('harga', $stok->harga) }}" required><br>

        <label>Kategori:</label>
        <select name="kategori" required>
            @foreach (['bahan mentah', 'bahan setengah jadi', 'bumbu', 'kemasan', 'lainnya'] as $kategori)
                <option value="{{ $kategori }}" {{ $stok->kategori == $kategori ? 'selected' : '' }}>
                    {{ ucfirst($kategori) }}
                </option>
            @endforeach
        </select><br>

        <label>Status Bahan:</label>
        <select name="statusBahan" required>
            @foreach (['tersedia', 'hampir habis', 'habis'] as $status)
                <option value="{{ $status }}" {{ $stok->statusBahan == $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select><br>

        <label>Catatan:</label>
        <textarea name="catatan">{{ old('catatan', $stok->catatan) }}</textarea><br>

        <button type="submit">Perbarui</button>
    </form>
</x-app-layout>
