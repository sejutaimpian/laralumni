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
    <div class="col">
        <h1 class="fw-bold"><i class="bi bi-award pe-2"></i>{{ $title }}</h1>
    </div>
</div>

<!-- Form -->
<form action="/dashboard/loker/{{ $loker->id }}" method="POST" enctype="multipart/form-data" class="ps-md-5 mb-5">
    @csrf
    @method('PUT')
    <div class="row mb-2">
        <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') ?? $loker->pekerjaan }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="nama_perusahaan" class="col-sm-4 col-form-label">Nama Perusahaan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') ?? $loker->nama_perusahaan }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="penempatan" class="col-sm-4 col-form-label">Penempatan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('penempatan') is-invalid @enderror" id="penempatan" name="penempatan" value="{{ old('penempatan') ?? $loker->penempatan }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="gaji" class="col-sm-4 col-form-label">Gaji</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji" value="{{ old('gaji') ?? $loker->gaji }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') ?? $loker->pendidikan }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="usia" class="col-sm-4 col-form-label">Usia</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" value="{{ old('usia') ?? $loker->usia }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="kualifikasi" class="col-sm-4 col-form-label">Kualifikasi</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('kualifikasi') is-invalid @enderror" id="kualifikasi" name="kualifikasi" value="{{ old('kualifikasi') ?? $loker->kualifikasi }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="sumber" class="col-sm-4 col-form-label">Link Sumber</label>
        <div class="col-sm-8">
            <input type="url" class="form-control @error('sumber') is-invalid @enderror" id="sumber" name="sumber" value="{{ old('sumber') ?? $loker->sumber }}" placeholder="https://google.com">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="deadline" class="col-sm-4 col-form-label">Deadline</label>
        <div class="col-sm-8">
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') ?? $loker->deadline }}">
            @error('nama_perusahaan')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="logo_perusahaan" class="col-sm-4 col-form-label">Logo Perusahaan</label>
        <div class="col-sm-8">
            <div class="">
                <input class="form-control @error('logo_perusahaan') is-invalid @enderror" type="file" id="logo_perusahaan" name="logo_perusahaan">
                @error('nama_perusahaan')    
                    <div class="invalid-feedback mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
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