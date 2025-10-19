@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4 px-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="mt-2">Data Tentang Rumah Sakit</h1>

                @if (Auth::user()->role === 'admin')
                    @if ($about)
                        <a href="{{ route('about_us.edit', $about->id) }}" class="btn btn-success">
                            <i class="fas fa-edit"></i> Edit Data
                        </a>
                    @endif
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if ($about)
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <tbody>
                                        <tr>
                                            <th style="width: 20%">Judul</th>
                                            <td>{{ $about->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>{{ $about->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Visi</th>
                                            <td>{{ $about->vision }}</td>
                                        </tr>
                                        <tr>
                                            <th>Misi</th>
                                            <td>{!! nl2br(e($about->mission)) !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Sejarah</th>
                                            <td>{{ $about->history }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $about->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td>{{ $about->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $about->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gambar</th>
                                            <td>
                                                @if ($about->image)
                                                    @php
                                                        // Pastikan image selalu array
                                                        $images = is_array($about->image)
                                                            ? $about->image
                                                            : json_decode($about->image, true);
                                                    @endphp

                                                    @if ($images && count($images) > 0)
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach ($images as $img)
                                                                <img src="{{ asset('storage/' . $img) }}" alt="Gambar About"
                                                                    class="img-thumbnail"
                                                                    style="width: 200px; height: 150px; object-fit: cover;">
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <span class="text-muted">Belum ada gambar</span>
                                                    @endif
                                                @else
                                                    <span class="text-muted">Belum ada gambar</span>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center text-muted py-5">
                                <p>Belum ada data tentang rumah sakit.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
