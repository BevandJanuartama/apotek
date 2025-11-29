<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Controller untuk mengelola sumber daya Apotek (CRUD).
 * Controller ini menangani tampilan, pembuatan, penyimpanan, pembaruan, dan penghapusan data Apotek.
 */
class ApotekController extends Controller
{
    /**
     * Menampilkan daftar semua Apotek. (READ - Index)
     */
    public function index()
    {
        // Mengambil semua record dari tabel 'apoteks'
        $apoteks = Apotek::all();
        
        // Mengirim data ke view 'apotek.index'
        return view('apotek.index', compact('apoteks'));
    }

    /**
     * Menampilkan formulir untuk membuat Apotek baru. (CREATE - Form)
     */
    public function create()
    {
        return view('apotek.create');
    }

    /**
     * Menyimpan data Apotek yang baru dibuat ke database. (CREATE - Store)
     */
    public function store(Request $request)
    {
        // Validasi data input dari form.
        // Menambahkan validasi date_format:H:i untuk memastikan format waktu benar.
        $request->validate([
            'nama_apotek' => 'required|string|max:255',
            'alamat'      => 'required|string',
            'telepon'     => 'required|string',
            'jam_buka'    => 'required|date_format:H:i', 
            'jam_tutup'   => 'required|date_format:H:i',
        ]);
        
        // Membuat record baru di tabel 'apoteks' menggunakan mass assignment
        Apotek::create($request->all());

        // Menampilkan notifikasi sukses menggunakan SweetAlert
        Alert::success('Berhasil', 'Apotek berhasil ditambahkan!');
        
        // Mengarahkan pengguna kembali ke halaman daftar Apotek
        return redirect()->route('apotek.index');
    }

    /**
     * Menampilkan detail Apotek tertentu, termasuk semua Obat yang dimilikinya. (READ - Show)
     */
    public function show($id)
    {
        // Mencari Apotek berdasarkan ID dan melakukan Eager Loading relasi 'obats'.
        // 'with('obats')' menggunakan relasi HasMany yang ada di Model Apotek.
        // Ini mengambil Apotek dan semua Obat terkait dalam satu kueri yang efisien.
        $apotek = Apotek::with('obats')->findOrFail($id);

        // Mengirim data Apotek (beserta Obatnya) ke view 'apotek.show'
        return view('apotek.show', compact('apotek'));
    }

    /**
     * Menampilkan formulir untuk mengedit Apotek tertentu. (UPDATE - Form)
     */
    public function edit($id)
    {
        // Mencari Apotek berdasarkan ID
        $apotek = Apotek::findOrFail($id);
        
        // Mengirim data ke view 'apotek.edit'
        return view('apotek.edit', compact('apotek'));
    }

    /**
     * Memperbarui data Apotek tertentu di database. (UPDATE - Store)
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama_apotek' => 'required|string|max:255',
            'alamat'      => 'required|string',
            'telepon'     => 'required|string',
            'jam_buka'    => 'required|date_format:H:i',
            'jam_tutup'   => 'required|date_format:H:i',
        ]);

        // Mencari Apotek yang akan diperbarui
        $apotek = Apotek::findOrFail($id);
        
        // Memperbarui record menggunakan mass assignment
        $apotek->update($request->all());

        // Menampilkan notifikasi sukses
        Alert::success('Berhasil', 'Data apotek berhasil diperbarui!');
        
        // Mengarahkan kembali ke halaman daftar Apotek
        return redirect()->route('apotek.index');
    }

    /**
     * Menghapus Apotek tertentu dari database. (DELETE - Destroy)
     */
    public function destroy($id)
    {
        // Mencari Apotek yang akan dihapus
        $apotek = Apotek::findOrFail($id);
        
        // Menghapus record.
        // Karena aturan Foreign Key onDelete('cascade') di migrasi 'obats', 
        // semua obat yang terkait dengan apotek ini juga otomatis terhapus.
        $apotek->delete();

        // Menampilkan notifikasi sukses
        Alert::success('Terhapus', 'Apotek berhasil dihapus!');
        
        // Mengarahkan kembali ke halaman daftar Apotek
        return redirect()->route('apotek.index');
    }
}