<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan daftar pembayaran
    public function index(Request $request)
{
    // Eager load relasi pasien dan dokter melalui kunjungan
    $query = Pembayaran::with('kunjungan.pasien', 'kunjungan.dokter');

    if ($request->filled('search')) {
        $keyword = $request->search;

        // Filter hanya berdasarkan nama dokter
        $query->whereHas('kunjungan.dokter', function ($q) use ($keyword) {
            $q->where('nama', 'like', "%{$keyword}%");
        });
    }

    $pembayarans = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('pembayaran.index', compact('pembayarans'));
}



    // Form buat pembayaran baru
    public function create()
    {
        $kunjungans = Kunjungan::with('pasien', 'dokter')->get();
        return view('pembayaran.create', compact('kunjungans'));
    }

    // Simpan pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'total_tagihan' => 'required|numeric',
            'metode_bayar' => 'required|in:cash,BPJS,asuransi',
            'status' => 'required|in:pending,lunas,dibatalkan',
            'tanggal_bayar' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        Pembayaran::create($request->only([
            'kunjungan_id', 'total_tagihan', 'metode_bayar', 'status', 'tanggal_bayar', 'keterangan'
        ]));

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    // Tampilkan detail pembayaran
    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load('kunjungan.pasien', 'kunjungan.dokter');
        return view('pembayaran.show', compact('pembayaran'));
    }

    // Form edit pembayaran
    public function edit(Pembayaran $pembayaran)
    {
        $kunjungans = Kunjungan::with('pasien', 'dokter')->get();
        return view('pembayaran.edit', compact('pembayaran', 'kunjungans'));
    }

    // Update pembayaran
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'kunjungan_id' => 'required|exists:kunjungans,id',
            'total_tagihan' => 'required|numeric',
            'metode_bayar' => 'required|in:cash,BPJS,asuransi',
            'status' => 'required|in:pending,lunas,dibatalkan',
            'tanggal_bayar' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($request->only([
            'kunjungan_id', 'total_tagihan', 'metode_bayar', 'status', 'tanggal_bayar', 'keterangan'
        ]));

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    // Hapus pembayaran
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}