@extends('layouts.admin')

@section('tambah', 'Tambah Rekam Medis')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-file-medical-alt me-2"></i>
                        <h5 class="mb-0">Tambah Data Rekam Medis</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rekam_medis.store') }}">
                            @csrf

                            {{-- Pilih Kunjungan --}}
                            <div class="mb-3">
                                <label for="kunjungan_id" class="form-label">Kunjungan</label>
                                <select class="form-control @error('kunjungan_id') is-invalid @enderror" name="kunjungan_id"
                                    id="kunjungan_id">
                                    <option value="">-- Pilih Kunjungan --</option>
                                    @foreach ($kunjungans as $kunjungan)
                                        <option value="{{ $kunjungan->id }}"
                                            {{ old('kunjungan_id') == $kunjungan->id ? 'selected' : '' }}>
                                            {{ $kunjungan->pasien->nama_pasien ?? '-' }} |
                                            {{ $kunjungan->dokter->nama ?? '-' }} |
                                            {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->format('d/m/Y') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kunjungan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Diagnosa --}}
                            <div class="mb-3">
                                <label for="diagnosa" class="form-label">Diagnosa</label>
                                <input type="text" class="form-control @error('diagnosa') is-invalid @enderror"
                                    name="diagnosa" id="diagnosa" value="{{ old('diagnosa') }}">
                                @error('diagnosa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tindakan --}}
                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control @error('tindakan') is-invalid @enderror"
                                    name="tindakan" id="tindakan" value="{{ old('tindakan') }}">
                                @error('tindakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Catatan Dokter --}}
                            <div class="mb-3">
                                <label for="catatan_dokter" class="form-label">Catatan Dokter</label>
                                <textarea class="form-control @error('catatan_dokter') is-invalid @enderror" name="catatan_dokter" id="catatan_dokter"
                                    rows="3">{{ old('catatan_dokter') }}</textarea>
                                @error('catatan_dokter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Rekam Medis
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Data rekam medis akan dicatat sesuai kunjungan, diagnosa, tindakan, dan catatan dokter.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
