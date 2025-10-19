@extends('layouts.admin')

@section('title', 'Detail Dokter')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Profil Dokter: {{ $dokter->nama }}</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <tbody>
                        {{-- Foto Dokter --}}
                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">Foto Dokter</th>
                            <td style="font-size: 1.1rem;">
                                @if ($dokter->photo_dokter)
                                    <img src="{{ asset('storage/' . $dokter->photo_dokter) }}" alt="{{ $dokter->nama }}"
                                        class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">Dokter ID</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->dokter_id }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Nama</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->nama }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Spesialisasi</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->spesialisasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Jadwal Praktek</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->jadwal_praktek ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">No STR</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->no_str }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dibuat Pada</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Terakhir Diperbarui</th>
                            <td style="font-size: 1.1rem;">{{ $dokter->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('dokter.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
