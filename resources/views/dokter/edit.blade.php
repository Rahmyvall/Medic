@extends('layouts.admin')

@section('title', 'Edit Dokter')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Data Dokter</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dokter.update', $dokter->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Dokter ID (Read-Only) --}}
                            <div class="mb-3">
                                <label for="dokter_id" class="form-label">Dokter ID</label>
                                <input type="text" class="form-control" id="dokter_id" name="dokter_id"
                                    value="{{ $dokter->dokter_id }}" readonly>
                            </div>

                            {{-- Nama Dokter --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Dokter</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama', $dokter->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Spesialisasi --}}
                            <div class="mb-3">
                                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                <input type="text" class="form-control @error('spesialisasi') is-invalid @enderror"
                                    id="spesialisasi" name="spesialisasi"
                                    value="{{ old('spesialisasi', $dokter->spesialisasi) }}">
                                @error('spesialisasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jadwal Praktek --}}
                            <div class="mb-3">
                                <label for="jadwal_praktek" class="form-label">Jadwal Praktek</label>
                                <input type="text" class="form-control @error('jadwal_praktek') is-invalid @enderror"
                                    id="jadwal_praktek" name="jadwal_praktek"
                                    value="{{ old('jadwal_praktek', $dokter->jadwal_praktek) }}">
                                @error('jadwal_praktek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Foto Dokter --}}
                            <div class="mb-3">
                                <label for="photo_dokter" class="form-label">Foto Dokter</label>
                                @if ($dokter->photo_dokter)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $dokter->photo_dokter) }}" alt="{{ $dokter->nama }}"
                                            class="img-thumbnail" style="width: 120px; height: 120px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('photo_dokter') is-invalid @enderror"
                                    id="photo_dokter" name="photo_dokter" accept="image/*">
                                @error('photo_dokter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- No STR (Read-Only) --}}
                            <div class="mb-3">
                                <label for="no_str" class="form-label">No STR</label>
                                <input type="text" class="form-control" id="no_str" name="no_str"
                                    value="{{ $dokter->no_str }}" readonly>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('dokter.index') }}" class="btn btn-secondary me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
