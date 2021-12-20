@extends('webPage/_subLayout')
@inject('method', 'App\Helper\Method')

@section('title')
Find Home
@endsection

@section('contents')
<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col">
                <div class="form-group">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Gagal</strong> - {{ $errors->first() }}
                    </div>
                    @endif
                    <form action="{{url('/find-home')}}" method="POST">
                        @csrf
                        <label>Pendapatan (Per Bulan)</label>
                        <input type="number" style="margin-bottom:20px" class="form-control form-control-user"
                            name="salary" placeholder="Masukkan Pendapatan Anda" value="{{ old('salary') }}" required>
                        <label>Tipe Perabotan Rumah</label>
                        <select class="form-control" style="margin-bottom:20px" name="subHomeFurnitureId" required>
                            <option value="" selected disabled hidden>Pilih Tipe Perabotan Rumah</option>
                            @foreach ($houseType as $item)
                                @if (old('subHomeFurnitureId') == $item['id']) 
                                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @else 
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Jumlah Anggota Keluarga</label>
                        <select class="form-control" style="margin-bottom:20px" name="subFamilyMemberId" required>
                            <option value="" selected disabled hidden>Pilih Jumlah Anggota Keluarga</option>
                            @foreach ($familyMember as $item)
                                @if (old('subFamilyMemberId') == $item['id']) 
                                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @else 
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Wilayah</label>
                        <select class="form-control" style="margin-bottom:20px" name="subArea" required>
                            <option value="" selected disabled hidden>Pilih Nama Wilayah</option>
                            @foreach ($area as $item)
                                @if (old('subArea') == $item['name_area']) 
                                <option selected value="{{ $item['name_area'] }}">{{ $item['name_area'] }}</option>
                                @else 
                                <option value="{{ $item['name_area'] }}">{{ $item['name_area'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit" onclick="showOnClick()" class="btn btn-success w-100">Find Home</button>
                    </form>
                </div>
            </div>
            <div class="col">
                @if (!empty(session('property-find-home')))
                    <div class="border border-success">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach (session('property-find-home') as $item)
                                    @if ($loop->first)
                                        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                                    @else
                                        <li data-target="#carouselExampleControls" data-slide-to="{{$loop->iteration - 1}}"></li>
                                    @endif
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                {{-- <img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide"> --}}
                                <!-- CARD -->
                                @foreach (session('property-find-home') as $item)
                                @if ($loop->first)
                                <div class="carousel-item active">
                                @else
                                <div class="carousel-item">
                                @endif
                                    <div id="item-card" style="margin: 0 auto; max-width: 386.667px;" class="item">
                                        <div class="property-wrap ftco-animate" style="margin-bottom: 0">
                                            <img src="{{ asset($item['image']) }}" class="img" style="background-color: gray" alt="property-image">
                                            <div class="text" style="background: rgb(243,243,243);">
                                                <h3 style="font-weight: bolder">
                                                <strong>
                                                    {{ $item['title'] }}
                                                </strong>
                                                </h3>
                                                <span class="location" style="font-size: 90%">{{ $item['address'] }}</span>
                                                <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ $method::priceFormat($item['price']) }}</h2>
                                                <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-bed fa-lg" aria-hidden="true"></i>
                                                    {{-- <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/3030/3030336.png" alt="icon"> --}}
                                                    <h3 class="ml-2">{{ $item['bedRoom'] }} kamar tidur</h3>
                                                </div>
                                                <i class="fa fa-bath fa-lg" aria-hidden="true"></i>
                                                {{-- <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/638/638137.png" alt="icon"> --}}
                                                <span class="d-flex" style="margin-left: 0.5rem">{{ $item['bathRoom'] }} kamar mandi</span>
                                                <a href="#" class="btn d-flex btn-success baddge" style="border-radius: 0%, cursor: context-menu !important">Jual</a>
                                                </div>
                                                <div class="list-team d-flex align-items-center mt-2 border-top">
                                                <a href="{{url('/user/property/'.$item['id'])}}" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev bg-secondary" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg-secondary" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    
                </div>
                @endif
            </div>
        </div>  
    </div>
</section>
@endsection