@extends('layout.template')
@section('content')

<div class="container" id="siswaterbaik">
    <div class="row">
        <div class="col-sm-10">
            <div class="text-center my-1">
                <i class="bi bi-briefcase fs-1"></i>
                <h1 class="m-0 fw-bold">LOWONGAN PEKERJAAN</h1>
                <p>Lowongan Pekerjaan yang kami kumpulkan berasal dari berbagai sumber dan telah diuji kebenarannya</p>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-2">
                @foreach ($loker as $l)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <img src="/image/{{ $l->logo_perusahaan }}" alt="{{ $l->nama_perusahaan }}" style="max-height: 100px;" class="mb-3">
                                <h2 class="card-title lh-1">{{ $l->pekerjaan }}</h2>
                                <p>{{ $l->nama_perusahaan }}</p>
                                <h6 class="fw-bold mb-0">{{ $l->penempatan }}</h6>
                                <h6 class="fw-bold mb-0">{{ $l->gaji }}</h6>
                                <ul class="my-3">
                                    <li>{{ $l->pendidikan }}</li>
                                    <li>{{ $l->usia }}</li>
                                    <li>{{ $l->kualifikasi }}</li>
                                </ul>
                                <div class="row justify-content-center align-items-center text-center mx-3">
                                    <a href="{{ $l->sumber }}" class="col text-decoration-none btn btn-dark" target="_blank"><i class="bi bi-folder"></i> Detail Loker</a>
                                </div>
                            </div>
                            <div class="card-footer bg-primary text-white">
                                Deadline: {{ date('d F Y', strtotime($l->deadline)) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-2 d-none d-sm-block">
            @include('layout.sidenav')
        </div>
    </div>

</div>
    
@endsection