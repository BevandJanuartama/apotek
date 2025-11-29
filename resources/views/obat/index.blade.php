@extends('layouts.app')

@section('title', 'Data Apotek')

{{-- ========================================================================= --}}
{{-- IMPORT CSS & JS CDN --}}
{{-- ========================================================================= --}}
{{-- CSS DataTables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
{{-- JQuery (Wajib sebelum DataTables dan SweetAlert2) --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
{{-- JS DataTables --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
{{-- JS SweetAlert2 untuk notifikasi/konfirmasi --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8">

    {{-- Judul Halaman --}}
    <h3 class="text-3xl font-bold text-gray-800 mb-6">Data Apotek</h3>

    {{-- Tombol Tambah Data --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('obat.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-150 ease-in-out">
            + Tambah Obat
        </a>
    </div>

    {{-- Kontainer Tabel Data --}}
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="p-4 sm:p-6">
            <div class="overflow-x-auto">
                {{-- Tabel untuk menampilkan data Obat --}}
                <table id="tableObat" class="min-w-full divide-y divide-gray-200 w-full text-sm">
                    {{-- Header Tabel --}}
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Obat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Apotek</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cara Minum</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Waktu Minum</th>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Isi/Body Tabel (Looping Data) --}}
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Melakukan loop pada koleksi data $obats yang dikirim dari controller --}}
                        @foreach ($obats as $obat)
                        <tr>
                            {{-- Nomor urut menggunakan $loop->iteration (fitur bawaan Blade) --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                            {{-- Nama Obat --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $obat->nama_obat }}</td>
                            {{-- Kategori --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $obat->kategori }}</td>
                            {{-- Keterangan (Diberi max-w-xs untuk menghindari kolom terlalu lebar) --}}
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs overflow-hidden">{{ $obat->keterangan }}</td>
                            {{-- Nama Apotek (Menggunakan optional operator `??` untuk relasi Apotek) --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $obat->apotek->nama_apotek ?? '-' }}</td>
                            {{-- Cara Minum --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $obat->cara_minum }} sehari</td>
                            {{-- Waktu Minum --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $obat->waktu_minum }}</td>
                            
                            {{-- Kolom Aksi (Detail, Edit, Hapus) --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                {{-- Link Detail --}}
                                <a href="{{ route('obat.show', $obat->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 mr-1 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-blue-50">
                                    Detail
                                </a>
                                {{-- Link Edit --}}
                                <a href="{{ route('obat.edit', $obat->id) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 mr-1 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-yellow-50">
                                    Edit
                                </a>
                                {{-- Tombol Hapus (Memicu SweetAlert) --}}
                                <button type="button" 
                                        class="text-red-600 hover:text-red-900 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-red-50 delete-button"
                                        data-id="{{ $obat->id }}">
                                    Hapus
                                </button>
                                
                                {{-- Form DELETE tersembunyi untuk proses hapus (akan dipicu oleh SweetAlert) --}}
                                <form id="formDelete{{ $obat->id }}" action="{{ route('obat.destroy', $obat->id) }}" method="POST" hidden>
                                    @csrf
                                    @method('DELETE') {{-- Menggunakan method spoofing untuk DELETE --}}
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
{{-- SCRIPT JAVASCRIPT --}}
{{-- ========================================================================= --}}
<script>
$(document).ready(function() {
    {{-- 1. Inisialisasi DataTables --}}
    $('#tableObat').DataTable({
        // Konfigurasi DataTables:
        "language": {
            // Menggunakan paket bahasa Indonesia dari DataTables
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
        },
    });

    {{-- 2. Logika SweetAlert untuk konfirmasi hapus --}}
    $(document).on('click', '.delete-button', function() {
        const id = $(this).data('id'); // Ambil ID dari atribut data-id tombol
        
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33', // Merah
            cancelButtonColor: '#3085d6', // Biru
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            // Jika pengguna mengklik "Ya, Hapus!"
            if(result.isConfirmed){
                // Submit form DELETE yang tersembunyi sesuai dengan ID
                document.getElementById('formDelete' + id).submit();
            }
        });
    });
});
</script>