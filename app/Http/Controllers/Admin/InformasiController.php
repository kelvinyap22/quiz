<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    // Tampilkan semua data di Dashboard Admin
    public function index()
    {

        $informasi = Informasi::with('kategori')->latest()->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }


    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.informasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'ringkasan'   => 'required|string',
            'isi'         => 'required|string',
            'sumber'      => 'required|string|max:255',
            'status'      => 'required|in:draft,published',
        ]);

        Informasi::create($request->all());

        return redirect()->route('admin.informasi.index')
                         ->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit(Informasi $informasi)
    {
        $kategori = Kategori::all();
        return view('admin.informasi.edit', compact('informasi', 'kategori'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'ringkasan'   => 'required|string',
            'isi'         => 'required|string',
            'sumber'      => 'required|string|max:255',
            'status'      => 'required|in:draft,published',
        ]);

        $informasi->update($request->all());

        return redirect()->route('admin.informasi.index')
                         ->with('success', 'Informasi berhasil diperbarui!');
    }

    // Hapus Data 
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('admin.informasi.index')
                         ->with('sukses', 'Informasi berhasil dihapus!');
    }
}