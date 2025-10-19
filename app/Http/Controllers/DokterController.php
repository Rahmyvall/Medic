<?php
namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokter::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('dokter_id', 'like', "%{$keyword}%")
                  ->orWhere('spesialisasi', 'like', "%{$keyword}%")
                  ->orWhere('no_str', 'like', "%{$keyword}%");
        }

        $dokters = $query->orderBy('nama')->paginate(10);
        $dokters->appends($request->only('search'));
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function show(Dokter $dokter)
    {
        return view('dokter.show', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'jadwal_praktek' => 'nullable|string|max:255',
            'photo_dokter' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $last = Dokter::select(DB::raw('MAX(CAST(SUBSTRING(dokter_id, 4) AS UNSIGNED)) as max_id'))->first();
        $nextNumber = $last->max_id ? $last->max_id + 1 : 1;
        $nextId = 'DOK' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        $noStr = 'STR' . now()->format('YmdHis');

        $photoPath = null;
        if ($request->hasFile('photo_dokter')) {
            $photoPath = $request->file('photo_dokter')->store('dokters', 'public');
        }

        Dokter::create([
            'dokter_id' => $nextId,
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'jadwal_praktek' => $request->jadwal_praktek,
            'no_str' => $noStr,
            'photo_dokter' => $photoPath,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'jadwal_praktek' => 'nullable|string|max:255',
            'photo_dokter' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('photo_dokter')) {
            if ($dokter->photo_dokter && Storage::disk('public')->exists($dokter->photo_dokter)) {
                Storage::disk('public')->delete($dokter->photo_dokter);
            }
            $dokter->photo_dokter = $request->file('photo_dokter')->store('dokters', 'public');
        }

        $dokter->update($request->only(['nama', 'spesialisasi', 'jadwal_praktek']));
        $dokter->save();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        if ($dokter->photo_dokter && Storage::disk('public')->exists($dokter->photo_dokter)) {
            Storage::disk('public')->delete($dokter->photo_dokter);
        }

        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}