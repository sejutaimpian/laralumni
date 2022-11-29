@extends('layout.template')
@section('content')

<div class="container" id="siswaterbaik">
    <div class="row">
        <div class="col-sm-10">
            <div class="text-center my-1">
                <i class="bi bi-award fs-1"></i>
                <h1 class="m-0 fw-bold">SISWA TERBAIK</h1>
                <p>Siswa terbaik adalah siswa yang terbaik pada angkatan dan jurusanya.</p>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
                @foreach ($penghargaan as $p)                    
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset("storage/Foto-Alumni/$p->foto") }}" class="card-img-top" alt="{{ $p->nama }}">
                                <span class="position-absolute top-0 end-0 bg-primary text-white px-2 fs-6 rounded" style="--bs-bg-opacity: .8;"><i class="bi bi-ladder pe-2"></i>{{ $p->tahun_keluar }}</span>
                                <span class="position-absolute bottom-0 start-0 bg-dark text-light px-2 fs-6 text-opacity-75"><i class="bi {{ $p->icon }} pe-2"></i>{{ $p->nama_jurusan }}</span>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title border-bottom border-primary">{{ $p->nama }}</h5>
                                <div class="col rounded py-1">
                                    <p class="m-0">{{ $p->penghargaan }}</p>
                                </div>
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