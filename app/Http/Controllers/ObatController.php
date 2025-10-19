<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan daftar obat
    public function index(Request $request)
    {
        $query = Obat::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where('nama_obat', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%");
        }

        $obats = $query->orderBy('nama_obat', 'asc')->paginate(10);
        $obats->appends($request->only('search'));

        return view('obat.index', compact('obats'));
    }

    // Menampilkan form tambah obat
    public function create()
    {
        return view('obat.create');
    }

    // Menyimpan data obat baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
            'harga_beli' => 'nullable|integer|min:0',
            'harga_promo' => 'nullable|integer|min:0',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan.');
    }

    // Menampilkan detail obat
    public function show($id)
    {
        $obat = Obat::findOrFail($id); // ambil data obat berdasarkan primary key

        return view('obat.show', compact('obat'));
    }

    // Menampilkan form edit obat
    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    // Memperbarui data obat
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
            'harga_beli' => 'nullable|integer|min:0',
            'harga_promo' => 'nullable|integer|min:0',
        ]);

        $obat->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    // Menghapus data obat
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }
}