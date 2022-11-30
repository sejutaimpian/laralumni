@extends('layout.template-dashboard')
@section('content')

<!-- Status -->
@if (session('pesan') || session('peringatan'))
    <div class="alert alert-{{ session('pesan') ? 'success' : 'warning' }} alert-dismissible fade show  mb-0" role="alert">
        {{ session('pesan') ?? session('peringatan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Modal -->
<div class="modal fade p-0" id="Modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <form action="/dashboard/kenangan" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kenangan Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="nama_kenangan" class="col-sm-4 col-form-label">Nama Kenangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('nama_kenangan') is-invalid @enderror" id="nama_kenangan" name="nama_kenangan" value="{{ old('nama_kenangan') }}">
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
                            <input type="text" class="form-control @error('pengelola') is-invalid @enderror" id="pengelola" name="pengelola" value="{{ old('pengelola') }}">
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
                            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}" placeholder="https://google.com">
                            @error('link')    
                                <div class="invalid-feedback mt-0">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Title -->
<div class="row justify-content-center align-items-center my-2">
    <div class="col-md-6">
        <h1 class="fw-bold"><i class="bi bi-journal-album pe-2"></i>{{ $title }}</h1>
    </div>
    <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
        @can('admin')
            <button class="col-6 col-md-4 col-lg-3 btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-plus-circle pe-2"></i>Tambah Data</button>
        @endcan
        <a href="/kenangan" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary btn-sm" target="_blank">Selengkapnya<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</div>

<!-- Table -->
<div class="table-responsive">
    <table id="datatables" class="table table-success table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kenangan</th>
                <th>Pengelola</th>
                <th>Link</th>
                @can('admin')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($kenangan as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kenangan }}</td>
                    <td>{{ $k->pengelola }}</td>
                    <td><a href="{{ $k->link }}" target="_blank">{{ $k->link }}</a></td>
                    @can('admin')
                        <td>
                            <form action="/dashboard/kenangan/<?= $k['id']; ?>" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/dashboard/kenangan/<?= $k['id']; ?>/edit" class="btn btn-warning d-block btn-sm my-1">Edit</a>
                                <button type="submit" class="w-100 btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data?');">Hapus</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection