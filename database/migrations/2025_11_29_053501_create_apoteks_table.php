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
        // Membuat tabel baru bernama 'apoteks'
        Schema::create('apoteks', function (Blueprint $table) {
            // Kolom ID Auto-Increment (primary key)
            $table->id();
            
            // Kolom untuk nama apotek (wajib diisi, tipe string)
            $table->string('nama_apotek');
            
            // Kolom untuk alamat apotek (wajib diisi, tipe string)
            $table->string('alamat');
            
            // Kolom untuk nomor telepon (opsional, tipe string). `nullable()` berarti kolom ini boleh kosong.
            $table->string('telepon')->nullable();
            
            // Kolom untuk jam buka apotek (tipe time)
            $table->time('jam_buka');
            
            // Kolom untuk jam tutup apotek (tipe time)
            $table->time('jam_tutup');
            
            // Kolom `created_at` dan `updated_at` (timestamps otomatis)
            $table->timestamps();
        });
    }

    /**
     * Batalkan/Rollback migrasi. Ini akan menghapus tabel.
     */
    public function down(): void
    {
        // Menghapus tabel 'apoteks' jika sudah ada
        Schema::dropIfExists('apoteks');
    }
};