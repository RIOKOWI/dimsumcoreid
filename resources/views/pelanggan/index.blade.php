<x-app-layout>
    <h2>Daftar Pelanggan</h2>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Instagram</th>
                <th>Alamat</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->no_telepon }}</td>
                    <td>{{ $pelanggan->email ?? '-' }}</td>
                    <td>{{ $pelanggan->instagram ?? '-' }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->catatan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pelanggan.edit', $pelanggan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus pelanggan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if ($pelanggans->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Data pelanggan kosong.</td>
                </tr>
            @endif
        </tbody>
    </table>
</x-app-layout>
