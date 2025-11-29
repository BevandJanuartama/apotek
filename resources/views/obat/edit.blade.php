@extends('layouts.app')

@section('title', 'Edit Obat')

@section('content')
<div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8">
    
    {{-- Judul Halaman --}}
    <h3 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Obat</h3>

    {{-- Tombol Kembali ke Daftar Obat --}}
    <a href="{{ route('obat.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mb-6 transition duration-150 ease-in-out">
        Kembali
    </a>

    {{-- Kartu Kontainer Formulir --}}
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-8 bg-white border-b border-gray-200">
            
            {{-- Formulir Edit Obat --}}
            {{-- Mengarah ke route 'obat.update' dengan ID obat, dan menggunakan method spoofing PUT --}}
            <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                @csrf {{-- Token CSRF wajib --}}
                @method('PUT') {{-- Method Spoofing untuk HTTP PUT (Update) --}}

                <div class="mb-4">
                    <label for="nama_obat" class="block text-sm font-medium text-gray-700 mb-1">Nama Obat</label>
                    <input type="text" name="nama_obat" id="nama_obat" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        {{-- Menggunakan helper old() dengan fallback nilai $obat->nama_obat --}}
                        value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" id="kategori" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('kategori', $obat->kategori) }}" required>
                </div>

                <div class="mb-4">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>{{ old('keterangan', $obat->keterangan) }}</textarea>
                </div>

                {{-- Memerlukan variabel $apoteks (semua data apotek) dan $obat (data obat yang diedit) --}}
                <div class="mb-4">
                    <label for="apotek_id" class="block text-sm font-medium text-gray-700 mb-1">Apotek</label>
                    <select name="apotek_id" id="apotek_id" 
                        class="mt-1 block w-full pl-3 pr-10 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                        <option value="">-- Pilih Apotek --</option>
                        {{-- Loop untuk menampilkan semua apotek --}}
                        @foreach ($apoteks as $apotek)
                            <option 
                                value="{{ $apotek->id }}" 
                                {{-- Menentukan opsi yang terpilih: old input atau nilai dari $obat saat ini --}}
                                {{ old('apotek_id', $obat->apotek_id) == $apotek->id ? 'selected' : '' }}>
                                {{ $apotek->nama_apotek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="cara_minum" class="block text-sm font-medium text-gray-700 mb-1">Cara Minum</label>
                    <div class="flex items-center">
                        <input type="text" name="cara_minum" id="cara_minum" 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ old('cara_minum', $obat->cara_minum) }}" required
                            placeholder="Contoh: 3x">
                        <span class="ml-2 text-gray-700 whitespace-nowrap">sehari</span> {{-- Pelengkap visual --}}
                    </div>
                </div>

                <div class="mb-6">
                    <label for="waktu_minum" class="block text-sm font-medium text-gray-700 mb-1">Waktu Minum</label>
                    <input type="text" name="waktu_minum" id="waktu_minum" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('waktu_minum', $obat->waktu_minum) }}" required
                        placeholder="Contoh: Sesudah makan">
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection