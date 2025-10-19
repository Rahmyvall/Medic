<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\RekamMedis;
use App\Models\Dokter;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    // 🔹 Daftar Resep
    public function index(Request $request)
    {
        $query = Resep::with(['rekamMedis.kunjungan.pasien', 'dokter']);

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->whereHas('rekamMedis.kunjungan.pasien', function ($q) use ($keyword) {
                $q->where('nama_pasien', 'like', "%{$keyword}%");
            })
            ->orWhereHas('dokter', function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%");
            })
            ->orWhere('catatan', 'like', "%{$keyword}%");
        }

        $reseps = $query->orderBy('tanggal_resep', 'desc')->paginate(10);
        $reseps->appends($request->only('search'));

        return view('reseps.index', compact('reseps'));
    }

    // 🔹 Form Tambah Resep
    public function create()
    {
        $rekam_medis = RekamMedis::with('kunjungan.pasien', 'kunjungan.dokter')->get();
        $dokters = Dokter::all();
        return view('reseps.create', compact('rekam_medis', 'dokters'));
    }

    // 🔹 Simpan Resep Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rekam_id' => 'required|exists:rekam_medis,rekam_id',
            'dokter_id' => 'required|exists:dokter,id',
            'tanggal_resep' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        Resep::create($validated);

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil disimpan.');
    }


    // 🔹 Detail Resep
    public function show($id)
    {
        $resep = Resep::with(['rekamMedis.kunjungan.pasien', 'dokter'])->findOrFail($id);
        return view('reseps.show', compact('resep'));
    }

    // 🔹 Form Edit Resep
        public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        $rekam_medis = RekamMedis::with('kunjungan.pasien', 'kunjungan.dokter')->get();
        $dokters = Dokter::all();

        return view('reseps.edit', compact('resep', 'rekam_medis', 'dokters'));
    }

    // 🔹 Update Resep
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rekam_id' => 'required|exists:rekam_medis,rekam_id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_resep' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $resep = Resep::findOrFail($id);
        $resep->update($validated);

        return redirect()->route('reseps.index')->with('success', 'Data resep berhasil diperbarui.');
    }

    // 🔹 Hapus Resep
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->delete();

        return redirect()->route('reseps.index')->with('success', 'Resep berhasil dihapus.');
    }
}