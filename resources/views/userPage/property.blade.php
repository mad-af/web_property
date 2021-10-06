@extends('userPage/_subLayout')

@section('title')
Properti
@endsection

@section('contents')
{{-- {{ Request::is('property') }} --}}
<!-- Hello -->

<section class="ftco-section" id="property">
    <div class="container">
        <div class="row justify-content-center">
        </div>
        <div class="row ftco-animate">
        <div class="col-md-12">
            <div class="carousel-properties owl-carousel">
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
                    <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ $item['price'] }}</h2>
                    <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                        <div class="d-flex align-items-center">
                            <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/3030/3030336.png" alt="">
                            <h3 class="ml-2">{{ $item['bedRoom'] }} kamar tidur</h3>
                        </div>
                        <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/638/638137.png" alt="">
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
        </div>
        </div>
        </div>
    </div>
</section>
  
@endsection