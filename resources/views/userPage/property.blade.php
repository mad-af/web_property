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
        <form action="#" id="formCari" method="POST">
            @csrf
            <div class="row justify-content-center" style="padding: 6em 0; padding-top: 0">
                    <input type="text" placeholder="Masukkan Judul Rumah" name="inpText" class="form-control" style="max-width: 1100px; margin-right: 10px">
                    <button class="btn btn-success" style="padding-inline: 44px">Cari</button>
            </div>
        </form>
        {{-- <div class="row justify-content-center" id="replacement" style="z-index: 22"></div> --}}
        <div class="row justify-content-center" id="replacement">
            @foreach ($data as $item)
            <div class="card spaces" style="max-width: 18rem; border: none">
                <div class="property-wrap ftco-animate">
                    {{-- <a href="#" class="img" style="background-image: url(images/work-3.jpg);"> --}}
                    <a href="#">
                        <img src="{{ asset($item['image']) }}" class="item-image" alt="property-image">
                    </a>
                    <div class="text" style="background: rgb(243,243,243);">
                        <h5 style="font-weight: bold; margin-bottom: -0.6rem; font-size: 100%">
                            <strong>{{ $item['title'] }}</strong>
                        </h3>
                        <span class="location" style="font-size: 90%">{{ $item['address'] }}</span>
                        {{-- {{$item['price']}} --}}
                        <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ $method::priceFormat($item['price']) }}</h2>
                        <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-bed fa-1 small" aria-hidden="true"></i>
                                <h3 class="ml-2" style="font-size: 60%">{{ $item['bedRoom'] }} kamar tidur</h3>
                            </div>
                            <i class="fa fa-bath fa-1 small" aria-hidden="true"></i>
                            <span class="d-flex" style="margin-left: 0.5rem; font-size: 60%">{{ $item['bathRoom'] }} kamar mandi</span>
                            <a href="#" class="btn d-flex btn-success" style="border-radius: 0%; font-size: 60%">Jual</a>
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
<script>
    const form = document.getElementById('formCari');
    form.addEventListener('submit', function(e) {
        e.preventDefault()
        const formData = new FormData(this);
        let str = ''
        let target = document.getElementById('replacement')

        $.ajax({
            url:'{{route("findHomePost")}}',
            type:'POST',
            data:$(this).serialize(),
            success: (res) => {
                str=''
                let myprice = 0
                let toStringVal = ""
                try {
                    console.log(res)
                    res.forEach(item => {
                        myprice = item.price
                        toStringVal = "\""+myprice+"\""
                        str += `
                            <div class="card spaces" style="max-width: 18rem; border: none;">
                                <div class="property-wrap ftco-animate fadeInUp ftco-animated">
                                    <a href="#">
                                        <img src="{{ asset('${item.image}') }}" class="item-image" alt="property-image">
                                    </a>
                                    <div class="text" style="background: rgb(243,243,243);">
                                        <h5 style="font-weight: bold; margin-bottom: -0.6rem; font-size: 100%">
                                            <strong>{{ '${item.title}' }}</strong>
                                        </h3>
                                        <span class="location" style="font-size: 90%">{{ '${item.address}' }}</span>
                                        <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ '${myprice}' }}</h2>
                                        <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-bed fa-1 small" aria-hidden="true"></i>
                                                <h3 class="ml-2" style="font-size: 60%">{{ '${item.bedRoom}' }} kamar tidur</h3>
                                            </div>
                                            <i class="fa fa-bath fa-1 small" aria-hidden="true"></i>
                                            <span class="d-flex" style="margin-left: 0.5rem; font-size: 60%">{{ '${item.bathRoom}' }} kamar mandi</span>
                                            <a href="#" class="btn d-flex btn-success" style="border-radius: 0%; font-size: 60%">Jual</a>
                                        </div>
                                        <div class="list-team d-flex align-items-center mt-2 border-top">
                                            <a href="{{url('/user/property/'.'${item.id}')}}" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                    });
                    $('#replacement').empty()
                    $('#replacement').append(str)
                } catch (err) {
                    console.error(err)
                }
            },
            error: (errs) => {
                console.log(errs)
            }
        })
    })
</script>
@endsection