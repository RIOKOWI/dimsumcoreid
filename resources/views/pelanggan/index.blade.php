<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h2 class="text-2xl font-bold text-red-600">📋 Daftar Pelanggan</h2>
            <a href="{{ route('pelanggan.create') }}"
               class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition">
                ➕ Tambah Pelanggan
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.remove();">
                    <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"><title>Close</title><path
                            d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/></svg>
                </span>
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                <thead class="bg-red-100 text-red-800 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left whitespace-nowrap">Nama</th>
                        <th class="px-4 py-3 text-left whitespace-nowrap">No Telepon</th>
                        <th class="px-4 py-3 text-left whitespace-nowrap">Email</th>
                        <th class="px-4 py-3 text-left whitespace-nowrap">Instagram</th>
                        <th class="px-4 py-3 text-left whitespace-nowrap">Alamat</th>
                        <th class="px-4 py-3 text-left whitespace-nowrap">Catatan</th>
                        <th class="px-4 py-3 text-center whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pelanggans as $pelanggan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 break-words">{{ $pelanggan->nama }}</td>
                            <td class="px-4 py-3 break-words">{{ $pelanggan->no_telepon }}</td>
                            <td class="px-4 py-3 break-words">{{ $pelanggan->email ?? '-' }}</td>
                            <td class="px-4 py-3 break-words">{{ $pelanggan->instagram ?? '-' }}</td>
                            <td class="px-4 py-3 break-words">{{ $pelanggan->alamat }}</td>
                            <td class="px-4 py-3 break-words">{{ $pelanggan->catatan ?? '-' }}</td>
                            <td class="px-4 py-3 text-center whitespace-nowrap">
                                <a href="{{ route('pelanggan.edit', $pelanggan) }}"
                                   class="inline-block text-yellow-600 hover:text-yellow-800 font-medium mr-2">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('pelanggan.destroy', $pelanggan) }}" method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Hapus pelanggan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 font-medium">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center px-4 py-6 text-gray-500">
                                Belum ada data pelanggan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
