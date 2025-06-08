<x-app-layout>
    <h2>Daftar Produk</h2>
    <a href="{{ route('produk.create') }}">Tambah Produk</a>

    @foreach ($produks as $produk)
        <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
            <h3>{{ $produk->nama }}</h3>
            <p><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p> <!-- tambahan -->
            <p><strong>Kategori:</strong> {{ ucfirst($produk->kategori) }}</p> <!-- tambahan -->
            <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p> <!-- format harga -->
            <p><strong>Stok:</strong> {{ $produk->stok }}</p>

            @if ($produk->gambar)
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="gambar" width="100">
            @endif

            <a href="{{ route('produk.edit', $produk) }}">Edit</a>
            <form action="{{ route('produk.destroy', $produk) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin hapus produk ini?')">Hapus</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
