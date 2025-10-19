@extends('layouts.admin')

@section('tambah', 'Tambah Kunjungan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-notes-medical me-2"></i>
                        <h5 class="mb-0">Tambah Data Kunjungan</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kunjungan.store') }}">
                            @csrf

                            {{-- Pilih Pasien --}}
                            <div class="mb-3">
                                <label for="pasien_id" class="form-label">Pasien</label>
                                <select class="form-control @error('pasien_id') is-invalid @enderror" name="pasien_id"
                                    id="pasien_id">
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach ($pasien as $p)
                                        <option value="{{ $p->id }}"
                                            {{ old('pasien_id') == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama_pasien }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pasien_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Pilih Dokter --}}
                            <div class="mb-3">
                                <label for="dokter_id" class="form-label">Dokter</label>
                                <select class="form-control @error('dokter_id') is-invalid @enderror" name="dokter_id"
                                    id="dokter_id">
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach ($dokter as $d)
                                        <option value="{{ $d->id }}"
                                            {{ old('dokter_id') == $d->id ? 'selected' : '' }}>
                                            {{ $d->nama }} ({{ $d->spesialisasi ?? '-' }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('dokter_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Kunjungan --}}
                            <div class="mb-3">
                                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                                <input type="datetime-local"
                                    class="form-control @error('tanggal_kunjungan') is-invalid @enderror"
                                    id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}">
                                @error('tanggal_kunjungan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Kunjungan --}}
                            <div class="mb-3">
                                <label for="jenis_kunjungan" class="form-label">Jenis Kunjungan</label>
                                <select class="form-control @error('jenis_kunjungan') is-invalid @enderror"
                                    name="jenis_kunjungan" id="jenis_kunjungan">
                                    <option value="">-- Pilih Jenis Kunjungan --</option>
                                    <option value="rawat_jalan"
                                        {{ old('jenis_kunjungan') == 'rawat_jalan' ? 'selected' : '' }}>Rawat Jalan
                                    </option>
                                    <option value="rawat_inap"
                                        {{ old('jenis_kunjungan') == 'rawat_inap' ? 'selected' : '' }}>Rawat Inap</option>
                                    <option value="IGD" {{ old('jenis_kunjungan') == 'IGD' ? 'selected' : '' }}>IGD
                                    </option>
                                </select>
                                @error('jenis_kunjungan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status"
                                    id="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="terjadwal" {{ old('status') == 'terjadwal' ? 'selected' : '' }}>
                                        Terjadwal</option>
                                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="batal" {{ old('status') == 'batal' ? 'selected' : '' }}>Batal</option>
                                    <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Kunjungan
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Data kunjungan akan dicatat sesuai pasien, dokter, tanggal, jenis, dan status.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
