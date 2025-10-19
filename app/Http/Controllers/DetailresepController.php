<?php

namespace App\Http\Controllers;

use App\Models\Detailresep;
use App\Models\Resep;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailresepController extends Controller
{
    // Menampilkan daftar detail resep
    public function index(Request $request)
    {
        $query = Detailresep::with(['resep', 'obat']);

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->whereHas('obat', function($q) use ($keyword) {
                $q->where('nama_obat', 'like', "%{$keyword}%");
            });
        }

        $detailreseps = $query->orderBy('detail_id', 'asc')->paginate(10);
        $detailreseps->appends($request->only('search'));

        return view('detailreseps.index', compact('detailreseps'));
    }

    // Menampilkan form tambah detail resep
    public function create()
    {
        $reseps = Resep::all();
        $obats = Obat::all();
        return view('detailreseps.create', compact('reseps', 'obats'));
    }

    // Menyimpan data detail resep baru
    public function store(Request $request)
    {
        $request->validate([
            'resep_id' => 'required|exists:reseps,resep_id',
            'obat_id' => 'required|exists:obats,obat_id',
            'dosis' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        Detailresep::create($request->all());

        return redirect()->route('detailreseps.index')->with('success', 'Detail resep berhasil ditambahkan.');
    }

    // Menampilkan detail resep
    public function show(Detailresep $detailresep)
    {
        return view('detailreseps.show', compact('detailresep'));
    }

    // Menampilkan form edit detail resep
    public function edit(Detailresep $detailresep)
    {
        $reseps = Resep::all();
        $obats = Obat::all();
        return view('detailreseps.edit', compact('detailresep', 'reseps', 'obats'));
    }

    // Memperbarui data detail resep
    public function update(Request $request, Detailresep $detailresep)
    {
        $request->validate([
            'resep_id' => 'required|exists:reseps,resep_id',
            'obat_id' => 'required|exists:obats,obat_id',
            'dosis' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $detailresep->update($request->all());

        return redirect()->route('detailreseps.index')->with('success', 'Detail resep berhasil diperbarui.');
    }

    // Menghapus data detail resep
    public function destroy(Detailresep $detailresep)
    {
        $detailresep->delete();
        return redirect()->route('detailreseps.index')->with('success', 'Detail resep berhasil dihapus.');
    }
}