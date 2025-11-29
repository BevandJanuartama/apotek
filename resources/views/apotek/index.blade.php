@extends('layouts.app')

{{-- Menetapkan judul halaman yang akan ditampilkan di layout utama --}}
@section('title', 'Data Apotek')

{{-- ========================================================================= --}}
{{-- BAGIAN IMPOR CSS/JS EKSTERNAL --}}
{{-- Catatan: Untuk proyek Laravel, sebaiknya impor ini dikelola oleh Vite/Webpack. --}}
{{-- ========================================================================= --}}

{{-- Import CSS untuk DataTables. Menggunakan versi dasar (non-Bootstrap/Tailwind) --}}
<link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

{{-- Import JQuery (DataTables membutuhkan JQuery) --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- Import JavaScript untuk DataTables --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
{{-- Import SweetAlert2 untuk notifikasi yang lebih interaktif (misalnya untuk konfirmasi hapus) --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- ========================================================================= --}}
{{-- BAGIAN KONTEN HALAMAN UTAMA --}}
{{-- ========================================================================= --}}
@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8">

    {{-- Judul Halaman --}}
    <h3 class="text-3xl font-bold text-gray-800 mb-6">Data Apotek</h3>

    {{-- Tombol Tambah Apotek Baru --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('apotek.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-150 ease-in-out">
            + Tambah Apotek
        </a>
    </div>

    {{-- Card untuk menampung tabel data --}}
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="p-4 sm:p-6">

            <div class="overflow-x-auto">
                {{-- Tabel DataTables. ID 'tableApotek' digunakan untuk inisialisasi JS --}}
                <table id="tableApotek" class="min-w-full divide-y divide-gray-200">
                    {{-- Header Tabel --}}
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nama Apotek</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Jam Buka</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Jam Tutup</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Body Tabel: Looping data apotek --}}
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($apoteks as $a)
                        <tr>
                            {{-- Nomor urut loop --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                            {{-- Data Apotek --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $a->nama_apotek }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a->telepon }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a->jam_buka }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $a->jam_tutup }}</td>
                            
                            {{-- Kolom Aksi (CRUD) --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                
                                {{-- Link Detail (READ) --}}
                                <a href="{{ route('apotek.show', $a->id) }}"
                                   class="text-blue-600 hover:text-blue-900 mr-2 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-blue-50">
                                    Detail
                                </a>
                                
                                {{-- Link Edit (UPDATE) --}}
                                <a href="{{ route('apotek.edit', $a->id) }}"
                                   class="text-yellow-600 hover:text-yellow-900 mr-2 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-yellow-50">
                                    Edit
                                </a>

                                {{-- Form Hapus (DELETE) --}}
                                <form action="{{ route('apotek.destroy', $a->id) }}" method="POST" class="inline">
                                    @csrf
                                    {{-- Laravel menggunakan directive @method('DELETE') untuk HTTP method spoofing --}}
                                    @method('DELETE')
                                    
                                    {{-- Tombol Hapus --}}
                                    {{-- Catatan: Fungsi konfirmasi SweetAlert (Swal) untuk hapus belum ditambahkan ke tombol ini --}}
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-red-50">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection


{{-- ========================================================================= --}}
{{-- BAGIAN SCRIPT JAVASCRIPT --}}
{{-- ========================================================================= --}}
<script>
    /**
     * Inisialisasi DataTables setelah dokumen (halaman) selesai dimuat.
     */
    $(document).ready(function() {
        $('#tableApotek').DataTable({
            // Konfigurasi DataTables:
            "language": {
                // Menggunakan paket bahasa Indonesia dari DataTables
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            },
        });
        
        // ====================================================================
        // Tambahkan Event Listener untuk SweetAlert konfirmasi hapus di sini
        // ====================================================================
        
        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>