<?php
namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = Pasien::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where('nama_pasien', 'like', "%{$keyword}%")
                  ->orWhere('no_rm', 'like', "%{$keyword}%")
                  ->orWhere('no_hp', 'like', "%{$keyword}%")
                  ->orWhere('penanggung_jawab', 'like', "%{$keyword}%");
        }

        $pasiens = $query->orderBy('nama_pasien')->paginate(10);
        $pasiens->appends($request->only('search'));

        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'penanggung_jawab' => 'nullable|string|max:255',
        ]);

        $last = Pasien::select(DB::raw('MAX(CAST(SUBSTRING(no_rm, 3) AS UNSIGNED)) as max_id'))->first();
        $nextNumber = $last->max_id ? $last->max_id + 1 : 1;
        $nextNoRm = 'RM' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        Pasien::create([
            'no_rm' => $nextNoRm,
            'nama_pasien' => $request->nama_pasien,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'penanggung_jawab' => 'nullable|string|max:255',
        ]);

        $pasien->update($request->only([
            'nama_pasien', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'no_hp', 'penanggung_jawab'
        ]));

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}