@extends('authPage/_layout')

@section('title')
Lupa Akun
@endsection

@section('content')
<!-- Outer Row -->
<div class="container">
<div class="row justify-content-center">
  
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-2">Lupa Password Anda?</h1>
                        <p class="mb-4">Kami mengerti, hal-hal terjadi. Cukup masukkan alamat email Anda di 
                          bawah ini dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda!</p>
                    </div>
                    <form class="user" method="POST" action="{{route('forgotPasswordAction')}}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Email Address..." required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Setel Ulang
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{url('/register')}}">Membuat sebuah akun!</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{url('/login')}}">Sudah punya akun? Masuk!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection