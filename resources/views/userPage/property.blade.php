@extends('userPage/_subLayout')
@inject('method', 'App\Helper\Method')

@section('title')
Properti
@endsection

@section('contents')
{{-- {{ Request::is('property') }} --}}
<!-- Hello -->

<section class="ftco-section" id="property">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($data as $item)
            <div class="card spaces" style="max-width: 23rem; border: none">
                <div class="property-wrap ftco-animate">
                    <a href="#" class="img" style="background-image: url(images/work-3.jpg);">
                        <img src="{{ asset($item['image']) }}" class="item-image" alt="property-image">
                    </a>
                    <div class="text" style="background: rgb(243,243,243);">
                        <h3 style="font-weight: bolder">
                            <strong>{{ $item['title'] }}</strong>
                        </h3>
                        <span class="location" style="font-size: 90%">{{ $item['address'] }}</span>
                        <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ $method::priceFormat($item['price']) }}</h2>
                        <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-bed" aria-hidden="true"></i>
                                <h3 class="ml-2">{{ $item['bedRoom'] }} kamar tidur</h3>
                            </div>
                            <i class="fa fa-bath" aria-hidden="true"></i>
                            <span class="d-flex" style="margin-left: 0.5rem">{{ $item['bathRoom'] }} kamar mandi</span>
                            <a href="#" class="btn d-flex btn-success" style="border-radius: 0%">Jual</a>
                        </div>
                        <div class="list-team d-flex align-items-center mt-2 border-top">
                            <a href="{{url('/user/property/'.$item['id'])}}" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                        </div>
                    </div>
                </div>
            </div>     
            {{-- @break --}}
            @endforeach
        </div>
        <div class="row ftco-animate">
        <div class="col-md-12">
            {{-- <div class="carousel-properties owl-carousel">
            @foreach ($data as $item)
            <div class="item">
                <div class="property-wrap ftco-animate">
                <a href="#" class="img" style="background-image: url(images/work-3.jpg);">
                <img src="{{ asset($item['image']) }}" alt="property-image">
                </a>
                <div class="text" style="background: rgb(243,243,243);">
                    <h3 style="font-weight: bolder">
                        <strong>{{ $item['title'] }}</strong>
                    </h3>
                    <span class="location" style="font-size: 90%">{{ $item['address'] }}</span>
                    <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ $method::priceFormat($item['price']) }}</h2>
                    <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-bed" aria-hidden="true"></i>
                            <h3 class="ml-2">{{ $item['bedRoom'] }} kamar tidur</h3>
                        </div>
                        <i class="fa fa-bath" aria-hidden="true"></i>
                        <span class="d-flex" style="margin-left: 0.5rem">{{ $item['bathRoom'] }} kamar mandi</span>
                        <a href="#" class="btn d-flex btn-success" style="border-radius: 0%">Jual</a>
                    </div>
                    <div class="list-team d-flex align-items-center mt-2 border-top">
                        <a href="{{url('/user/property/'.$item['id'])}}" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                    </div>
                </div>
                </div>
            </div>     
            @endforeach
        </div> --}}
        </div>
        </div>
    </div>
</section>
  
@endsection