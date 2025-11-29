<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Definisi Model untuk tabel 'obats'
class Obat extends Model
{
    // Trait untuk mengaktifkan Factory, berguna untuk seeding data palsu
    use HasFactory;

    /**
     * Properti $fillable menentukan kolom mana yang boleh diisi (mass assignable).
     * Kolom-kolom ini sesuai dengan skema migrasi tabel 'obats'.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_obat',
        'kategori',
        'keterangan',
        // Foreign Key 'apotek_id' juga harus diizinkan untuk mass assignment
        'apotek_id',
        'cara_minum',
        'waktu_minum',
    ];

    /**
     * Mendefinisikan relasi Inverse One-to-Many (Many-to-One).
     * Satu Obat hanya dimiliki oleh satu Apotek.
     *
     */
    public function apotek()
    {
        // Menggunakan metode belongsTo() untuk menunjukkan bahwa Model Obat 
        // milik (berelasi ke) Model Apotek.
        // Laravel akan secara otomatis mencari kolom 'apotek_id' di tabel 'obats'.
        return $this->belongsTo(Apotek::class);
    }
}