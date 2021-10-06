@extends('authPage/_layout')

@section('title')
Daftar
@endsection

@section('content')
<div class="container">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block" style="background-image: url({{asset('images/webPage/bg_1.jpg')}}); "></div>
            <div class="col-lg-7">
                <div class="p-5">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Gagal</strong> - {{ $errors->first() }}
                    </div>
                    @endif
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Membuat Sebuah Akun!</h1>
                    </div>
                    <form action="{{url('/register')}}" method="POST" class="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="firstName"
                                    placeholder="Nama Depan" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="lastName"
                                    placeholder="Nama Belakang" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email"
                                placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="username"
                                placeholder="Username" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    name="password" placeholder="Password - min: 8 huruf" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    name="passwordValidation" placeholder="Ulangi Password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Mendaftar
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{url('/forgot-password')}}">Lupa Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{url('/login')}}">Sudah punya akun? Masuk!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection