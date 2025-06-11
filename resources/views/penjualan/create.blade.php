<x-app-layout>

<div class="container">
    <h2>Tambah Penjualan</h2>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_produk" class="form-label">Produk</label>
            <select name="id_produk" id="id_produk" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">
                        {{ $produk->nama }} (Rp {{ number_format($produk->harga, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input list="daftar_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Ketik nama atau pilih..." required>
            <datalist id="daftar_pelanggan">
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->nama }}">
                @endforeach
            </datalist>
        </div>

        <div class="mb-3">
            <label for="total_item" class="form-label">Jumlah Item</label>
            <input type="number" name="total_item" id="total_item" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="cash">Cash</option>
                <option value="transfer">Transfer</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status_transaksi" class="form-label">Status Transaksi</label>
            <select name="status_transaksi" class="form-control" required>
                <option value="selesai">Selesai</option>
                <option value="tertunda">Tertunda</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="catatan_transaksi" class="form-label">Catatan</label>
            <textarea name="catatan_transaksi" class="form-control" rows="2" placeholder="Opsional..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Penjualan</button>
    </form>
</div>

<script>
    const produkSelect = document.getElementById('id_produk');
    const totalItemInput = document.getElementById('total_item');
    const totalHargaInput = document.getElementById('total_harga');

    function hitungTotalHarga() {
        const selectedOption = produkSelect.options[produkSelect.selectedIndex];
        const harga = parseFloat(selectedOption.getAttribute('data-harga') || 0);
        const jumlah = parseInt(totalItemInput.value) || 0;

        totalHargaInput.value = harga * jumlah;
    }

    produkSelect.addEventListener('change', hitungTotalHarga);
    totalItemInput.addEventListener('input', hitungTotalHarga);
</script>


</x-app-layout>