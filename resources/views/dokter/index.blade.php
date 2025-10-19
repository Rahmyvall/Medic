@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Rekap Dokter</h1>

                <div class="d-flex">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('dokter.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Dokter"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    {{-- Tombol Tambah Data --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('dokter.create') }}" class="btn btn-success">
                            Tambah Data Dokter
                        </a>
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
                                    <th>Foto</th>
                                    <th>Dokter ID</th>
                                    <th>Nama Dokter</th>
                                    <th>Spesialisasi</th>
                                    <th>Jadwal Praktek</th>
                                    <th>No STR</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dokters as $dokter)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            @if ($dokter->photo_dokter)
                                                <img src="{{ asset('storage/' . $dokter->photo_dokter) }}"
                                                    alt="{{ $dokter->nama }}" class="img-thumbnail"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $dokter->dokter_id }}</td>
                                        <td>{{ $dokter->nama }}</td>
                                        <td>{{ $dokter->spesialisasi ?? '-' }}</td>
                                        <td>{{ $dokter->jadwal_praktek ?? '-' }}</td>
                                        <td>{{ $dokter->no_str }}</td>
                                        <td class="text-center">
                                            @if (Auth::user()->role === 'admin')
                                                <a href="{{ route('dokter.show', $dokter->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    Detail
                                                </a>
                                                <a href="{{ route('dokter.edit', $dokter->id) }}"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST"
                                                    class="d-inline">
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
                                        <td colspan="8" class="text-center text-muted">
                                            Tidak ada data dokter.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4 text-end">
                            {{ $dokters->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
