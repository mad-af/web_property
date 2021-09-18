@extends('webPage/_layout')

@section('content')

<section class="hero-wrap" style="background-image: url({{asset('images/webPage/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center">
      <div class="col-lg-7 col-md-6 ftco-animate d-flex align-items-end">
        <div class="text">
          <h1 class="mb-4">Temukan Rumah <br>Sempurna Dari Daerah Anda.</h1>
          <p style="font-size: 18px;">Dengan melakukan pelayanan yang terbaik kami akan memberikan anda pengalam yang menyenangkan dalam memilih sebuah properti.</p>
          <p><a href="#property" class="btn btn-primary py-3 px-4">Lihat Properti</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt search-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="search-wrap-1 ftco-animate p-4">
          <div class="row">
            <div class="col-lg align-items-end" style="color:#FFF">
              <strong>Ada fitur baru dari kami,</strong> dengan data pribadi anda kami dapat merekomendasikan properti yang cocok untuk anda. Tunggu apa lagi ayo segera coba. 
            </div>
            <div class="col-lg-3 align-self-end">
              <div class="form-group">
                <div class="form-field">
                  <a href="{{url('/find-home')}}" class="form-control btn btn-primary py-3" style="padding:0.8rem !important">Find Home</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-primary">
  <div class="container">
    <div class="row d-flex no-gutters">
      <div class="col-md-3 d-flex align-items-stretch ftco-animate">
        <div class="media block-6 services services-bg d-block text-center px-4 py-5">
          <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-money"></span></div>
          <div class="media-body py-md-4">
            <h3>Harga yang Kompetitif</h3>
            <p>Dengan harga yang yang murah anda bisa mendapatkan properti dengan kualitas terbaik.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-items-stretch ftco-animate">
        <div class="media block-6 services services-bg services-darken d-block text-center px-4 py-5">
          <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-shield"></div>
          <div class="media-body py-md-4">
            <h3>Transaksi Aman</h3>
            <p>Transaksi pembayaran ke rekening atas nama Perusahaan bukan atas nama perorangan.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-items-stretch ftco-animate">
        <div class="media block-6 services services-bg services-lighten d-block text-center px-4 py-5">
          <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-credit-card"></span></div>
          <div class="media-body py-md-4">
            <h3>Kredit Pemilikan Rumah</h3>
            <p>Anda dapat mencicil properti yang anda inginkan dengan bank-bank besar pilihan anda.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-items-stretch ftco-animate">
        <div class="media block-6 services services-bg d-block text-center px-4 py-5">
          <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-home"></span></div>
          <div class="media-body py-md-4">
            <h3>Banyak Properti Pilihan</h3>
            <p>Kami menyediakan begitu banyak properti serta banyak rekomendasi yang kami berikan.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section" id="property">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">APA YANG KITA TAWARKAN</span>
        <h2 class="mb-2">Properti Unggulan</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="register-notif" style="background-color: gray; position: absolute; z-index:999;">
          <a href="#" class="register-button">

          </a>
        </div>
        <div class="carousel-properties owl-carousel">
          <?php
            for ($i=0; $i < 3; $i++) { 
          ?>
          <div class="item">
            <div class="property-wrap ftco-animate">
              <a href="#" class="img" style="background-image: url(images/work-3.jpg);">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="100%" 
                  xmlns="http://www.w3.org/2000/svg" 
                  role="img" aria-label="Placeholder: Image cap" 
                  preserveAspectRatio="xMidYMid slice" 
                  focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#6c757d"></rect>
                  <text x="40%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                </svg>
              </a>
              <div class="text">
                <h3 style="font-weight: bolder">
                  <strong>
                    Cluster Balmoral B3 No.73
                  </strong>
                </h3>
                <span class="location" style="font-size: 90%">Surabaya, Jawa Timur</span>
                <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. 3 Miliar</h2>
                <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                  <div class="d-flex align-items-center">
                    <img style="max-width: 25px; max-height: 25px" src="{{asset('images/webPage/bed-solid.svg')}}">
                    <h3 class="ml-2">3 kamar tidur</h3>
                  </div>
                  <img style="max-width: 15px; max-height: 15px" src="{{asset('images/webPage/bath-solid.svg')}}" alt="">
                  <span class="d-flex">3 kamar mandi</span>
                  <a href="#" class="btn d-flex btn-success">Jual</a>
                </div>
                <div class="list-team d-flex align-items-center mt-2 border-top">
                  <a href="#" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                </div>
              </div>
            </div>
          </div>        
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section services-section bg-darken">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
        <span class="subheading">ALUR KERJA</span>
        <h2 class="mb-3">Bagaimana Ini Bekerja</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services services-2">
          <div class="media-body py-md-4 text-center">
            <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>01</span>
            <img src="{{asset('images/webPage/blob.svg')}}" alt="">
            </div>
            <h3>Evaluasi Properti</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services services-2">
          <div class="media-body py-md-4 text-center">
            <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>02</span>
            <img src="{{asset('images/webPage/blob.svg')}}" alt="">
            </div>
            <h3>Temui Agen Anda</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services services-2">
          <div class="media-body py-md-4 text-center">
            <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>03</span>
            <img src="{{asset('images/webPage/blob.svg')}}" alt="">
            </div>
            <h3>Menutup Kesepakatan</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
      <div class="col-md-3 d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services services-2">
          <div class="media-body py-md-4 text-center">
            <div class="icon mb-1 d-flex align-items-center justify-content-center"><span>04</span>
            <img src="{{asset('images/webPage/blob.svg')}}" alt="">
            </div>
            <h3>Miliki Properti Anda</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>      
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt">
  <div class="container">
    <div class="row">
      <div class="col-md-7 order-md-last d-flex align-items-stretch">
        <div class="img w-100 img-2 mr-md-2" style="background-image: url({{asset('images/webPage/about.jpg')}});"></div>
        <div class="img w-100 img-2 ml-md-2" style="background-image: url({{asset('images/webPage/about-2.jpg')}});"></div>
      </div>
      <div class="col-md-5 wrap-about py-md-5 ftco-animate">
        <div class="heading-section pr-md-5">
          <h2 class="mb-4">Ecoverde Real Estate</h2>

          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-counter" id="section-counter">
  <div class="container">
    <div class="row pt-md-5">
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-5 mb-4">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="1000">0</strong>
            <span>Total <br>Pengguna</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-5 mb-4">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="2500">0</strong>
            <span>Total <br>Properti</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18 py-5 mb-4">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="500">0</strong>
            <span>Properti <br>Terjual</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Yuk Tunggu Apalagi</span>
        <h2 class="mb-3">
          Mari Segera Daftar dan Menjadi Bagian Dari Kami.
          <a href="{{url('/register')}}">Klik Disini</a>
        </h2>
      </div>
    </div>
  </div>
</section>

@endsection

<style>
html {
  scroll-behavior: smooth;
}
</style>