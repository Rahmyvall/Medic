@extends('layouts.admin')

@section('tambah', 'Tambah Obat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-pills me-2"></i>
                        <h5 class="mb-0">Tambah Data Obat</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('obat.store') }}">
                            @csrf

                            {{-- Nama Obat --}}
                            <div class="mb-3">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                    id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}"
                                    placeholder="Masukkan nama obat">
                                @error('nama_obat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kategori --}}
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                    id="kategori" name="kategori" value="{{ old('kategori') }}"
                                    placeholder="Masukkan kategori obat">
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Stok --}}
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                    id="stok" name="stok" value="{{ old('stok', 0) }}" min="0">
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Jual --}}
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                    id="harga" name="harga" value="{{ old('harga', 0) }}" min="0">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Beli --}}
                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control @error('harga_beli') is-invalid @enderror"
                                    id="harga_beli" name="harga_beli" value="{{ old('harga_beli', 0) }}" min="0">
                                @error('harga_beli')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Promo --}}
                            <div class="mb-3">
                                <label for="harga_promo" class="form-label">Harga Promo</label>
                                <input type="number" class="form-control @error('harga_promo') is-invalid @enderror"
                                    id="harga_promo" name="harga_promo" value="{{ old('harga_promo', 0) }}" min="0">
                                @error('harga_promo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Obat
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Data obat akan dicatat sesuai nama, kategori, stok, harga jual, harga beli, dan harga promo.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
