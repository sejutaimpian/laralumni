@extends('layout.template-dashboard')
@section('content')

<!-- Status -->
@if (session('pesan') || session('peringatan'))
    <div class="alert alert-{{ session('pesan') ? 'success' : 'warning' }} alert-dismissible fade show  mb-0" role="alert">
        {{ session('pesan') ?? session('peringatan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- title -->
<div class="row my-2">
    <div class="col-md-6">
        <h1 class="fw-bold"><i class="bi bi-journal-album pe-2"></i>{{ $title }}</h1>
    </div>
</div>

<!-- Form -->
<form action="/dashboard/kenangan/{{ $kenangan->id }}" method="POST" enctype="multipart/form-data" class="ps-md-5 mb-5">
    @csrf
    @method('PUT')
    <div class="row mb-2">
        <label for="nama_kenangan" class="col-sm-4 col-form-label">Nama Kenangan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('nama_kenangan') is-invalid @enderror" id="nama_kenangan" name="nama_kenangan" value="{{ old('nama_kenangan', $kenangan->nama_kenangan) }}">
            @error('nama_kenangan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="pengelola" class="col-sm-4 col-form-label">Pengelola</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('pengelola') is-invalid @enderror" id="pengelola" name="pengelola" value="{{ old('pengelola', $kenangan->pengelola) }}">
            @error('pengelola')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="link" class="col-sm-4 col-form-label">Link</label>
        <div class="col-sm-8">
            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $kenangan->link) }}" placeholder="https://google.com">
            @error('link')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row justify-content-end align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/dashboard/kenangan" class="col-6 col-md-4 col-lg-3 btn"><i class="bi bi-arrow-left pe-2"></i>Kembali</a>
            <button type="submit" class="col-6 col-md-4 col-lg-3 btn btn-secondary">Update<i class="bi bi-check2-circle ps-2"></i></button>
        </div>
    </div>
</form>

@endsection