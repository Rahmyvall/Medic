@extends('layouts.admin')

@section('title', 'Edit Resep')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-pills me-2"></i>
                        <h4 class="mb-0"> Edit Data Resep</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reseps.update', $resep->resep_id) }}">
                            @csrf
                            @method('PUT')

                            {{-- Pilih Rekam Medis --}}
                            <div class="mb-3">
                                <label for="rekam_id" class="form-label">Rekam Medis</label>
                                <select class="form-control @error('rekam_id') is-invalid @enderror" name="rekam_id"
                                    id="rekam_id">
                                    @foreach ($rekam_medis as $rekam)
                                        <option value="{{ $rekam->rekam_id }}"
                                            {{ old('rekam_id', $resep->rekam_id) == $rekam->rekam_id ? 'selected' : '' }}>
                                            {{ $rekam->kunjungan->pasien->nama_pasien ?? '-' }} |
                                            {{ $rekam->kunjungan->dokter->nama ?? '-' }} |
                                            {{ \Carbon\Carbon::parse($rekam->created_at)->format('d/m/Y') }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rekam_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Pilih Dokter --}}
                            <div class="mb-3">
                                <label for="dokter_id" class="form-label">Dokter</label>
                                <select class="form-control @error('dokter_id') is-invalid @enderror" name="dokter_id"
                                    id="dokter_id">
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}"
                                            {{ old('dokter_id', $resep->dokter_id) == $dokter->id ? 'selected' : '' }}>
                                            {{ $dokter->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('dokter_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Catatan --}}
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan Tambahan</label>
                                <textarea name="catatan" id="catatan" rows="3" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan', $resep->catatan) }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Resep --}}
                            <div class="mb-3">
                                <label for="tanggal_resep" class="form-label">Tanggal Resep</label>
                                <input type="date" name="tanggal_resep" id="tanggal_resep"
                                    class="form-control @error('tanggal_resep') is-invalid @enderror"
                                    value="{{ old('tanggal_resep', \Carbon\Carbon::parse($resep->tanggal_resep)->format('Y-m-d')) }}">

                                @error('tanggal_resep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('reseps.index') }}" class="btn btn-secondary me-3">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-muted text-center">
                        Pastikan data resep sudah sesuai dengan diagnosa dan tindakan pasien.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
