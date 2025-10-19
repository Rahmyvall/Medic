@extends('layouts.admin')

@section('title', 'Detail Rekam Medis')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Rekam Medis: {{ $rekam_medis->kunjungan->pasien->nama_pasien ?? '-' }}</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <tbody>
                        {{-- Pasien --}}
                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">Pasien</th>
                            <td style="font-size: 1.1rem;">{{ $rekam_medis->kunjungan->pasien->nama_pasien ?? '-' }}</td>
                        </tr>

                        {{-- Dokter --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dokter</th>
                            <td style="font-size: 1.1rem;">
                                {{ $rekam_medis->kunjungan->dokter->nama ?? '-' }}
                                ({{ $rekam_medis->kunjungan->dokter->spesialisasi ?? '-' }})
                            </td>
                        </tr>

                        {{-- Diagnosa --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Diagnosa</th>
                            <td style="font-size: 1.1rem;">{{ $rekam_medis->diagnosa ?? '-' }}</td>
                        </tr>

                        {{-- Tindakan --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Tindakan</th>
                            <td style="font-size: 1.1rem;">{{ $rekam_medis->tindakan ?? '-' }}</td>
                        </tr>

                        {{-- Catatan Dokter --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Catatan Dokter</th>
                            <td style="font-size: 1.1rem;">{{ $rekam_medis->catatan_dokter ?? '-' }}</td>
                        </tr>

                        {{-- Dibuat Pada --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dibuat Pada</th>
                            <td style="font-size: 1.1rem;">
                                {{ $rekam_medis->created_at ? $rekam_medis->created_at->format('d M Y H:i') : '-' }}
                            </td>
                        </tr>

                        {{-- Terakhir Diperbarui --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Terakhir Diperbarui</th>
                            <td style="font-size: 1.1rem;">
                                {{ $rekam_medis->updated_at ? $rekam_medis->updated_at->format('d M Y H:i') : '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('rekam_medis.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <a href="{{ route('rekam_medis.edit', $rekam_medis->rekam_id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
