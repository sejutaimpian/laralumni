@extends('layout.template')
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="/login/validasi" method="POST">
                <img class="mx-auto d-block mb-5" src="/aset/<?= $profile['logo']; ?>" alt="Logo SMK" width="72">
                <h1 class="mb-3">Halaman Login</h1>
                @if (session('pesan'))
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        {{ session('pesan') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-floating mb-2">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" autofocus>
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div class="invalid-feedback mt-0">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback mt-0">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
    
@endsection