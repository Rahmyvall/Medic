@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Rekap Pembayaran</h1>

                <div class="d-flex">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('pembayaran.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Dokter"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    {{-- Tombol Tambah Data --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('pembayaran.create') }}" class="btn btn-success">Tambah Pembayaran</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Total Tagihan</th>
                                    <th>Metode Bayar</th>
                                    <th>Status</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th> {{-- Kolom aksi --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayarans as $p)
                                    <tr>
                                        <td>{{ $p->pembayaran_id }}</td>
                                        <td>{{ $p->pasien->nama_pasien ?? '-' }}</td>
                                        <td>{{ $p->dokter->nama ?? '-' }}</td>
                                        <td>Rp {{ number_format($p->total_tagihan, 2, ',', '.') }}</td>
                                        <td>{{ ucfirst($p->metode_bayar) }}</td>
                                        <td>
                                            @if ($p->status == 'lunas')
                                                <span class="badge bg-success text-white">{{ ucfirst($p->status) }}</span>
                                            @elseif($p->status == 'pending')
                                                <span class="badge bg-warning text-white">{{ ucfirst($p->status) }}</span>
                                            @else
                                                <span class="badge bg-danger text-white">{{ ucfirst($p->status) }}</span>
                                            @endif
                                        </td>

                                        <td>{{ $p->tanggal_bayar ? \Carbon\Carbon::parse($p->tanggal_bayar)->format('d-m-Y H:i') : '-' }}
                                        </td>
                                        <td>{{ $p->keterangan ?? '-' }}</td>
                                        <td>
                                            {{-- Tombol Show --}}
                                            <a href="{{ route('pembayaran.show', $p->pembayaran_id) }}"
                                                class="btn btn-info btn-sm">Detail</a>

                                            {{-- Tombol Edit (hanya admin) --}}
                                            @if (Auth::user()->role === 'admin')
                                                <a href="{{ route('pembayaran.edit', $p->pembayaran_id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                {{-- Tombol Delete --}}
                                                <form action="{{ route('pembayaran.destroy', $p->pembayaran_id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4 text-end">
                            {{ $pembayarans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
