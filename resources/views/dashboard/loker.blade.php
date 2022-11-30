@extends('layout.template-dashboard')
@section('content')

@can('admin')
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
                <form action="/dashboard/loker" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Lowongan Pekerjaan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                                @error('pekerjaan')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama_perusahaan" class="col-sm-4 col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}">
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
                                <input type="text" class="form-control @error('penempatan') is-invalid @enderror" id="penempatan" name="penempatan" value="{{ old('penempatan') }}">
                                @error('penempatan')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="gaji" class="col-sm-4 col-form-label">Gaji</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji" value="{{ old('gaji') }}">
                                @error('gaji')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}">
                                @error('pendidikan')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="usia" class="col-sm-4 col-form-label">Usia</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" value="{{ old('usia') }}">
                                @error('usia')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="kualifikasi" class="col-sm-4 col-form-label">Kualifikasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('kualifikasi') is-invalid @enderror" id="kualifikasi" name="kualifikasi" value="{{ old('kualifikasi') }}">
                                @error('kualifikasi')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="sumber" class="col-sm-4 col-form-label">Link Sumber</label>
                            <div class="col-sm-8">
                                <input type="url" class="form-control @error('sumber') is-invalid @enderror" id="sumber" name="sumber" value="{{ old('sumber') }}" placeholder="https://google.com">
                                @error('sumber')    
                                    <div class="invalid-feedback mt-0">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="deadline" class="col-sm-4 col-form-label">Deadline</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}">
                                @error('deadline')    
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
                                    @error('logo_perusahaan')    
                                        <div class="invalid-feedback mt-0">
                                            {{ $message }}
                                        </div>
                                @enderror
                                </div>
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
@endcan
<!-- Title -->
<div class="row justify-content-center align-items-center my-2">
    <div class="col-md-6">
        <h1 class="fw-bold"><i class="bi bi-briefcase pe-2"></i>{{ $title }}</h1>
    </div>
    <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
        @can('admin')
            <button class="col-6 col-md-4 col-lg-3 btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-plus-circle pe-2"></i>Tambah Data</button>
        @endcan
        <a href="/loker" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary btn-sm" target="_blank">Selengkapnya<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</div>

<!-- Table -->
<div class="table-responsive">
    <table id="datatables" class="table table-success table-striped">
        <thead class="table-dark">
            <tr>
                <th>Logo</th>
                <th>Pekerjaan</th>
                <th>Deadline</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loker as $l)
                <tr>
                    <td>
                        <img src="{{ asset("storage/Logo-Perusahaan/$l->logo_perusahaan") }}" alt="{{ $l->nama_perusahaan }}" class="" style="max-height: 100px;">
                    </td>
                    <td>{{ $l->pekerjaan }}</td>
                    <td>{{ $l->deadline }}</td>
                    <td>
                        <a href="/loker" class="btn btn-success d-block btn-sm" target="_blank">Detail</a>
                        @can('admin')
                            <form action="/dashboard/loker/{{ $l->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/dashboard/loker/{{ $l->id }}/edit" class="btn btn-warning d-block btn-sm my-1">Edit</a>
                                <button type="submit" class="w-100 btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data?');">Hapus</button>
                            </form>
                        @endcan
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>

@endsection