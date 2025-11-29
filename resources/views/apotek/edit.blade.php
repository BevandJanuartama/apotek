@extends('layouts.app')

{{-- Menetapkan judul halaman --}}
@section('title', 'Edit Apotek')

{{-- ========================================================================= --}}
{{-- BAGIAN KONTEN UTAMA --}}
{{-- ========================================================================= --}}
@section('content')
{{-- Container utama form: Lebar maksimum 4xl, di tengah halaman (mx-auto), dengan padding responsif --}}
<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
    
    {{-- Judul Halaman --}}
    <h3 class="text-2xl font-bold mb-6 text-gray-800">Edit Apotek</h3>

    {{-- Card untuk membungkus formulir --}}
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 sm:px-8">

        {{-- Formulir untuk mengirim data ke route 'apotek.update' --}}
        {{-- Menggunakan ID apotek yang akan diedit sebagai parameter route --}}
        <form action="{{ route('apotek.update', $apotek->id) }}" method="POST">
            
            {{-- Directive wajib Laravel untuk proteksi CSRF --}}
            @csrf
            
            {{-- Method Spoofing: Laravel menggunakan POST, tetapi @method('PUT') --}}
            {{-- menginstruksikan Laravel untuk memperlakukan request ini sebagai PUT (untuk update) --}}
            @method('PUT')

            {{-- Input: Nama Apotek --}}
            <div class="mb-4">
                <label for="nama_apotek" class="block text-sm font-medium text-gray-700 mb-1">Nama Apotek</label>
                <input type="text" name="nama_apotek" id="nama_apotek" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    {{-- Menggunakan old() untuk data yang gagal validasi, dan $apotek->nama_apotek sebagai nilai default --}}
                    value="{{ old('nama_apotek', $apotek->nama_apotek) }}" required>
            </div>

            {{-- Input: Alamat (Textarea) --}}
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>{{ old('alamat', $apotek->alamat) }}</textarea>
            </div>

            {{-- Input: Telepon --}}
            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                <input type="text" name="telepon" id="telepon"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('telepon', $apotek->telepon) }}" required>
            </div>

            {{-- Input: Jam Buka (Tipe 'time') --}}
            <div class="mb-4">
                <label for="jam_buka" class="block text-sm font-medium text-gray-700 mb-1">Jam Buka</label>
                <input type="time" name="jam_buka" id="jam_buka"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('jam_buka', $apotek->jam_buka) }}" required>
            </div>

            {{-- Input: Jam Tutup (Tipe 'time') --}}
            <div class="mb-6">
                <label for="jam_tutup" class="block text-sm font-medium text-gray-700 mb-1">Jam Tutup</label>
                <input type="time" name="jam_tutup" id="jam_tutup"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('jam_tutup', $apotek->jam_tutup) }}" required>
            </div>

            {{-- Kontrol Aksi: Tombol Update dan Kembali --}}
            <div class="flex items-center justify-start space-x-4">
                {{-- Tombol Submit untuk Update --}}
                <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Update
                </button>
                {{-- Tombol Kembali ke halaman daftar apotek --}}
                <a href="{{ route('apotek.index') }}" class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                    Kembali
                </a>
            </div>
        </form>

    </div>
</div>
@endsection