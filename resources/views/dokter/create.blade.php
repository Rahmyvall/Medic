@extends('layouts.admin')

@section('tambah', 'Tambah Dokter')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-user-md me-2"></i>
                        <h5 class="mb-0">Tambah Data Dokter</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dokter.store') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Nama Dokter --}}
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Dokter</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama') }}"
                                        placeholder="Masukkan nama dokter">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Spesialisasi --}}
                            <div class="mb-3">
                                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                    <input type="text" class="form-control @error('spesialisasi') is-invalid @enderror"
                                        id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi') }}"
                                        placeholder="Contoh: Anak, Bedah, THT">
                                    @error('spesialisasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Jadwal Praktek --}}
                            <div class="mb-3">
                                <label for="jadwal_praktek" class="form-label">Jadwal Praktek</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    <input type="text" class="form-control @error('jadwal_praktek') is-invalid @enderror"
                                        id="jadwal_praktek" name="jadwal_praktek" value="{{ old('jadwal_praktek') }}"
                                        placeholder="Contoh: Senin - Jumat 08:00-12:00">
                                    @error('jadwal_praktek')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Foto Dokter --}}
                            <div class="mb-3">
                                <label for="photo_dokter" class="form-label">Foto Dokter</label>
                                <input type="file" class="form-control @error('photo_dokter') is-invalid @enderror"
                                    id="photo_dokter" name="photo_dokter" accept="image/*">
                                @error('photo_dokter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Data
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Dokter ID dan Nomor STR akan di-generate otomatis oleh sistem.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
