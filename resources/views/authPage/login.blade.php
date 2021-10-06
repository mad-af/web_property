@extends('authPage/_layout')

@section('title')
Masuk
@endsection

@section('content')
<!-- Outer Row -->
<div class="container">
<div class="row justify-content-center">

    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Gagal</strong> - {{ $errors->first() }}
                    </div>
                    @elseif(session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Sukses</strong> - {{ session('success') }}
                    </div>
                    @endif
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                    </div>
                    <form action="{{url('/login')}}" method="POST" class="user">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Masuk
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{url('/forgot-password')}}">Lupa password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{url('/register')}}">Membuat sebuah akun!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection