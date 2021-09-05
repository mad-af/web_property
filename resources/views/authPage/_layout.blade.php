@extends('./index')

@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ecoverde - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
  
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body> 

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">Ecoverde</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('login') ? 'active' : ''}}"><a href="{{url('/login')}}" class="nav-link">Masuk</a></li>
        <li class="nav-item {{ Request::is('register') ? 'active' : ''}}"><a href="{{url('/register')}}" class="nav-link">Daftar</a></li>
        <li class="nav-item {{ Request::is('forgot-password') ? 'active' : ''}}"><a href="{{url('/forgot-password')}}" class="nav-link">Lupa Password</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('images/webPage/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate pb-0 text-center">
        <h1 class="mb-3 bread">@yield('title')</h1>
      </div>
    </div>
  </div>
</section>

@yield('content')

<footer class="ftco-footer ftco-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-3">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Ecoverde</h2>
          <p>Far far away, behind the word mountains, far from the countries.</p>
          <ul class="ftco-footer-social list-unstyled mt-5">
            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md">
          <div class="ftco-footer-widget mb-4">
          <ul class="list-unstyled">
            <li><a href="{{url('/')}}"><span class="fa fa-chevron-right mr-2"></span>Beranda</a></li>
            <li><a href="{{url('/property')}}"><span class="fa fa-chevron-right mr-2"></span>Properti</a></li>
            <li><a href="{{url('/find-home')}}"><span class="fa fa-chevron-right mr-2"></span>Find Home</a></li>
            <li><a href="{{url('/about-us')}}"><span class="fa fa-chevron-right mr-2"></span>Tentang Kami</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
              <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
              <li><a href="#"><span class="icon fa fa-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">

        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>

</body>    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('js/google-map.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</html>
@endsection