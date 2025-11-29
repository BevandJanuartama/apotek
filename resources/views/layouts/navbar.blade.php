{{-- ========================================================================= --}}
{{-- BLADE PARTIAL: NAVIGASI UTAMA APLIKASI --}}
{{-- File ini biasanya di-include di resources/views/layouts/app.blade.php --}}
{{-- ========================================================================= --}}
<nav class="bg-white shadow p-4 flex justify-between items-center border-b border-gray-100">
    
    {{-- Logo atau Nama Aplikasi --}}
    <h1 class="text-2xl font-bold text-gray-800">Aplikasi Apotek</h1>

    {{-- Daftar Navigasi --}}
    <div class="space-x-4 flex items-center">
        
        {{-- Link ke halaman Daftar Apotek --}}
        <a href="{{ route('apotek.index') }}" 
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 ease-in-out font-medium">
            Apotek
        </a>
        
        {{-- Link ke halaman Daftar Obat --}}
        {{-- Asumsi ada route 'obat.index' untuk menampilkan semua obat --}}
        <a href="{{ route('obat.index') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-150 ease-in-out font-medium">
            Obat
        </a>
        
    </div>
</nav>