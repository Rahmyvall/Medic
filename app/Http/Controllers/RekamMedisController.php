<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index(Request $request)
    {
        $query = RekamMedis::with(['kunjungan.pasien', 'kunjungan.dokter']);

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->whereHas('kunjungan.pasien', function ($q2) use ($keyword) {
                    $q2->where('nama_pasien', 'like', "%{$keyword}%");
                })
                ->orWhereHas('kunjungan.dokter', function ($q2) use ($keyword) {
                    $q2->where('nama', 'like', "%{$keyword}%");
                })
                ->orWhere('diagnosa', 'like', "%{$keyword}%")
                ->orWhere('tindakan', 'like', "%{$keyword}%")
                ->orWhere('catatan_dokter', 'like', "%{$keyword}%");
            });
        }

        $rekam_medis = $query->orderByDesc('created_at')->paginate(10);
        $rekam_medis->appends($request->only('search'));

        return view('rekam_medis.index', compact('rekam_medis'));
    }

    public function create()
    {
        $kunjungans = Kunjungan::with(['pasien', 'dokter'])->get();
        return view('rekam_medis.create', compact('kunjungans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kunjungan_id'    => 'required|exists:kunjungans,id',
            'diagnosa'        => 'required|string|max:255',
            'tindakan'        => 'required|string|max:255',
            'catatan_dokter'  => 'nullable|string',
        ]);

        RekamMedis::create($validated);

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function show($id)
    {
        $rekam_medis = RekamMedis::with(['kunjungan.pasien', 'kunjungan.dokter'])->findOrFail($id);
        return view('rekam_medis.show', compact('rekam_medis'));
    }

    public function edit($id)
    {
        $rekam_medis = RekamMedis::with(['kunjungan.pasien', 'kunjungan.dokter'])->findOrFail($id);
        $kunjungans = Kunjungan::with(['pasien', 'dokter'])->get();
        return view('rekam_medis.edit', compact('rekam_medis', 'kunjungans'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kunjungan_id'    => 'required|exists:kunjungans,id',
            'diagnosa'        => 'required|string|max:255',
            'tindakan'        => 'required|string|max:255',
            'catatan_dokter'  => 'nullable|string',
        ]);

        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->update($validated);

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $rekam_medis->delete();

        return redirect()->route('rekam_medis.index')->with('success', 'Rekam medis berhasil dihapus.');
    }
}