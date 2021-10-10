@extends('userPage/_subLayout')

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
                        <select class="form-control" style="margin-bottom:30px" name="subSalaryId" required>
                            <option value="" selected disabled hidden>Pilih Gaji (Per Bulan)</option>
                            @foreach ($salary as $item)
                                @if (old('subSalaryId') == $item['id']) 
                                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @else 
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select class="form-control" style="margin-bottom:30px" name="subHomeFurnitureId" required>
                            <option value="" selected disabled hidden>Pilih Tipe Perabotan Rumah</option>
                            @foreach ($houseType as $item)
                                @if (old('subHomeFurnitureId') == $item['id']) 
                                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @else 
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select class="form-control" style="margin-bottom:30px" name="subFamilyMemberId" required>
                            <option value="" selected disabled hidden>Pilih Jumlah Anggota Keluarga</option>
                            @foreach ($familyMember as $item)
                                @if (old('subFamilyMemberId') == $item['id']) 
                                <option selected value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @else 
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
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
                    <!-- CARD -->
                    <div id="item-card" style="margin: 0 auto; max-width: 386.667px;" class="item">
                        <div class="property-wrap ftco-animate" style="margin-bottom: 0">
                            <img src="{{ asset(session('property-find-home')['image']) }}" class="img" style="background-color: gray" alt="property-image">
                            <div class="text" style="background: rgb(243,243,243);">
                                <h3 style="font-weight: bolder">
                                <strong>
                                    {{ session('property-find-home')['title'] }}
                                </strong>
                                </h3>
                                <span class="location" style="font-size: 90%">{{ session('property-find-home')['address'] }}</span>
                                <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. {{ session('property-find-home')['price'] }}</h2>
                                <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                                <div class="d-flex align-items-center">
                                    <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/3030/3030336.png" alt="icon">
                                    <h3 class="ml-2">{{ session('property-find-home')['bedRoom'] }} kamar tidur</h3>
                                </div>
                                <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/638/638137.png" alt="icon">
                                <span class="d-flex" style="margin-left: 0.5rem">{{ session('property-find-home')['bathRoom'] }} kamar mandi</span>
                                <a href="#" class="btn d-flex btn-success" style="border-radius: 0%">Jual</a>
                                </div>
                                <div class="list-team d-flex align-items-center mt-2 border-top">
                                <a href="{{url('/user/property/'.session('property-find-home')['id'])}}" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                @endif
            </div>
        </div>  
    </div>
</section>
@endsection