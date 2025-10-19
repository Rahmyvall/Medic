@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Resep Obat</h1>

                <div class="d-flex">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('reseps.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2"
                            placeholder="Cari Nama Pasien / Dokter / Catatan" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    {{-- Tombol Tambah Data --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('reseps.create') }}" class="btn btn-success">Tambah Resep</a>
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
                                    <th>Tanggal Resep</th>
                                    <th>Catatan</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reseps as $resep)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $resep->rekamMedis->kunjungan->pasien->nama_pasien ?? '-' }}</td>
                                        <td>{{ $resep->dokter->nama ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($resep->tanggal_resep)->format('d/m/Y') }}</td>
                                        <td>{{ $resep->catatan ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('reseps.show', $resep->resep_id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>

                                            @if (Auth::user()->role === 'admin')
                                                <a href="{{ route('reseps.edit', $resep->resep_id) }}"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="{{ route('reseps.destroy', $resep->resep_id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus resep ini?')">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Tidak ada data resep.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4 text-end">
                            {{ $reseps->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
