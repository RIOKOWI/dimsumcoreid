<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 sm:p-8 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Tambah Penjualan</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 dark:bg-green-900 dark:text-green-100">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('penjualan.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="tanggal_penjualan" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Tanggal Penjualan</label>
                <input type="date" name="tanggal_penjualan" required
                       class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="id_produk" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Produk</label>
                <select name="id_produk" id="id_produk" required
                        class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">
                            {{ $produk->nama }} (Rp {{ number_format($produk->harga, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama Pelanggan</label>
                <input list="daftar_pelanggan" name="nama_pelanggan" required
                       class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                       placeholder="Ketik nama atau pilih...">
                <datalist id="daftar_pelanggan">
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->nama }}">
                    @endforeach
                </datalist>
            </div>

            <div>
                <label for="total_item" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Jumlah Item</label>
                <input type="number" name="total_item" id="total_item" min="1" required
                       class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </div>

            <div>
                <label for="total_harga" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Total Harga</label>
                <input type="number" name="total_harga" id="total_harga" readonly
                       class="w-full px-3 py-2 border rounded-lg bg-gray-100 dark:bg-gray-600 dark:text-white dark:border-gray-500">
            </div>

            <div>
                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Metode Pembayaran</label>
                <select name="metode_pembayaran" required
                        class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>

            <div>
                <label for="status_transaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Status Transaksi</label>
                <select name="status_transaksi" required
                        class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="selesai">Selesai</option>
                    <option value="tertunda">Tertunda</option>
                </select>
            </div>

            <div>
                <label for="catatan_transaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Catatan</label>
                <textarea name="catatan_transaksi" rows="2"
                          class="w-full px-3 py-2 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                          placeholder="Opsional..."></textarea>
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-red py-2 px-4 rounded-lg shadow dark:bg-blue-500 dark:hover:bg-blue-600 transition">
                    Simpan Penjualan
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
    </script>
</x-app-layout>
