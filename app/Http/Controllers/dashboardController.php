<?php
namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Kunjungan;
use App\Models\RekamMedis;

class DashboardController extends Controller
{
    public function index()
    {
        // Total data
        $totalDokter = Dokter::count();
        $totalPasien = Pasien::count();
        $totalKunjungan = Kunjungan::count();
        $totalRekamMedis = RekamMedis::count();

        // Jumlah kunjungan per jenis
        $kunjunganPerJenis = Kunjungan::select('jenis_kunjungan')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('jenis_kunjungan')
            ->get();

        // Jumlah pasien per dokter
        $dokters = Dokter::all();
        $dokterLabels = [];
        $pasienCounts = [];

        foreach ($dokters as $dokter) {
            $dokterLabels[] = $dokter->nama;

            // Hitung jumlah kunjungan per dokter
            $jumlahPasien = Kunjungan::where('dokter_id', $dokter->id)->count();
            $pasienCounts[] = $jumlahPasien;
        }

        // Kirim data ke view
        return view('pages.dashboard', compact(
            'totalDokter',
            'totalPasien',
            'totalKunjungan',
            'totalRekamMedis',
            'kunjunganPerJenis',
            'dokterLabels',
            'pasienCounts'
        ));
    }
}