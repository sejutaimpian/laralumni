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
            <form action="/dashboard/kabaralumni" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idakun" id="idakun" value="{{ auth()->user()->id }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kabar Alumni</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="judul" class="col-sm-4 col-form-label">Judul</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="<?= old('judul'); ?>">
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
                            <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" value="<?= old('isi'); ?>" rows="10"></textarea>
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
        <h1 class="fw-bold"><i class="bi bi-newspaper pe-2"></i>{{ $title }}</h1>
    </div>
    <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
        <button class="col-6 col-md-4 col-lg-3 btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-plus-circle pe-2"></i>Tambah Data</button>
        <a href="/kabaralumni" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary btn-sm" target="_blank">Selengkapnya<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</div>

<!-- Table -->
<div class="table-responsive">
    <table id="datatables" class="table table-success table-striped">
        <thead class="table-dark">
            <tr>
                <th>Author</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kabar as $k)
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->judul }}</td>
                    <td>
                        <img src="{{ asset("storage/Foto-Kabar/$k->foto") }}" alt="{{ $k->judul }}" class="" style="max-height: 100px;">
                    </td>
                    <td>
                        <form action="/dashboard/kabaralumni/{{ $k->id }}" method="POST">
                            @method('DELETE')
                            <a href="/kabaralumni/{{ $k->id }}" class="btn btn-success d-block btn-sm" target="_blank">Detail</a>
                            <a href="/dashboard/kabaralumni/{{ $k->id }}/edit" class="btn btn-warning d-block btn-sm my-1">Edit</a>
                            <button type="submit" class="w-100 btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus data?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection