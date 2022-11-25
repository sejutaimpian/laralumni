@extends('layout.template')
@section('content')

<div class="container" id="siswaterbaik">
    <div class="row">
        <div class="col-sm-10">
            <div class="text-center my-1">
                <i class="bi bi-newspaper fs-1"></i>
                <h1 class="m-0 fw-bold">KABAR ALUMNI</h1>
                <p>Kabar alumni adalah berita-berita terbaru terkait kehidupan maupun pencapaian alumni</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 g-2">
                @foreach ($kabar as $k)
                    <div class="col">
                        <div class="card shadow-sm" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/image/{{ $k->foto }}" class="img-fluid rounded-start rounded" alt="{{ $k->judul }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $k->judul }}</h5>
                                        <div class="card-subtitle mb-2 text-muted">
                                            <span>{{ $k->nama }} &#8226; <?= date('d/F/Y', strtotime($k->created_at)); ?></span>
                                        </div>
                                        <a href="/kabaralumni/{{ $k->id }}" class="btn btn-primary d-block"><i class="bi bi-eyeglasses bg-white text-primary rounded me-2 px-2"></i>Baca Kabar</a>
                                    </div>
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