@extends('layouts.admin')

@section('title', 'Detail Pasien')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Profil Pasien: {{ $pasien->nama_pasien }}</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-bordered table-hover align-middle">
                    <tbody>
                        <tr>
                            <th class="bg-light" style="width: 250px; font-size: 1.1rem;">No RM</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->no_rm }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Nama</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->nama_pasien }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Tanggal Lahir</th>
                            <td style="font-size: 1.1rem;">{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Jenis Kelamin</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Alamat</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">No HP</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Penanggung Jawab</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->penanggung_jawab ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Dibuat Pada</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light" style="font-size: 1.1rem;">Terakhir Diperbarui</th>
                            <td style="font-size: 1.1rem;">{{ $pasien->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('pasien.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection
