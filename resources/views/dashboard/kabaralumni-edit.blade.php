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
        <h1 class="fw-bold"><i class="bi bi-newspaper pe-2"></i>{{ $title }}</h1>
    </div>
</div>

<!-- Form -->
<form action="/dashboard/kabaralumni/{{ $kabar->id }}" method="POST" enctype="multipart/form-data" class="ps-md-5 mb-5">
    @csrf
    @method('PUT')
    <input type="hidden" name="idakun" value="{{ auth()->user()->id }}">
    <div class="row mb-2">
        <label for="judul" class="col-sm-4 col-form-label">Judul</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $kabar->judul) }}">
            @error('judul')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="isi" class="col-sm-4 col-form-label">Isi</label>
        <div class="col-sm-8">
            <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="10">{{ old('isi', $kabar->isi) }}</textarea>
            @error('isi')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
        <div class="col-sm-8">
            <div class="">
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                @error('foto')    
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-end align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/dashboard/kabaralumni" class="col-6 col-md-4 col-lg-3 btn"><i class="bi bi-arrow-left pe-2"></i>Kembali</a>
            <button type="submit" class="col-6 col-md-4 col-lg-3 btn btn-secondary">Update<i class="bi bi-check2-circle ps-2"></i></button>
        </div>
    </div>
</form>

@endsection