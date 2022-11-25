@extends('layout.template')
@section('content')
    
<div class="container" id="siswaterbaik">
    <div class="row">
        <div class="col-sm-10">
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
                        <?php $no = 0; ?>
                        @foreach ($kenangan as $k)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $k->nama_kenangan }}</td>
                                <td>{{ $k->pengelola }}</td>
                                <td><a href="{{ $k->link }}" class="btn btn-primary d-block" target="_blank">Buka</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-2 d-none d-sm-block">
            @include('layout.sidenav')
        </div>
    </div>
</div>

@endsection