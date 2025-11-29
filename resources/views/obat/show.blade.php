@extends('layouts.app')

@section('title', 'Detail Obat')

@section('content')
<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
    
    {{-- Judul Halaman --}}
    <h3 class="text-2xl font-bold mb-6 text-gray-800">Detail Obat 🔎</h3>

    {{-- Kartu Kontainer Detail --}}
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
        <div class="p-6 sm:px-8 bg-white border-b border-gray-200 text-gray-700">
            
            {{-- Bagian Informasi Obat --}}
            <h5 class="text-xl font-semibold mb-4 text-indigo-600 border-b pb-2">Informasi Obat</h5>
            
            <div class="space-y-2 mb-6">
                <p><strong>Nama Obat:</strong> <span class="font-medium text-gray-900">{{ $obat->nama_obat }}</span></p>
                <p><strong>Kategori:</strong> {{ $obat->kategori }}</p>
                <p><strong>Keterangan:</strong> {{ $obat->keterangan }}</p>
                <p><strong>Cara Minum:</strong> {{ $obat->cara_minum }} sehari</p>
                <p><strong>Waktu Minum:</strong> {{ $obat->waktu_minum }}</p>
            </div>

            <hr class="my-6 border-gray-300">

            {{-- Bagian Informasi Apotek (Relasi) --}}
            <h5 class="text-xl font-semibold mb-4 text-indigo-600 border-b pb-2">Info Apotek</h5>
            
            {{-- Cek apakah obat memiliki relasi apotek (menghindari error jika apotek_id null) --}}
            @if($obat->apotek)
                <div class="space-y-2">
                    <p><strong>Nama Apotek:</strong> {{ $obat->apotek->nama_apotek }}</p>
                    <p><strong>Alamat:</strong> {{ $obat->apotek->alamat }}</p>
                    <p><strong>Telepon:</strong> {{ $obat->apotek->telepon }}</p>
                    {{-- Menampilkan jam buka/tutup dengan styling khusus --}}
                    <p><strong>Jam Buka - Tutup:</strong> <span class="font-mono bg-gray-100 px-2 py-0.5 rounded text-sm">{{ $obat->apotek->jam_buka }} - {{ $obat->apotek->jam_tutup }}</span></p>
                </div>
            @else
                {{-- Pesan jika relasi apotek tidak ditemukan --}}
                <p class="text-red-500 font-medium">Apotek tidak ditemukan untuk obat ini.</p>
            @endif
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex space-x-3">
        {{-- Tombol Kembali ke Index --}}
        <a href="{{ route('obat.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            Kembali
        </a>
        {{-- Tombol Edit (Mengarah ke route edit dengan ID obat) --}}
        <a href="{{ route('obat.edit', $obat->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-gray-800 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150 ease-in-out">
            Edit Obat
        </a>
    </div>
</div>
@endsection