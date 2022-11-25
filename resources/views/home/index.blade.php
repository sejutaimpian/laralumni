@extends('layout.template')
@section('content')

<!-- Intro Section -->
<div class="container" id="intro">
    <div class="row justify-content-center align-items-center text-center vh-100">
        <div class="perkenalan mb-2">
            <h1 class="fw-bold">PORTAL ALUMNI SMK YPI KHOERUL FALAH JOMPONG</h1>
            <img src="/aset/{{ $profile->logo }}" alt="logo" height="70">
            <div class="col-6 mx-auto bg-primary mt-2 rounded">
                <h5 class="jargon text-white p-1"><?= $profile['jargon']; ?></h5>
            </div>
        </div>
        <form action="/cekdata" method="GET" class="col-md-6">
            <h2>Cari Alumni</h2>
            <div class="form-floating mb-1">
                <input type="number" class="form-control" id="nis" name="nis" placeholder="43200" />
                <label for="nis" class="text-start">Nomor Induk Sekolah</label>
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Fulan" />
                <label for="nama" class="text-start">Nama Lengkap</label>
            </div>
            <button type="submit" class="btn btn-outline-primary d-block w-50 mx-auto">Cek Data</button>
        </form>

        <!-- Navigasi -->
        <div class="row mt-4 bg-white rounded">
            <div class="col-12">
                <h5 class="jargon mb-1">NAVIGASI</h5>
            </div>
            <div class="col-4 px-0">
                <a href="#dataterkini" class="text-decoration-none d-flex justify-content-center align-items-center gap-2 mx-5 mb-1 mb-md-3 text-dark">
                    <i class="bi bi-graph-up-arrow fs-3"></i>
                    <span class="h5 m-0 d-none d-sm-block text-start">Data Terkini</span>
                </a>
            </div>
            <div class="col-4 px-0">
                <a href="#siswaterbaik" class="text-decoration-none d-flex justify-content-center align-items-center gap-2 mx-5 mb-1 mb-md-3  text-dark">
                    <i class="bi bi-award fs-3"></i>
                    <span class="h5 m-0 d-none d-sm-block text-start">Siswa Terbaik</span>
                </a>
            </div>
            <div class="col-4 px-0">
                <a href="#kabaralumni" class="text-decoration-none d-flex justify-content-center align-items-center gap-2 mx-5 mb-1 mb-md-3 text-dark">
                    <i class="bi bi-newspaper fs-3"></i>
                    <span class="h5 m-0 d-none d-sm-block text-start">Kabar Alumni</span>
                </a>
            </div>
            <div class="col-4 px-0">
                <a href="#loker" class="text-decoration-none d-flex justify-content-center align-items-center gap-2 mx-5 mb-1 mb-md-3 text-dark">
                    <i class="bi bi-briefcase fs-3"></i>
                    <span class="h5 m-0 d-none d-sm-block text-start">Lowongan Pekerjaan</span>
                </a>
            </div>
            <div class="col-4 px-0">
                <a href="#kenangan" class="text-decoration-none d-flex justify-content-center align-items-center gap-2 mx-5 mb-1 mb-md-3 text-dark">
                    <i class="bi bi-journal-album fs-3"></i>
                    <span class="h5 m-0 d-none d-sm-block text-start">Kenangan Siswa</span>
                </a>
            </div>
            <div class="col-4 px-0">
                <a href="/login" class="text-decoration-none d-flex justify-content-center align-items-center gap-2 mx-5 mb-1 mb-md-3 text-dark">
                    <i class="bi bi-box-arrow-in-right fs-3"></i>
                    <span class="h5 m-0 d-none d-sm-block text-start">Login</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Data Terkini-->
<div class="container mt-4" id="dataterkini">
    <div class="text-center my-1">
        <i class="bi bi-graph-up-arrow fs-1"></i>
        <h1 class="m-0 fw-bold">DATA TERKINI</h1>
        <p>Data ini dihitung secara real-time sehingga akan mengalami perubahan secara otomatis</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-2 bg-white rounded px-2">
        <div class="col d-flex align-items-start">
            <i class="bi bi-mortarboard fs-3 flex-shrink-0 me-3"></i>
            <div>
                <h4 class="fw-bold mb-0">3000</h4>
                <p class="mb-0">ALUMNI pernah merasakan nikmatnya sekolah disini</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-people fs-3 flex-shrink-0 me-3"></i>
            <div>
                <h4 class="fw-bold mb-0">200</h4>
                <p class="mb-0">SISWA sedang menempuh pendidikan disini</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <i class="bi bi-person-video3 fs-3 flex-shrink-0 me-3"></i>
            <div>
                <h4 class="fw-bold mb-0">50</h4>
                <p class="mb-0">GURU sedang mengabdi sekuat hati disini</p>
            </div>
        </div>
    </div>
</div>

<!-- Siswa Terbaik-->
<div class="container mt-4" id="siswaterbaik">
    <div class="text-center my-1">
        <i class="bi bi-award fs-1"></i>
        <h1 class="m-0 fw-bold">SISWA TERBAIK</h1>
        <p>Siswa terbaik adalah siswa yang terbaik pada angkatan dan jurusanya.</p>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-2">
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
        <a href="/siswaterbaik" class="col-6 col-md-4 col-lg-3 text-decoration-none link-primary btn">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
    </div>
</div>

<!-- Kabar Alumni -->
<div class="container mt-4" id="kabaralumni">
    <div class="text-center my-1">
        <i class="bi bi-newspaper fs-1"></i>
        <h1 class="m-0 fw-bold">KABAR ALUMNI</h1>
        <p>Kabar alumni adalah berita-berita terbaru terkait kehidupan maupun pencapaian alumni</p>
    </div>
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
                                    <span>{{ $k->nama }} &#8226;  {{ date('d F Y', strtotime($k->created_at )) }} </span>
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
        <a href="/kabaralumni" class="col-6 col-md-4 col-lg-3 text-decoration-none link-primary btn">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
    </div>
</div>

<!-- Lowongan Pekerjaan -->
<div class="container mt-4" id="loker">
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
    <div class="row justify-content-center align-items-center text-center mt-1">
        <a href="/loker" class="col-6 col-md-4 col-lg-3 text-decoration-none link-primary btn">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
    </div>
</div>

<!-- Kenangan Siswa -->
<div class="container mt-4" id="kenangan">
    <div class="text-center my-1">
        <i class="bi bi-journal-album fs-1"></i>
        <h1 class="m-0 fw-bold">KENANGAN SISWA</h1>
        <p>Kenangan siswa adalah kumpulan foto & video kenang-kenangan oleh siswa dan guru selama bersekolah</p>
    </div>
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
        <a href="/kenangan" class="col-6 col-md-4 col-lg-3 text-decoration-none link-primary btn">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
    </div>
</div>

@endsection