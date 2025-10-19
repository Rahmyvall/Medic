@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Rekap Pasien</h1>

                <div class="d-flex">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('pasien.index') }}" method="GET" class="d-flex me-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama atau No RM"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    {{-- Tombol Tambah Data --}}
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('pasien.create') }}" class="btn btn-success">Tambah Data Pasien</a>
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
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Penanggung Jawab</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pasiens as $pasien)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $pasien->no_rm }}</td>
                                        <td>{{ $pasien->nama_pasien }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $pasien->alamat ?? '-' }}</td>
                                        <td>{{ $pasien->no_hp ?? '-' }}</td>
                                        <td>{{ $pasien->penanggung_jawab ?? '-' }}</td>
                                        <td class="text-center">
                                            @if (Auth::user()->role === 'admin')
                                                <a href="{{ route('pasien.show', $pasien->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('pasien.edit', $pasien->id) }}"
                                                    class="btn btn-success btn-sm me-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST"
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
                                        <td colspan="9" class="text-center text-muted">
                                            Tidak ada data pasien.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-4 text-end">
                            {{ $pasiens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
