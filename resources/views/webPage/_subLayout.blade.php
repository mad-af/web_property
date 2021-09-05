@extends('webPage/_layout')

@section('content')

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

@yield('contents')

@endsection