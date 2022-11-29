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
                <form action="/admin/siswaterbaik" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Penghargaan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <label for="nis" class="col-sm-4 col-form-label">Nama Alumni</label>
                            <div class="col-sm-8">
                                <select class="form-select @error('nis') is-invalid @enderror" id="nis" name="nis">
                                    @if (old('nis'))
                                        @foreach ($alumni as $a)
                                            <option {{ old('nis') == $a->nis ? "selected" : "" }} value="{{ $a->nis }}">{{ $a->nama }}</option>
                                        @endforeach
                                    @else
                                        <option selected disabled value="">Pilih....</option>
                                        @foreach ($alumni as $a)
                                            <option value="{{ $a->nis }}">{{ $a->nama }}</option>
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
                                <input type="text" class="form-control @error('penghargaan') is-invalid @enderror" id="penghargaan" name="penghargaan" value="{{ old('penghargaan') }}">
                                @error('penghargaan')    
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
@endcan

<!-- Title -->
<div class="row justify-content-center align-items-center my-2">
    <div class="col-md-6">
        <h1 class="fw-bold"><i class="bi bi-award pe-2"></i><?= $title; ?></h1>
    </div>
    <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
        @can('admin')
            <button class="col-6 col-md-4 col-lg-3 btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-plus-circle pe-2"></i>Tambah Data</button>
        @endcan
        <a href="/siswaterbaik" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary btn-sm" target="_blank">Selengkapnya<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</div>

<!-- Table -->
<div class="table-responsive">
    <table id="datatables" class="table table-success table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIS</th>
                <th>Foto</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Tahun Keluar</th>
                <th>Penghargaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penghargaan as $p)
                <tr>
                    <td>{{ $p->nis }}</td>
                    <td>
                        <img src="{{ asset("storage/Foto-Alumni/$p->foto") }}" alt="{{ $p->nama }}" class="" style="max-height: 100px;">
                    </td>
                    <td><a href="/admin/alumni/{{ $p->nis }}">{{ $p->nama }}</a></td>
                    <td>{{ $p->nama_jurusan }}</td>
                    <td>{{ $p->tahun_keluar }}</td>
                    <td>{{ $p->penghargaan }}</td>
                    <td>
                        <form action="/admin/siswaterbaik/{{ $p->id }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE" />
                            <a href="/admin/siswaterbaik/{{ $p->id }}/edit" class="btn btn-warning d-block btn-sm my-1">Edit</a>
                            <button type="submit" class="w-100 btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection