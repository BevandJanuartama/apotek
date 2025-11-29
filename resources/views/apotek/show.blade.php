@extends('layouts.app')

@section('title', 'Detail Apotek dan Daftar Obat')

@push('styles')
    {{-- DataTables CSS --}}
    {{-- Diperlukan untuk styling DataTables dan mode responsive --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@section('content')
<div class="container mx-auto p-4 sm:p-6 lg:p-8">

    {{-- Header Halaman --}}
    <h3 class="text-3xl font-bold text-gray-800 mb-6">Detail Apotek: {{ $apotek->nama_apotek }}</h3>

    {{-- Card Detail Apotek --}}
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
        <div class="p-6 sm:px-8 bg-white border-b border-gray-200">
            <h5 class="text-xl font-semibold mb-3 text-indigo-600">Informasi Dasar Apotek</h5>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <p><strong>Alamat:</strong> {{ $apotek->alamat }}</p>
                <p><strong>Telepon:</strong> {{ $apotek->telepon }}</p>
                <p>
                    <strong>Jam Operasional:</strong> 
                    <span class="font-mono bg-gray-100 px-2 py-0.5 rounded text-sm">
                        {{ $apotek->jam_buka }} - {{ $apotek->jam_tutup }}
                    </span>
                </p>
            </div>

            {{-- Tombol Kembali --}}
            <a href="{{ route('apotek.index') }}" 
               class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 transition duration-150 ease-in-out">
               Kembali
            </a>
        </div>
    </div>

    {{-- Daftar Obat yang Terkait dengan Apotek Ini --}}
    <h3 class="text-2xl font-bold text-gray-800 mb-4">Daftar Obat di Apotek Ini</h3>

    {{-- Tombol Tambah Obat Baru --}}
    <div class="flex justify-end mb-4">
        {{-- Route 'obat.create' harus menerima apotek_id agar obat terasosiasi --}}
        <a href="{{ route('obat.create', ['apotek_id' => $apotek->id]) }}" 
           class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-150 ease-in-out">
           + Tambah Obat Baru
        </a>
    </div>

    {{-- Card Tabel Obat --}}
    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="p-4 sm:p-6">
            <div class="overflow-x-auto">
                {{-- Tabel DataTables untuk Obat --}}
                <table id="tableObat" class="min-w-full divide-y divide-gray-200 w-full text-sm">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Obat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Kegunaan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cara Minum</th>
                            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Loop melalui relasi 'obats' dari model Apotek --}}
                        @forelse ($apotek->obats as $index => $obat)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $obat->nama_obat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $obat->kategori }}</td>
                            {{-- Menampilkan kegunaan/keterangan, diatur agar tidak terlalu lebar --}}
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs overflow-hidden">{{ $obat->keterangan ?? $obat->kegunaan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $obat->cara_minum }} sehari {{ $obat->waktu_minum }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                {{-- Link Aksi --}}
                                <a href="{{ route('obat.show', $obat->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 mr-2 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-blue-50">
                                    Detail
                                </a>
                                <a href="{{ route('obat.edit', $obat->id) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 mr-2 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-yellow-50">
                                    Edit
                                </a>
                                {{-- Tombol Hapus dengan SweetAlert konfirmasi --}}
                                <button type="button" 
                                        class="text-red-600 hover:text-red-900 inline-block py-1 px-2 rounded transition duration-150 ease-in-out hover:bg-red-50"
                                        onclick="confirmDeleteObat({{ $obat->id }})">
                                    Hapus
                                </button>
                                {{-- Form DELETE tersembunyi untuk dikirim oleh SweetAlert --}}
                                <form id="formDeleteObat{{ $obat->id }}" 
                                      action="{{ route('obat.destroy', $obat->id) }}" method="POST" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        {{-- Pesan jika tidak ada obat --}}
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center italic">
                                Belum ada obat yang terdaftar untuk apotek ini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

{{-- ========================================================================= --}}
{{-- BAGIAN JAVASCRIPT --}}
{{-- ========================================================================= --}}
@push('scripts')
{{-- Import JS eksternal --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/**
 * Menampilkan konfirmasi SweetAlert sebelum menghapus data obat.
 * Jika dikonfirmasi, form DELETE yang tersembunyi akan disubmit.
 * @param {number} id - ID Obat yang akan dihapus
 */
function confirmDeleteObat(id) {
    Swal.fire({
        title: "Hapus Obat?",
        text: "Data obat akan dihapus permanen dari apotek ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        // Menggunakan customClass untuk styling Tailwind pada tombol SweetAlert
        customClass: {
            confirmButton: 'bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
            cancelButton: 'bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2 focus:outline-none focus:shadow-outline'
        },
        buttonsStyling: false // Penting agar customClass bekerja
    }).then((result) => {
        if(result.isConfirmed){
            document.getElementById('formDeleteObat'+id).submit();
        }
    });
}

/**
 * Inisialisasi DataTables setelah dokumen dimuat.
 */
$(document).ready(function() {
    $('#tableObat').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        // Dihapus: autoWidth: false,
        columnDefs: [
            // Menonaktifkan ordering dan searching pada kolom Aksi (indeks 5)
            { orderable: false, targets: [5] },
            { searchable: false, targets: [5] }
        ],
        // Menggunakan paket bahasa Indonesia
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
        }
    });
});
</script>
@endpush