@extends('layouts.admin')

@section('title', 'Detail Obat')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-pills me-2"></i>
                        <h5 class="mb-0">Detail Obat: {{ $obat->nama_obat }}</h5>
                    </div>
                    <div class="card-body">
                        {{-- Info Obat --}}
                        <table class="table table-bordered mb-4">
                            <tr>
                                <th>Nama Obat</th>
                                <td>{{ $obat->nama_obat }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $obat->kategori }}</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $obat->stok }}</td>
                            </tr>
                        </table>

                        {{-- Tabel Harga --}}
                        <h6 class="mb-2">Harga Obat</h6>
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Harga</th>
                                    <th>Harga (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Harga Beli</td>
                                    <td>{{ number_format($obat->harga_beli ?? 0, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Harga Jual</td>
                                    <td>{{ number_format($obat->harga ?? 0, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Harga Promo</td>
                                    <td>{{ number_format($obat->harga_promo ?? 0, 0, ',', '.') }}</td>
                                </tr>
                                {{-- Total Harga --}}
                                <tr class="table-secondary fw-bold">
                                    <td colspan="2" class="text-center">Total Semua Harga</td>
                                    <td>
                                        {{ number_format(($obat->harga_beli ?? 0) + ($obat->harga ?? 0) + ($obat->harga_promo ?? 0), 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="{{ route('obat.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
