@extends('webPage/_subLayout')

@section('title')
Tentang Kami
@endsection

@section('contents')
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
@endsection