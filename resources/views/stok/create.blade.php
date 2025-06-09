<x-app-layout>
    <h2>Tambah Stok Bahan</h2>

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf
        <label>Nama Bahan:</label>
        <input type="text" name="namaBahan" required><br>

        <label>Stok:</label>
        <input type="number" name="stok" required><br>

        <label>Satuan:</label>
        <select name="satuan" required>
            <option value="kg">Kg</option>
            <option value="gram">Gram</option>
            <option value="liter">Liter</option>
            <option value="ml">mL</option>
            <option value="pcs">Pcs</option>
        </select><br>

        <label>Harga:</label>
        <input type="number" name="harga" required><br>

        <label>Kategori:</label>
        <select name="kategori" required>
            <option value="bahan mentah">Bahan Mentah</option>
            <option value="bahan setengah jadi">Bahan Setengah Jadi</option>
            <option value="bumbu">Bumbu</option>
            <option value="kemasan">Kemasan</option>
            <option value="lainnya">Lainnya</option>
        </select><br>

        <label>Status Bahan:</label>
        <select name="statusBahan" required>
            <option value="tersedia">Tersedia</option>
            <option value="hampir habis">Hampir Habis</option>
            <option value="habis">Habis</option>
        </select><br>

        <label>Catatan:</label>
        <textarea name="catatan"></textarea><br>

        <button type="submit">Simpan</button>
    </form>
</x-app-layout>
