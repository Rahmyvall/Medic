@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Detail Resep</h1>

                <div class="d-flex">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('detailreseps.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Obat"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    {{-- Tombol Tambah Data --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('detailreseps.create') }}" class="btn btn-success">Tambah Detail Resep</a>
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
                                    <th>Nama Resep</th>
                                    <th>Nama Obat</th>
                                    <th>Dosis</th>
                                    <th>Jumlah</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detailreseps as $detail)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $detail->resep->resep_id ?? '-' }}</td>
                                        <td>{{ $detail->obat->nama_obat ?? '-' }}</td>
                                        <td>{{ $detail->dosis }}</td>
                                        <td>{{ $detail->jumlah }}</td>
                                        <td class="text-center">
                                            @if (Auth::user()->role === 'admin')
                                                <a href="{{ route('detailreseps.show', $detail->detail_id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <a href="{{ route('detailreseps.edit', $detail->detail_id) }}"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('detailreseps.destroy', $detail->detail_id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus detail resep ini?')">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Tidak ada data detail resep.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4 text-end">
                            {{ $detailreseps->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
