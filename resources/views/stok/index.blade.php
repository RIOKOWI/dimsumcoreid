<x-app-layout>
    <h2>Daftar Stok Bahan</h2>
    <a href="{{ route('stok.create') }}">Tambah Bahan</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($stoks as $stok)
            <tr>
                <td>{{ $stok->namaBahan }}</td>
                <td>{{ $stok->stok }}</td>
                <td>{{ $stok->satuan }}</td>
                <td>{{ $stok->harga }}</td>
                <td>{{ $stok->kategori }}</td>
                <td>{{ $stok->statusBahan }}</td>
                <td>{{ $stok->catatan }}</td>
                <td>
                    <a href="{{ route('stok.edit', $stok->id) }}">Edit</a>
                    <form action="{{ route('stok.destroy', $stok->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
