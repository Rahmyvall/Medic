@extends('layouts.admin')

@section('title', 'Edit Rekam Medis')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Data Rekam Medis</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rekam_medis.update', $rekam_medis->rekam_id) }}">
                            @csrf
                            @method('PUT')

                            {{-- Pilih Kunjungan --}}
                            <div class="mb-3">
                                <label for="kunjungan_id" class="form-label">Kunjungan</label>
                                <select class="form-control" name="kunjungan_id">
                                    @foreach ($kunjungans as $kunjungan)
                                        <option value="{{ $kunjungan->id }}"
                                            {{ old('kunjungan_id', $rekam_medis->kunjungan_id) == $kunjungan->id ? 'selected' : '' }}>
                                            {{ $kunjungan->pasien->nama_pasien }} | {{ $kunjungan->dokter->nama }}
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
                                    name="diagnosa" id="diagnosa" value="{{ old('diagnosa', $rekam_medis->diagnosa) }}">
                                @error('diagnosa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tindakan --}}
                            <div class="mb-3">
                                <label for="tindakan" class="form-label">Tindakan</label>
                                <input type="text" class="form-control @error('tindakan') is-invalid @enderror"
                                    name="tindakan" id="tindakan" value="{{ old('tindakan', $rekam_medis->tindakan) }}">
                                @error('tindakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Catatan Dokter --}}
                            <div class="mb-3">
                                <label for="catatan_dokter" class="form-label">Catatan Dokter</label>
                                <textarea class="form-control @error('catatan_dokter') is-invalid @enderror" name="catatan_dokter" id="catatan_dokter"
                                    rows="3">{{ old('catatan_dokter', $rekam_medis->catatan_dokter) }}</textarea>
                                @error('catatan_dokter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('rekam_medis.index') }}" class="btn btn-secondary me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
