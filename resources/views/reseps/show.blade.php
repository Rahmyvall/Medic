@extends('layouts.admin')

@section('title', 'Detail Rekam Medis')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">
                    Detail Rekam Medis: {{ $rekam_medis->kunjungan?->pasien?->nama_pasien ?? '-' }}
                </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="bg-light" style="width: 250px;">Pasien</th>
                            <td>{{ $rekam_medis->kunjungan?->pasien?->nama_pasien ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Dokter</th>
                            <td>
                                {{ $rekam_medis->kunjungan?->dokter?->nama ?? '-' }}
                                ({{ $rekam_medis->kunjungan?->dokter?->spesialisasi ?? '-' }})
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Diagnosa</th>
                            <td>{{ $rekam_medis->diagnosa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Tindakan</th>
                            <td>{{ $rekam_medis->tindakan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Catatan Dokter</th>
                            <td>{{ $rekam_medis->catatan_dokter ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Dibuat Pada</th>
                            <td>{{ $rekam_medis->created_at?->format('d M Y H:i') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Terakhir Diperbarui</th>
                            <td>{{ $rekam_medis->updated_at?->format('d M Y H:i') ?? '-' }}</td>
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
