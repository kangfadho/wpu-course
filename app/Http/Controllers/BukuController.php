<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        $namaAplikasi = 'Perpustakaan FaDoo';
        $buku = Buku::latest()->get();

        return view('buku.index', compact('namaAplikasi', 'buku'));
    }

    /**
     * Menampilkan form tambah buku.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Menyimpan buku baru ke database.
     */
    public function store(StoreBukuRequest $request)
    {
        Buku::create($request->validated());

        session()->flash('success', 'Data buku berhasil ditambahkan!');

        return redirect()->route('buku.index');
    }

    /**
     * Menampilkan form edit buku.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Mengupdate data buku di database.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        $buku->update($request->validated());

        session()->flash('success', 'Data buku berhasil diupdate!');

        return redirect()->route('buku.index');
    }

    /**
     * Menghapus buku dari database.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        session()->flash('success', 'Data buku berhasil dihapus!');

        return redirect()->route('buku.index');
    }
}
