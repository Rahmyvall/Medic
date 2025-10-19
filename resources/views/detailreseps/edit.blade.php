@extends('layouts.admin')

@section('title', 'Edit Detail Resep')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Detail Resep</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detailreseps.update', $detailresep->detail_id) }}">
                            @csrf
                            @method('PUT')

                            {{-- Pilih Resep --}}
                            <div class="mb-3">
                                <label for="resep_id" class="form-label">Pilih Resep</label>
                                <select class="form-control @error('resep_id') is-invalid @enderror" id="resep_id"
                                    name="resep_id">
                                    <option value="">-- Pilih Resep --</option>
                                    @foreach ($reseps as $resep)
                                        <option value="{{ $resep->resep_id }}"
                                            {{ old('resep_id', $detailresep->resep_id) == $resep->resep_id ? 'selected' : '' }}>
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
                                            {{ old('obat_id', $detailresep->obat_id) == $obat->obat_id ? 'selected' : '' }}>
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
                                    id="dosis" name="dosis" value="{{ old('dosis', $detailresep->dosis) }}">
                                @error('dosis')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jumlah --}}
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                    id="jumlah" name="jumlah" value="{{ old('jumlah', $detailresep->jumlah) }}"
                                    min="1">
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('detailreseps.index') }}" class="btn btn-secondary me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
