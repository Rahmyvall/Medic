@extends('layouts.admin')

@section('title', 'Detail Detail Resep')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-notes-medical me-2"></i>
                        <h5 class="mb-0">Detail Resep</h5>
                    </div>
                    <div class="card-body">
                        {{-- Info Detail Resep --}}
                        <table class="table table-bordered mb-4">
                            <tr>
                                <th>Nama Resep</th>
                                <td>{{ $detailresep->resep->resep_id ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Obat</th>
                                <td>{{ $detailresep->obat->nama_obat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dosis</th>
                                <td>{{ $detailresep->dosis }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $detailresep->jumlah }}</td>
                            </tr>
                        </table>

                        <a href="{{ route('detailreseps.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
