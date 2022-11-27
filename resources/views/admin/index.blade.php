@extends('layout.template-dashboard')

@section('content')
<!-- Dashboard Konten -->
<div class="mt-2 px-3 py-1">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
        <div class="col my-1">
            <div class="bg-primary border-bottom border-secondary border-5 rounded text-light position-relative pb-2 px-2">
                <div class="fw-bold text-light fs-1"><?= $total['alumni']; ?></div>
                <div class="fs-3 fw-normal">Alumni</div>
                <i class="bi bi-mortarboard position-absolute top-0 end-0 fs-1 pe-3"></i>
                <a href="/{{ auth()->user()->role }}/alumni" class="text-light fw-light">Lihat selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
        <div class="col my-1">
            <div class="bg-primary border-bottom border-secondary border-5 rounded text-light position-relative pb-2 px-2">
                <div class="fw-bold text-light fs-1"><?= $total['penghargaan']; ?></div>
                <div class="fs-3 fw-normal">Siswa Terbaik</div>
                <i class="bi bi-award position-absolute top-0 end-0 fs-1  pe-3"></i>
                <a href="/{{ auth()->user()->role }}/siswaterbaik" class="text-light fw-light">Lihat selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
        <div class="col my-1">
            <div class="bg-primary border-bottom border-secondary border-5 rounded text-light position-relative pb-2 px-2">
                <div class="fw-bold text-light fs-1"><?= $total['kabar']; ?></div>
                <div class="fs-3 fw-normal">Kabar Alumni</div>
                <i class="bi bi-newspaper position-absolute top-0 end-0 fs-1  pe-3"></i>
                <a href="/{{ auth()->user()->role }}/kabaralumni" class="text-light fw-light">Lihat selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
        <div class="col my-1">
            <div class="bg-primary border-bottom border-secondary border-5 rounded text-light position-relative pb-2 px-2">
                <div class="fw-bold text-light fs-1"><?= $total['loker']; ?></div>
                <div class="fs-3 fw-normal">Loker</div>
                <i class="bi bi-briefcase position-absolute top-0 end-0 fs-1  pe-3"></i>
                <a href="/{{ auth()->user()->role }}/loker" class="text-light fw-light">Lihat selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
        <div class="col my-1">
            <div class="bg-primary border-bottom border-secondary border-5 rounded text-light position-relative pb-2 px-2">
                <div class="fw-bold text-light fs-1"><?= $total['kenangan']; ?></div>
                <div class="fs-3 fw-normal">Kenangan</div>
                <i class="bi bi-journal-album position-absolute top-0 end-0 fs-1  pe-3"></i>
                <a href="/{{ auth()->user()->role }}/kenangan" class="text-light fw-light">Lihat selengkapnya <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>

    </div>

</div>

<!-- Penghargaan -->
<div class="mt-4">
    <h2 class="fw-bold"><i class="bi bi-award pe-2"></i>Penghargaan</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
        @foreach ($penghargaan as $p)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="position-relative">
                        <img src="/image/{{ $p->foto }}" class="card-img-top" alt="{{ $p->nama }}">
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
    <div class="row justify-content-center align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/{{ auth()->user()->role }}/siswaterbaik" class="col-6 col-md-4 col-lg-3 btn btn-secondary"><i class="bi bi-gear"></i> Operasi</a>
            <a href="/siswaterbaik" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary" target="_blank">Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>

<!-- Kabar Alumni -->
<div class="mt-4">
    <h2 class="fw-bold"><i class="bi bi-newspaper pe-2"></i>Kabar Alumni</h2>
    <div class="row row-cols-1 row-cols-md-2 g-2">
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
                                    <span>{{ $k->nama }} &#8226; {{ date('d F Y', strtotime($k->created_at)) }}</span>
                                </div>
                                <a href="/kabaralumni/{{ $k->id }}" class="btn btn-primary d-block"><i class="bi bi-eyeglasses bg-white text-primary rounded me-2 px-2"></i>Baca Kabar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/{{ auth()->user()->role }}/kabaralumni" class="col-6 col-md-4 col-lg-3 btn btn-secondary"><i class="bi bi-gear"></i> Operasi</a>
            <a href="/kabaralumni" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary" target="_blank">Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>

<!-- Loker -->
<div class="mt-4">
    <h2 class="fw-bold"><i class="bi bi-briefcase pe-2"></i>Lowongan Pekerjaan</h2>
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
    <div class="row justify-content-center align-items-center text-center mt-1">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/{{ auth()->user()->role }}/loker" class="col-6 col-md-4 col-lg-3 btn btn-secondary"><i class="bi bi-gear"></i> Operasi</a>
            <a href="/loker" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary" target="_blank">Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>

<!-- Kenangan -->
<div class="mt-4">
    <h2 class="fw-bold"><i class="bi bi-journal-album pe-2"></i>Kenangan Siswa</h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nama Kenangan</th>
                    <th scope="col">Pengelola</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $no = 0; ?>
                @foreach ($kenangan as $k)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $k->nama_kenangan }}</td>
                        <td>{{ $k->pengelola }}</td>
                        <td><a href="{{ $k->link }}" class="btn btn-primary d-block" target="_blank">Buka</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center align-items-center text-center">
        <div class="btn-group col-md-6 rounded-pill" role="group" aria-label="Basic mixed styles example">
            <a href="/{{ auth()->user()->role }}/kenangan" class="col-6 col-md-4 col-lg-3 btn btn-secondary"><i class="bi bi-gear"></i> Operasi</a>
            <a href="/kenangan" class="col-6 col-md-4 col-lg-3 btn btn-outline-primary" target="_blank">Selengkapnya <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
    <div class="my-5"></div>
</div>
    
@endsection