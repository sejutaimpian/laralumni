@extends('layout.template-dashboard')
@section('content')

<!-- Title -->
<div class="row my-2">
    <div class="col-md-6">
        <h1 class="fw-bold"><i class="bi bi-mortarboard pe-2"></i>{{ $title }}</h1>
    </div>
</div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
    <img src="{{ asset("storage/Foto-Alumni-$alumni->tahun_masuk/$alumni->foto") }}" alt="{{ $alumni->nama }}">
</div>
<div class="container mb-4">
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" class="text-end col-5">#</th>
                <th scope="col"></th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <th scope="row" class="text-end fw-normal">Nomor Induk Sekolah</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->nis }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Nomor Induk Sekolah Nasional</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->nisn }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Nama Lengkap</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->nama }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Tempat Lahir</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->tempat_lahir }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Tanggal Lahir</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Orang tua / Wali</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->ortu_wali }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Jurusan</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->nama_jurusan }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Tahun Masuk</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->tahun_masuk }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Status</th>
                <td class="text-center">:</td>
                <td class="fw-bold">{{ $alumni->status }}</td>
            </tr>
            <tr>
                <th scope="row" class="text-end fw-normal">Tahun Keluar</th>
                <td class="text-center">:</td>
                <td>{{ $alumni->tahun_keluar }}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-4">
            <form action="/dashboard/alumni/{{ $alumni->nis }}" class="d-flex justify-content-center" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data?')">Hapus</button>
            </form>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <a href="/dashboard/alumni/{{ $alumni->nis }}/edit" class="btn btn-warning">Edit</a>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <a href="/dashboard/alumni" class="btn btn-success d-block">Kembali</a>
        </div>
    </div>
</div>    

@endsection