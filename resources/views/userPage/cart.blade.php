@extends('userPage/_subLayout')
@inject('method', 'App\Helper\Method')

@section('title')
Keranjang
@endsection

@section('contents')

<section class="ftco-section" id="property">
  <div class="container">
    
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Gagal</strong> - {{ $errors->first() }}
  </div>
  @endif

    <div>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Keranjang</a>
          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pengajuan</a>
          <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Riwayat</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          @foreach ($cart as $item)
          <div class="card mt-2">
            <div class="card-body d-flex justify-content-between">
              <div class="d-flex">
                <img src="{{asset($item['property']['image'])}}" height="120em" width="150em" alt="image-property">
                <div class="ml-3">
                  <h5 class="font-weight-bold text-success title titleCart">
                    {{ $item['property']['title'] }}
                  </h5>
                  <span>{{ $item['property']['address'] }}</span>
                  <div class="mt-1">
                    <h4 >Rp. {{ $method::rupiah($item['property']['price']) }}</h4>
                  </div>
                </div>
              </div>
              <div class="align-self-center">
                <button class="btn btn-success">Ajukan Pembelian</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          @foreach ($submission as $item)
            <div class="card mt-2">
              <div class="card-body d-flex justify-content-between">
                <div class="d-flex">
                  <img src="{{asset($item['property']['image'])}}" height="120em" width="150em" alt="image-property">
                  <div class="ml-3">
                    <h5 class="font-weight-bold text-success title titleCart">
                      {{ $item['property']['title'] }}
                    </h5>
                    <span>{{ $item['property']['address'] }}</span>
                    <div class="mt-1">
                      <h4 >Rp. {{ $method::rupiah($item['property']['price']) }}</h4>
                    </div>
                  </div>
                </div>
                <div class="align-self-center">
                  <button class="btn btn-success">Ajukan Pembelian</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          @foreach ($history as $item)
            <div class="card mt-2">
              <div class="card-body d-flex justify-content-between">
                <div class="d-flex">
                  <img src="{{asset($item['property']['image'])}}" height="120em" width="150em" alt="image-property">
                  <div class="ml-3">
                    <h5 class="font-weight-bold text-success title titleCart">
                      {{ $item['property']['title'] }}
                    </h5>
                    <span>{{ $item['property']['address'] }}</span>
                    <div class="mt-1">
                      <h4 >Rp. {{ $method::rupiah($item['property']['price']) }}</h4>
                    </div>
                  </div>
                </div>
                <div class="align-self-center">
                  <button class="btn btn-success">Ajukan Pembelian</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

<style>
  .titleCart {
    margin: 0;
  }
</style>