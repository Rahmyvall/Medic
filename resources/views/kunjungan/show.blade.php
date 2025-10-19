@extends('layouts.admin')

@section('title', 'Detail Kunjungan')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Kunjungan: {{ $kunjungan->pasien->nama_pasien }}</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <tbody>
                        {{-- Pasien --}}
                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">Pasien</th>
                            <td style="font-size: 1.1rem;">{{ $kunjungan->pasien->nama_pasien }}</td>
                        </tr>

                        {{-- Dokter --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dokter</th>
                            <td style="font-size: 1.1rem;">{{ $kunjungan->dokter->nama ?? '-' }}
                                ({{ $kunjungan->dokter->spesialisasi ?? '-' }})</td>
                        </tr>

                        {{-- Tanggal Kunjungan --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Tanggal Kunjungan</th>
                            <td style="font-size: 1.1rem;">
                                {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->format('d M Y H:i') }}</td>
                        </tr>

                        {{-- Jenis Kunjungan --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Jenis Kunjungan</th>
                            <td style="font-size: 1.1rem;">{{ ucfirst(str_replace('_', ' ', $kunjungan->jenis_kunjungan)) }}
                            </td>
                        </tr>

                        {{-- Status --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Status</th>
                            <td style="font-size: 1.1rem;">{{ ucfirst($kunjungan->status) }}</td>
                        </tr>

                        {{-- Dibuat Pada --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dibuat Pada</th>
                            <td style="font-size: 1.1rem;">
                                {{ $kunjungan->created_at ? $kunjungan->created_at->format('d M Y H:i') : '-' }}
                            </td>
                        </tr>


                        {{-- Terakhir Diperbarui --}}
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Terakhir Diperbarui</th>
                            <td style="font-size: 1.1rem;">
                                {{ $kunjungan->updated_at ? $kunjungan->updated_at->format('d M Y H:i') : '-' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
