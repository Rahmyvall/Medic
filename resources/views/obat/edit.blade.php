@extends('layouts.admin')

@section('title', 'Edit Obat')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Data Obat</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('obat.update', $obat->obat_id) }}">
                            @csrf
                            @method('PUT')

                            {{-- Nama Obat --}}
                            <div class="mb-3">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                    id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}">
                                @error('nama_obat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kategori --}}
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    id="kategori" name="kategori" value="{{ old('kategori', $obat->kategori) }}">
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Stok --}}
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                    id="stok" name="stok" value="{{ old('stok', $obat->stok) }}" min="0">
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Jual --}}
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                    id="harga" name="harga" value="{{ old('harga', $obat->harga) }}" min="0">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Beli --}}
                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control @error('harga_beli') is-invalid @enderror"
                                    id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $obat->harga_beli) }}"
                                    min="0">
                                @error('harga_beli')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Promo --}}
                            <div class="mb-3">
                                <label for="harga_promo" class="form-label">Harga Promo</label>
                                <input type="number" class="form-control @error('harga_promo') is-invalid @enderror"
                                    id="harga_promo" name="harga_promo"
                                    value="{{ old('harga_promo', $obat->harga_promo) }}" min="0">
                                @error('harga_promo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('obat.index') }}" class="btn btn-secondary me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
