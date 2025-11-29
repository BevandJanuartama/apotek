<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Definisi Model untuk tabel 'apoteks'
class Apotek extends Model
{
    // Trait untuk mengaktifkan Factory, berguna untuk seeding data palsu
    use HasFactory;

    /**
     * Properti $fillable menentukan kolom mana yang boleh diisi (mass assignable).
     * Ini adalah praktik keamanan yang baik di Laravel.
     * Kolom-kolom ini sesuai dengan skema migrasi tabel 'apoteks'.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_apotek',
        'alamat',
        'telepon',
        'jam_buka',
        'jam_tutup',
    ];

    /**
     * Mendefinisikan relasi One-to-Many.
     * Satu Apotek dapat memiliki banyak Obat.
     *
     */
    public function obats()
    {
        // Menggunakan metode hasMany() untuk menunjukkan bahwa Model Apotek
        // memiliki banyak instance dari Model Obat.
        return $this->hasMany(Obat::class);
    }
}