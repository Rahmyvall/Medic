@extends('layouts.admin')

@section('title', 'Edit Tentang Kami')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Data Tentang Kami</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('about_us.update', $about->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Judul --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $about->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="5" required>{{ old('description', $about->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Visi --}}
                            <div class="mb-3">
                                <label for="vision" class="form-label">Visi</label>
                                <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="3">{{ old('vision', $about->vision) }}</textarea>
                                @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Misi --}}
                            <div class="mb-3">
                                <label for="mission" class="form-label">Misi</label>
                                <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" rows="3">{{ old('mission', $about->mission) }}</textarea>
                                @error('mission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Gambar --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>

                                @if ($about->image)
                                    @php
                                        // pastikan selalu array
                                        $images = is_array($about->image)
                                            ? $about->image
                                            : json_decode($about->image, true);
                                    @endphp

                                    @if ($images && count($images) > 0)
                                        <div class="mb-2 d-flex flex-wrap gap-2">
                                            @foreach ($images as $img)
                                                <img src="{{ asset('storage/' . $img) }}" alt="Gambar Tentang Kami"
                                                    class="img-thumbnail"
                                                    style="width: 200px; height: 150px; object-fit: cover;">
                                            @endforeach
                                        </div>
                                    @endif
                                @endif

                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image[]" accept="image/*" multiple>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('about_us.index') }}" class="btn btn-secondary me-3">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
