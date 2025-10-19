@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Rekap Kunjungan</h1>

                <div class="d-flex">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('kunjungan.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Pasien/Dokter"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    {{-- Tombol Tambah Data --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('kunjungan.create') }}" class="btn btn-success">Tambah Data Kunjungan</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center" style="width: 5%">#</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Jenis Kunjungan</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kunjungans as $kunjungan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $kunjungan->pasien->nama_pasien }}</td>
                                        <td>{{ $kunjungan->dokter->nama ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->format('d/m/Y H:i') }}
                                        </td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $kunjungan->jenis_kunjungan)) }}</td>
                                        <td>{{ ucfirst($kunjungan->status) }}</td>
                                        <td class="text-center">
                                            @if (Auth::user()->role === 'admin')
                                                <a href="{{ route('kunjungan.show', $kunjungan->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('kunjungan.edit', $kunjungan->id) }}"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('kunjungan.destroy', $kunjungan->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            Tidak ada data kunjungan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4 text-end">
                            {{ $kunjungans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
