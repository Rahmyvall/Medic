@extends('layouts.admin')

@section('tambah', 'Tambah Detail Resep')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-notes-medical me-2"></i>
                        <h5 class="mb-0">Tambah Detail Resep</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detailreseps.store') }}">
                            @csrf

                            {{-- Pilih Resep --}}
                            <div class="mb-3">
                                <label for="resep_id" class="form-label">Pilih Resep</label>
                                <select class="form-control @error('resep_id') is-invalid @enderror" id="resep_id"
                                    name="resep_id">
                                    <option value="">-- Pilih Resep --</option>
                                    @foreach ($reseps as $resep)
                                        <option value="{{ $resep->resep_id }}"
                                            {{ old('resep_id') == $resep->resep_id ? 'selected' : '' }}>
                                            {{ $resep->resep_id }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('resep_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Pilih Obat --}}
                            <div class="mb-3">
                                <label for="obat_id" class="form-label">Pilih Obat</label>
                                <select class="form-control @error('obat_id') is-invalid @enderror" id="obat_id"
                                    name="obat_id">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obats as $obat)
                                        <option value="{{ $obat->obat_id }}"
                                            {{ old('obat_id') == $obat->obat_id ? 'selected' : '' }}>
                                            {{ $obat->nama_obat }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('obat_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Dosis --}}
                            <div class="mb-3">
                                <label for="dosis" class="form-label">Dosis</label>
                                <input type="text" class="form-control @error('dosis') is-invalid @enderror"
                                    id="dosis" name="dosis" value="{{ old('dosis') }}"
                                    placeholder="Masukkan dosis obat">
                                @error('dosis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jumlah --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah', 1) }}" min="1">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Detail Resep
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Detail resep akan dicatat sesuai resep, obat, dosis, dan jumlah.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
