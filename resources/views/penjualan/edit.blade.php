<x-app-layout>
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">

    <h1 class="text-2xl font-semibold mb-6">{{ isset($penjualan) ? 'Edit Penjualan' : 'Tambah Penjualan' }}</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($penjualan) ? route('penjualan.update', $penjualan->id) : route('penjualan.store') }}" method="POST" class="space-y-5">
        @csrf
        @if(isset($penjualan))
            @method('PUT')
        @endif

        <!-- Tanggal Penjualan -->
        <div>
            <label class="block font-medium mb-1">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" required
                   class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300"
                   value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan ?? '') }}">
        </div>

        <!-- Produk -->
        <div>
            <label class="block font-medium mb-1">Produk</label>
            <select name="id_produk" id="id_produk" required
                    class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300">
                <option value="">-- Pilih Produk --</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}"
                        data-harga="{{ $produk->harga }}"
                        {{ (old('id_produk', $penjualan->id_produk ?? '') == $produk->id) ? 'selected' : '' }}>
                        {{ $produk->nama }} (Rp {{ number_format($produk->harga, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nama Pelanggan -->
        <div>
            <label class="block font-medium mb-1">Nama Pelanggan</label>
            <input list="daftar_pelanggan" name="nama_pelanggan" required
                   class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300"
                   value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan ?? '') }}"
                   placeholder="Ketik nama atau pilih...">
            <datalist id="daftar_pelanggan">
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->nama }}">
                @endforeach
            </datalist>
        </div>

        <!-- Total Item -->
        <div>
            <label class="block font-medium mb-1">Jumlah Item</label>
            <input type="number" name="total_item" id="total_item" min="1" required
                   class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300"
                   value="{{ old('total_item', $penjualan->total_item ?? '') }}">
        </div>

        <!-- Total Harga -->
        <div>
            <label class="block font-medium mb-1">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" readonly
                   class="w-full bg-gray-100 border border-gray-300 p-2 rounded"
                   value="{{ old('total_harga', $penjualan->total_harga ?? '') }}">
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label class="block font-medium mb-1">Metode Pembayaran</label>
            <select name="metode_pembayaran" required
                    class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300">
                <option value="cash" {{ (old('metode_pembayaran', $penjualan->metode_pembayaran ?? '') == 'cash') ? 'selected' : '' }}>Cash</option>
                <option value="transfer" {{ (old('metode_pembayaran', $penjualan->metode_pembayaran ?? '') == 'transfer') ? 'selected' : '' }}>Transfer</option>
            </select>
        </div>

        <!-- Status Transaksi -->
        <div>
            <label class="block font-medium mb-1">Status Transaksi</label>
            <select name="status_transaksi" required
                    class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300">
                <option value="selesai" {{ (old('status_transaksi', $penjualan->status_transaksi ?? '') == 'selesai') ? 'selected' : '' }}>Selesai</option>
                <option value="tertunda" {{ (old('status_transaksi', $penjualan->status_transaksi ?? '') == 'tertunda') ? 'selected' : '' }}>Tertunda</option>
            </select>
        </div>

        <!-- Catatan -->
        <div>
            <label class="block font-medium mb-1">Catatan</label>
            <textarea name="catatan_transaksi" rows="2"
                      class="w-full border border-gray-300 p-2 rounded focus:ring focus:ring-blue-300"
                      placeholder="Opsional...">{{ old('catatan_transaksi', $penjualan->catatan_transaksi ?? '') }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <a href="{{ route('penjualan.index') }}"
               class="px-4 py-2 rounded bg-gray-500 text-white hover:bg-gray-600">Kembali</a>
            <button type="submit"
                    class="px-4 py-2 rounded bg-blue-600 text-red hover:bg-blue-700">
                {{ isset($penjualan) ? 'Update' : 'Simpan Penjualan' }}
            </button>
        </div>
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
    document.addEventListener('DOMContentLoaded', hitungTotalHarga);
</script>
</x-app-layout>
