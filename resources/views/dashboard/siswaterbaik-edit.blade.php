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
        <h1 class="fw-bold"><i class="bi bi-award pe-2"></i>{{ $title }}</h1>
    </div>
</div>

<!-- Form -->
<form action="/dashboard/siswaterbaik/{{ $penghargaan->id }}" method="POST" enctype="multipart/form-data" class="ps-md-5 mb-5">
    @csrf
    @method('PUT')
    <div class="row mb-2">
        <label for="nis" class="col-sm-4 col-form-label">Nama Alumni</label>
        <div class="col-sm-8">
            <select class="form-select @error('nis') is-invalid @enderror" id="nis" name="nis">
                @if (old('nis'))
                    @foreach ($alumni as $a)
                        <option {{ old('nis') == $a->nis ? "selected" : "" }} value="{{ $a->nis }}">{{ $a->nama }}</option>
                    @endforeach
                @else
                    @foreach ($alumni as $a)
                        <option {{ $penghargaan->nis == $a->nis ? 'selected' : '' }} value="{{ $a->nis }}">{{ $a->nama }}</option>
                    @endforeach
                @endif
            </select>
            @error('nis')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="penghargaan" class="col-sm-4 col-form-label">Penghargaan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('penghargaan') is-invalid @enderror" id="penghargaan" name="penghargaan" value="{{ old('penghargaan', $penghargaan->penghargaan) }}">
            @error('penghargaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row justify-content-end align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/dashboard/siswaterbaik" class="col-6 col-md-4 col-lg-3 btn"><i class="bi bi-arrow-left pe-2"></i>Kembali</a>
            <button type="submit" class="col-6 col-md-4 col-lg-3 btn btn-secondary">Update<i class="bi bi-check2-circle ps-2"></i></button>
        </div>
    </div>
</form>

@endsection