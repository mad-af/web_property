@extends('authPage/_layout')

@section('title')
Ubah Password
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
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <h1 class="h4 text-gray-900 mb-2">Setel Ulang Password Anda</h1>
                        <p class="mb-4">Setelah 1 langkah validasi sederhana yang telah anda lakukan, kini
                            anda bisa menyetel ulang password dari akun anda di halaman ini.
                        </p>
                    </div>
                    <form class="user" method="POST" action="{{route('resetPasswordAction')}}">
                        @csrf
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password"
                                id="exampleInputPassword" aria-describedby="passwordHelp"
                                placeholder="Enter New Password..." required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="confPassword"
                                id="exampleInputConfPassword" aria-describedby="confPasswordHelp"
                                placeholder="Re-Enter New Password..." required>
                            <input type="hidden" name="token" id="token" value="{{$token}}">
                            <input type="hidden" name="email" id="email" value="{{$email}}">
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