<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Data Penjualan</h1>

    @if($errors->any())
        <div class="bg-red-200 text-red-800 px-4 py-2 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" class="w-full border p-2 rounded"
                   value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Produk</label>
            <select name="id_produk" class="w-full border p-2 rounded" required>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" {{ $produk->id == $penjualan->id_produk ? 'selected' : '' }}>
                        {{ $produk->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="w-full border p-2 rounded"
                   value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan) }}" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Total Item</label>
            <input type="number" name="total_item" min="1" class="w-full border p-2 rounded"
                   value="{{ old('total_item', $penjualan->total_item) }}" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="w-full border p-2 rounded" required>
                <option value="cash" {{ $penjualan->metode_pembayaran == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="transfer" {{ $penjualan->metode_pembayaran == 'transfer' ? 'selected' : '' }}>Transfer</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Status Transaksi</label>
            <select name="status_transaksi" class="w-full border p-2 rounded" required>
                <option value="selesai" {{ $penjualan->status_transaksi == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="tertunda" {{ $penjualan->status_transaksi == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Catatan Transaksi</label>
            <textarea name="catatan_transaksi" class="w-full border p-2 rounded">{{ old('catatan_transaksi', $penjualan->catatan_transaksi) }}</textarea>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('penjualan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        </div>
    </form>
</div>
</x-app-layout>
