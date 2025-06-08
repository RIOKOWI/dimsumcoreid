<form action="{{ isset($produk) ? route('produk.update', $produk) : route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($produk)) @method('PUT') @endif

    <label>Nama:</label>
    <input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}" required><br>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" required>{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea><br>

    <label>Kategori:</label>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="siap saji" {{ old('kategori', $produk->kategori ?? '') == 'siap saji' ? 'selected' : '' }}>Siap Saji</option>
        <option value="frozen" {{ old('kategori', $produk->kategori ?? '') == 'frozen' ? 'selected' : '' }}>Frozen</option>
    </select><br>

    <label>Harga:</label>
    <input type="number" name="harga" value="{{ old('harga', $produk->harga ?? '') }}" required><br>

    <label>Stok:</label>
    <input type="number" name="stok" value="{{ old('stok', $produk->stok ?? '') }}" required><br>

    <label>Gambar:</label>
    <input type="file" name="gambar"><br>
    @if (isset($produk) && $produk->gambar)
        <img src="{{ asset('storage/' . $produk->gambar) }}" width="100" alt="Gambar produk">
    @endif

    <button type="submit">Simpan</button>
</form>
