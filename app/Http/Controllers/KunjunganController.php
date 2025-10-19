<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index(Request $request)
    {
        $query = Kunjungan::with(['pasien', 'dokter']);

        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->whereHas('pasien', function ($q2) use ($keyword) {
                    $q2->where('nama_pasien', 'like', "%{$keyword}%");
                })
                ->orWhereHas('dokter', function ($q2) use ($keyword) {
                    $q2->where('nama', 'like', "%{$keyword}%");
                })
                ->orWhere('jenis_kunjungan', 'like', "%{$keyword}%")
                ->orWhere('status', 'like', "%{$keyword}%");
            });
        }

        $kunjungans = $query->orderBy('tanggal_kunjungan', 'desc')->paginate(10);
        $kunjungans->appends($request->only('search'));

        return view('kunjungan.index', compact('kunjungans'));
    }


    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $kunjungans = Kunjungan::with(['pasien', 'dokter'])->get();
        return view('kunjungan.create', compact('pasien', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'jenis_kunjungan' => 'required|in:rawat_jalan,rawat_inap,IGD',
            'status' => 'required|in:terjadwal,selesai,batal,proses',
        ]);

        Kunjungan::create($request->all());

        return redirect()->route('kunjungan.index')->with('success', 'Data kunjungan berhasil ditambahkan.');
    }

    public function show(Kunjungan $kunjungan)
    {
        return view('kunjungan.show', compact('kunjungan'));
    }

    public function edit(Kunjungan $kunjungan)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('kunjungan.edit', compact('kunjungan', 'pasien', 'dokter'));
    }

    public function update(Request $request, Kunjungan $kunjungan)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_kunjungan' => 'required|date',
            'jenis_kunjungan' => 'required|in:rawat_jalan,rawat_inap,IGD',
            'status' => 'required|in:terjadwal,selesai,batal,proses',
        ]);

        $kunjungan->update($request->all());

        return redirect()->route('kunjungan.index')->with('success', 'Data kunjungan berhasil diperbarui.');
    }

    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();
        return redirect()->route('kunjungan.index')->with('success', 'Data kunjungan berhasil dihapus.');
    }
}