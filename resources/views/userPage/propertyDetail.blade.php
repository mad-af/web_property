@extends('userPage/_subLayout')
@inject('method', 'App\Helper\Method')

@section('title')
Properti
@endsection

@section('contents')

<section class="ftco-section" id="property">
  <div class="container">
    
  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <strong>Gagal</strong> - {{ $errors->first() }}
  </div>
  @endif

    <div class="d-xl-flex">
      <div class="col">
        <img src="{{ asset($data['image']) }}" class="rounded img-fluid zoom-in" alt="image_property" data-toggle="modal" data-target="#exampleModal">
      </div>
      <div class="col">
        <div>
          <h2 class="font-weight-bold text-success title">
            {{ $data['title'] }}
          </h2>
          <span class="lead">{{ $data['address'] }}</span>
        </div>
        <div class="mt-3">
          <h1 >Rp. {{ $method::rupiah($data['price']) }}</h1>
        </div>
        <div>
          <div class="mt-1 d-flex flex-wrap">
            <div class="mt-3 mr-5">
              <i class="fa fa-bath fa-lg" aria-hidden="true"></i>
              <span>{{ $data['bedRoom'] }} Kamar Tidur</span>
            </div>
            <div class="mt-3 mr-5">
              <i class="fa fa-bed fa-lg" aria-hidden="true"></i>
              <span>{{ $data['bathRoom'] }} Kamar Mandi</span>
            </div>
            <div class="mt-3 mr-5">
              <i class="fa fa-car fa-lg" aria-hidden="true"></i>
              <span>{{ $data['parkingLot'] }} Tempat Parkir</span>
            </div>
            <div class="mt-3 mr-5">
              <i class="fa fa-arrows fa-lg" aria-hidden="true"></i>
              <span>{{ $data['width']."x".$data['length'] }} meter</span>
            </div>
            <div class="mt-3 mr-5">
              <i class="fa fa-fire fa-lg" aria-hidden="true"></i>
              <span>{{ $data['heating'] }}</span>
            </div>
          </div>
        </div>
        <div class="mt-4 mb-1">
          <h5 class="font-weight-bold" >Deskripsi</h5>
          {!! nl2br(e($data['description']))!!}
        </div>
        <div class="mt-5">
          <form action="{{url('/user/order/'.$data['id'])}}" method="POST">
            @csrf
            <button class="btn btn-success w-100">Beli</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Gambar Properti</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset($data['image']) }}" class="rounded img-fluid" alt="image_property">
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

<style>
  .zoom-in {cursor: zoom-in;}
</style>