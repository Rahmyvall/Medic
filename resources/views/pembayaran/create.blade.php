@extends('layouts.admin')

@section('tambah', 'Tambah Pembayaran')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="fas fa-money-check-alt me-2"></i>
                        <h5 class="mb-0">Tambah Data Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pembayaran.store') }}">
                            @csrf

                            {{-- Pilih Kunjungan --}}
                            <div class="mb-3">
                                <label for="kunjungan_id" class="form-label">Kunjungan</label>
                                <select class="form-control @error('kunjungan_id') is-invalid @enderror" name="kunjungan_id"
                                    id="kunjungan_id">
                                    <option value="">-- Pilih Kunjungan --</option>
                                    @foreach ($kunjungans as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kunjungan_id') == $k->id ? 'selected' : '' }}>
                                            {{ $k->pasien->nama_pasien ?? '-' }} - {{ $k->dokter->nama ?? '-' }}
                                            ({{ ucfirst($k->jenis_kunjungan) }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('kunjungan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Total Tagihan --}}
                            <div class="mb-3">
                                <label for="total_tagihan" class="form-label">Total Tagihan</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('total_tagihan') is-invalid @enderror" name="total_tagihan"
                                    id="total_tagihan" value="{{ old('total_tagihan') }}">
                                @error('total_tagihan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Metode Bayar --}}
                            <div class="mb-3">
                                <label for="metode_bayar" class="form-label">Metode Bayar</label>
                                <select class="form-control @error('metode_bayar') is-invalid @enderror" name="metode_bayar"
                                    id="metode_bayar">
                                    <option value="">-- Pilih Metode Bayar --</option>
                                    <option value="cash" {{ old('metode_bayar') == 'cash' ? 'selected' : '' }}>Cash
                                    </option>
                                    <option value="BPJS" {{ old('metode_bayar') == 'BPJS' ? 'selected' : '' }}>BPJS
                                    </option>
                                    <option value="asuransi" {{ old('metode_bayar') == 'asuransi' ? 'selected' : '' }}>
                                        Asuransi</option>
                                </select>
                                @error('metode_bayar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status"
                                    id="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="lunas" {{ old('status') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>
                                        Dibatalkan</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Bayar --}}
                            <div class="mb-3">
                                <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                                <input type="datetime-local"
                                    class="form-control @error('tanggal_bayar') is-invalid @enderror" name="tanggal_bayar"
                                    id="tanggal_bayar" value="{{ old('tanggal_bayar') }}">
                                @error('tanggal_bayar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Keterangan --}}
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                    rows="3">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                                <i class="fas fa-plus-circle me-1"></i> Tambah Pembayaran
                            </button>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Data pembayaran dicatat sesuai kunjungan, total tagihan, metode bayar, status, dan tanggal bayar.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
