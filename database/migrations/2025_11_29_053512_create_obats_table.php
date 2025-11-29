<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Kelas anonim yang mengimplementasikan class Migration
return new class extends Migration
{
    /**
     * Jalankan migrasi. Ini akan membuat tabel baru.
     */
    public function up(): void
    {
        // Membuat tabel baru bernama 'obats'
        Schema::create('obats', function (Blueprint $table) {
            // Kolom ID Auto-Increment (primary key)
            $table->id();
            
            // Kolom untuk nama obat (wajib diisi, tipe string)
            $table->string('nama_obat');
            
            // Kolom untuk kategori obat (misalnya: antibiotik, pereda nyeri, dll.)
            $table->string('kategori');
            
            // Kolom untuk keterangan/deskripsi obat (tipe text, bisa menampung teks panjang)
            $table->text('keterangan');
            
            // Kolom Foreign Key (Kunci Asing)
            // Menghubungkan kolom 'apotek_id' pada tabel ini ke kolom 'id' pada tabel 'apoteks'.
            // onDelete('cascade') memastikan bahwa jika sebuah apotek dihapus, 
            // semua obat yang terkait dengan apotek tersebut juga akan otomatis terhapus.
            $table->foreignId('apotek_id')
                  ->constrained('apoteks')
                  ->onDelete('cascade');
            
            // Kolom untuk cara minum obat (misalnya: sebelum/sesudah makan)
            $table->string('cara_minum');
            
            // Kolom untuk waktu minum obat (misalnya: 3 kali sehari)
            $table->string('waktu_minum');
            
            // Kolom `created_at` dan `updated_at` (timestamps otomatis)
            $table->timestamps();
        });
    }

    /**
     * Batalkan/Rollback migrasi. Ini akan menghapus tabel.
     */
    public function down(): void
    {
        // Menghapus tabel 'obats' jika sudah ada
        Schema::dropIfExists('obats');
    }
};