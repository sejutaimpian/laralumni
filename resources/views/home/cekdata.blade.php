@extends('layout.template')
@section('content')

<div class="container" id="siswaterbaik">
    <div class="row">
        <div class="col-sm-10 mt-3">
            @if (session('gagal'))
                <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <i class="bi bi-{{ session('icon') }} pe-2"></i>
                        <p class="mb-0">{{ session('gagal') }}</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row justify-content-center align-items-center text-center">
                    <a href="/" class="col-6 col-md-4 col-lg-3 text-decoration-none link-primary btn">Kembali ke Home</a>
                </div>
            @else
                <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <i class="bi bi-{{ session('icon') }} pe-2"></i>
                        <p class="mb-0">{{ session('berhasil') }}</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center">
                    <img src="/image/{{ $alumni->foto }}" alt="{{ $alumni->nama }}">
                </div>
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
            @endif
        </div>
        <div class="col-sm-2 d-none d-sm-block">
            @include('layout.sidenav')
        </div>
    </div>

</div>

@endsection