@extends('layout.template')
@section('content')
<div class="container" id="siswaterbaik">
    <div class="row">
        <div class="col-sm-10">
            <img src="{{ asset("storage/Foto-Kabar/$kabar->foto") }}" alt="{{ $kabar->nama }}" class="mx-auto d-block mt-2" height="200">
            <h1 class="mb-0">{{ $kabar->judul }}</h1>
            <small class="bg-primary text-light px-2">{{ $kabar->nama }}</small>
            <div class="mt-3">{{ $kabar->isi }}</div>
        </div>
        <div class="col-sm-2 d-none d-sm-block">
            @include('layout.sidenav')
        </div>
    </div>

</div>
    
@endsection