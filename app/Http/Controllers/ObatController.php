<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Apotek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Controller untuk mengelola sumber daya Obat (CRUD).
 * Controller ini menangani tampilan, pembuatan, penyimpanan, pembaruan, dan penghapusan data Obat.
 */
class ObatController extends Controller
{
    /**
     * Menampilkan daftar semua Obat. (READ - Index)
     */
    public function index()
    {
        // Mengambil semua Obat dan melakukan Eager Loading relasi 'apotek'.
        // 'with('apotek')' memastikan data apotek terkait ikut diambil dalam satu kueri efisien (Many-to-One).
        $obats = Obat::with('apotek')->get();
        
        // Mengirim data ke view 'obat.index'
        return view('obat.index', compact('obats'));
    }

    /**
     * Menampilkan formulir untuk menambah Obat baru. (CREATE - Form)
     */
    public function create()
    {
        // Mengambil semua data Apotek untuk ditampilkan di dropdown (pilihan Foreign Key)
        $apoteks = Apotek::all();
        
        // Mengirim data Apotek ke view 'obat.create'
        return view('obat.create', compact('apoteks'));
    }

    /**
     * Menyimpan data Obat yang baru dibuat ke database. (CREATE - Store)
     */
    public function store(Request $request)
    {
        // Validasi data input dari form.
        $request->validate([
            'nama_obat'   => 'required|string|max:255',
            'kategori'    => 'required|string|max:255',
            'keterangan'  => 'required|string',
            // Memastikan apotek_id wajib diisi dan nilainya harus ada di kolom 'id' tabel 'apoteks'
            'apotek_id'   => 'required|exists:apoteks,id',
            'cara_minum'  => 'required|string|max:255',
            'waktu_minum' => 'required|string|max:255',
        ]);

        // Membuat record baru di tabel 'obats' menggunakan mass assignment
        Obat::create($request->all());

        // Menampilkan notifikasi sukses menggunakan SweetAlert
        Alert::success('Berhasil', 'Obat berhasil ditambahkan!');
        
        // Mengarahkan pengguna kembali ke halaman daftar Obat
        return redirect()->route('obat.index');
    }

    /**
     * Menampilkan detail Obat tertentu. (READ - Show)
     */
    public function show($id)
    {
        // Mencari Obat berdasarkan ID dan melakukan Eager Loading relasi 'apotek'.
        $obat = Obat::with('apotek')->findOrFail($id);
        
        // Mengirim data Obat (beserta Apoteknya) ke view 'obat.show'
        return view('obat.show', compact('obat'));
    }

    /**
     * Menampilkan formulir untuk mengedit Obat tertentu. (UPDATE - Form)
     */
    public function edit($id)
    {
        // Mencari Obat yang akan diedit
        $obat = Obat::findOrFail($id);
        
        // Mengambil semua data Apotek lagi untuk dropdown
        $apoteks = Apotek::all();

        // Mengirim data Obat dan Apotek ke view 'obat.edit'
        return view('obat.edit', compact('obat', 'apoteks'));
    }

    /**
     * Memperbarui data Obat tertentu di database. (UPDATE - Store)
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama_obat'   => 'required|string|max:255',
            'kategori'    => 'required|string|max:255',
            'keterangan'  => 'required|string',
            'apotek_id'   => 'required|exists:apoteks,id',
            'cara_minum'  => 'required|string|max:255',
            'waktu_minum' => 'required|string|max:255',
        ]);

        // Mencari Obat yang akan diperbarui
        $obat = Obat::findOrFail($id);
        
        // Memperbarui record menggunakan mass assignment
        $obat->update($request->all());

        // Menampilkan notifikasi sukses
        Alert::success('Berhasil', 'Data obat berhasil diperbarui!');
        
        // Mengarahkan kembali ke halaman daftar Obat
        return redirect()->route('obat.index');
    }

    /**
     * Menghapus Obat tertentu dari database. (DELETE - Destroy)
     */
    public function destroy($id)
    {
        // Mencari Obat yang akan dihapus
        $obat = Obat::findOrFail($id);
        
        // Menghapus record.
        $obat->delete();

        // Menampilkan notifikasi sukses
        Alert::success('Terhapus', 'Obat berhasil dihapus!');
        
        // Mengarahkan kembali ke halaman daftar Obat
        return redirect()->route('obat.index');
    }
}