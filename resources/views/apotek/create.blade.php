@extends('layouts.app')

{{-- Menetapkan judul halaman untuk layout utama --}}
@section('title', 'Tambah Apotek')

{{-- ========================================================================= --}}
{{-- BAGIAN KONTEN UTAMA --}}
{{-- ========================================================================= --}}
@section('content')
{{-- Container utama form: Lebar maksimum 4xl, di tengah halaman (mx-auto), dengan padding responsif --}}
<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
    
    {{-- Judul Halaman --}}
    <h3 class="text-2xl font-bold mb-6 text-gray-800">Tambah Apotek</h3>

    {{-- Tombol "Kembali" ke halaman daftar apotek --}}
    <a href="{{ route('apotek.index') }}" 
       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mb-6 transition duration-150 ease-in-out">
        Kembali
    </a>

    {{-- Card untuk membungkus formulir --}}
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-8 bg-white border-b border-gray-200">

            {{-- Formulir untuk mengirim data ke route 'apotek.store' (biasanya menggunakan method POST) --}}
            <form action="{{ route('apotek.store') }}" method="POST">
                {{-- Directive wajib Laravel untuk proteksi Cross-Site Request Forgery (CSRF) --}}
                @csrf

                {{-- Input: Nama Apotek --}}
                <div class="mb-4">
                    <label for="nama_apotek" class="block text-sm font-medium text-gray-700 mb-1">Nama Apotek</label>
                    <input type="text" name="nama_apotek" id="nama_apotek"
                        {{-- Styling input dengan Tailwind --}}
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        {{-- old() mempertahankan input jika terjadi error validasi --}}
                        value="{{ old('nama_apotek') }}" required>
                    {{-- Catatan: Tambahkan @error('nama_apotek') untuk menampilkan pesan error di bawah input --}}
                </div>

                {{-- Input: Alamat (Textarea) --}}
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>{{ old('alamat') }}</textarea>
                </div>

                {{-- Input: Telepon --}}
                <div class="mb-4">
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="telepon" id="telepon"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('telepon') }}" required>
                </div>

                {{-- Input: Jam Buka (Tipe 'time') --}}
                <div class="mb-4">
                    <label for="jam_buka" class="block text-sm font-medium text-gray-700 mb-1">Jam Buka</label>
                    <input type="time" name="jam_buka" id="jam_buka"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('jam_buka') }}" required>
                </div>

                {{-- Input: Jam Tutup (Tipe 'time') --}}
                <div class="mb-6">
                    <label for="jam_tutup" class="block text-sm font-medium text-gray-700 mb-1">Jam Tutup</label>
                    <input type="time" name="jam_tutup" id="jam_tutup"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('jam_tutup') }}" required>
                </div>

                {{-- Kontrol Aksi: Tombol Simpan --}}
                <div class="flex items-center justify-end">
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection