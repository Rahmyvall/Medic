@extends('layouts.admin')

@section('tambah', 'Tambah Resep Obat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-prescription-bottle-alt me-2"></i>
                        <h5 class="mb-0">Tambah Data Resep Obat</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reseps.store') }}">
                            @csrf

                            {{-- Pilih Rekam Medis --}}
                            <div class="mb-3">
                                <label for="rekam_id" class="form-label">Rekam Medis</label>
                                <select class="form-control @error('rekam_id') is-invalid @enderror" name="rekam_id"
                                    id="rekam_id">
                                    <option value="">-- Pilih Rekam Medis --</option>
                                    @foreach ($rekam_medis as $rekam)
                                        <option value="{{ $rekam->rekam_id }}"
                                            {{ old('rekam_id') == $rekam->rekam_id ? 'selected' : '' }}>
                                            {{ $rekam->kunjungan->pasien->nama_pasien ?? '-' }} |
                                            {{ $rekam->kunjungan->dokter->nama ?? '-' }} |
                                            {{ $rekam->diagnosa ?? '-' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rekam_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Pilih Dokter --}}
                            <div class="mb-3">
                                <label for="dokter_id" class="form-label">Dokter Penanggung Jawab</label>
                                <select name="dokter_id" class="form-control">
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>

                                @error('dokter_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Resep --}}
                            <div class="mb-3">
                                <label for="tanggal_resep" class="form-label">Tanggal Resep</label>
                                <input type="date" class="form-control @error('tanggal_resep') is-invalid @enderror"
                                    name="tanggal_resep" id="tanggal_resep"
                                    value="{{ old('tanggal_resep', date('Y-m-d')) }}">
                                @error('tanggal_resep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan (Opsional)</label>
                                <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" id="catatan" rows="3">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Resep
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Data resep akan disimpan berdasarkan rekam medis dan dokter yang dipilih.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
