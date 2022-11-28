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
        <h1 class="fw-bold"><i class="bi bi-mortarboard pe-2"></i>{{ $title }}</h1>
    </div>
</div>

<!-- Form -->
<form action="/dashboard/alumni/{{ $alumni->nis }}" method="POST" enctype="multipart/form-data" class="ps-md-5 mb-5">
    @csrf
    @method('PUT')
    <div class="row mb-2">
        <label for="nisn" class="col-sm-4 col-form-label">NISN</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn', $alumni->nisn) }}">
            @error('nisn')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $alumni->nama) }}">
            @error('nama')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $alumni->tempat_lahir) }}">
            @error('tempat_lahir')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-8">
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $alumni->tanggal_lahir) }}">
            @error('tanggal_lahir')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="ortu_wali" class="col-sm-4 col-form-label">Orang tua/Wali</label>
        <div class="col-sm-8">
            <input type="text" class="form-control @error('ortu_wali') is-invalid @enderror" id="ortu_wali" name="ortu_wali" value="{{ old('ortu_wali', $alumni->ortu_wali) }}">
            @error('ortu_wali')    
                <div class="invalid-feedback mt-0">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="id_jurusan" class="col-sm-4 col-form-label">Jurusan</label>
        <div class="col-sm-8">
            <select class="form-select @error('id_jurusan') is-invalid @enderror" id="id_jurusan" name="id_jurusan">
                @if (old('id_jurusan'))
                    @foreach ($jurusan as $j)
                        <option {{ old('id_jurusan') == $j->id ? 'selected' : '' }} value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                @else
                    @foreach ($jurusan as $j)
                        <option {{ $alumni->id_jurusan == $j->id ? 'selected' : '' }} value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                @endif
            </select>
            @error('id_jurusan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tahun_masuk" class="col-sm-4 col-form-label">Tahun Masuk</label>
        <div class="col-sm-8">
            <input type="number" min="2007" max="{{ date("Y") }}" placeholder="{{ date("Y") }}" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" name="tahun_masuk" value="{{ old('tahun_masuk', $alumni->tahun_masuk) }}">
            @error('tahun_masuk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="status" class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8">
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                <?php if (old('status')) : ?>
                    <option <?= (old('status')) == "LULUS" ? "selected" : "" ?> value="LULUS">LULUS</option>
                    <option <?= (old('status')) == "BELUM LULUS" ? "selected" : "" ?> value="BELUM LULUS">BELUM LULUS</option>
                    <option <?= (old('status')) == "PINDAH SEKOLAH" ? "selected" : "" ?> value="PINDAH SEKOLAH">PINDAH SEKOLAH</option>
                    <option <?= (old('status')) == "DIKELUARKAN" ? "selected" : "" ?> value="DIKELUARKAN">DIKELUARKAN</option>
                <?php else : ?>
                    <option {{ $alumni->status == "LULUS" ? "selected" : ""}} value="LULUS">LULUS</option>
                    <option {{ $alumni->status == "BELUM LULUS" ? "selected" : ""}} value="BELUM LULUS">BELUM LULUS</option>
                    <option {{ $alumni->status == "PINDAH SEKOLAH" ? "selected" : ""}} value="PINDAH SEKOLAH">PINDAH SEKOLAH</option>
                    <option {{ $alumni->status == "DIKELUARKAN" ? "selected" : ""}} value="DIKELUARKAN">DIKELUARKAN</option>
                <?php endif ?>
            </select>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tahun_keluar" class="col-sm-4 col-form-label">Tahun Keluar</label>
        <div class="col-sm-8">
            <input type="number" min="2007" max="<?= date("Y"); ?>" placeholder="<?= date("Y"); ?>" class="form-control @error('tahun_keluar') is-invalid @enderror" id="tahun_keluar" name="tahun_keluar" value="{{ old('tahun_keluar', $alumni->tahun_keluar) }}">
            @error('tahun_keluar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
        <div class="col-sm-8">
            <div class="">
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-end align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/dashboard/alumni" class="col-6 col-md-4 col-lg-3 btn"><i class="bi bi-arrow-left pe-2"></i>Kembali</a>
            <button type="submit" class="col-6 col-md-4 col-lg-3 btn btn-secondary">Update<i class="bi bi-check2-circle ps-2"></i></button>
        </div>
    </div>
</form>

@endsection