<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Tampilkan data About Us (biasanya hanya 1 data).
     */
    public function index()
    {
        $about = AboutUs::first();
        return view('about_us.index', compact('about'));
    }

    /**
     * Tampilkan form tambah data (jika belum ada data About Us).
     */
    public function create()
    {
        // Cegah user menambah lebih dari 1 data
        if (AboutUs::count() > 0) {
            return redirect()->route('about_us.index')
                ->with('warning', 'Data About Us sudah ada. Silakan ubah data yang sudah ada.');
        }

        return view('about_us.create');
    }

    /**
     * Simpan data About Us baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision'      => 'nullable|string',
            'mission'     => 'nullable|string',
            'history'     => 'nullable|string',
            'address'     => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:50',
            'email'       => 'nullable|email|max:100',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about_us', 'public');
        }

        AboutUs::create($validated);

        return redirect()->route('about_us.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('about_us.edit', compact('about'));
    }

    /**
     * Perbarui data About Us.
     */
    public function update(Request $request, $id)
    {
        $about = AboutUs::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision'      => 'nullable|string',
            'mission'     => 'nullable|string',
            'history'     => 'nullable|string',
            'address'     => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:50',
            'email'       => 'nullable|email|max:100',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about_us', 'public');
        }

        $about->update($validated);

        return redirect()->route('about_us.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus data About Us.
     */
    public function destroy($id)
    {
        $about = AboutUs::findOrFail($id);

        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return redirect()->route('about_us.index')->with('success', 'Data berhasil dihapus.');
    }
}