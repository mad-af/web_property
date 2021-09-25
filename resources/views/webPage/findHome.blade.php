@extends('webPage/_subLayout')

@section('title')
Find Home
@endsection

@section('contents')
<div class="row" >
    <div class="col" style="margin-bottom: 8%; margin-top: 8%; margin-left: 8%;">
        <div class="form-group" style="margin-left:8%; margin-right: 12%">
            <select class="form-control" style="margin-bottom:30px" name="gaji" id="">
                <option value="0">Pilih Gaji (Per Bulan)</option>
            </select>
            <select class="form-control" style="margin-bottom:30px" name="perabot" id="">
                <option value="0">Pilih Tipe Perabotan Rumah</option>
            </select>
            <select class="form-control" style="margin-bottom:30px" name="gaji" id="">
                <option value="0">Pilih Jumlah Anggota Keluarga</option>
            </select>
            {{-- <a onclick="showOnClick" class="btn btn-success" style="width: 100%">Find Home</a> --}}
            <button onclick="showOnClick()" class="btn btn-success" style="width: 100%">Find Home</button>
        </div>
    </div>
    <div class="col" style="margin-left: 0; margin-right: 2%; box-sizing: content-box; margin-top: 1.2%; margin-bottom: 1.2%;">
        <div style="border: solid green; max-height: 553.164px; height: 100%; width: 100%; ">
            
            {{-- Card --}}
            <div id="item-card" style="margin: 0 auto; max-width: 386.667px; display: none" class="item">
                <div class="property-wrap ftco-animate" style="margin-bottom: 0">
                    <a href="#" class="img" style="background-color: gray">
                    </a>
                    <div class="text" style="background: rgb(243,243,243);">
                        <h3 style="font-weight: bolder">
                        <strong>
                            Cluster Balmoral B3 No.73
                        </strong>
                        </h3>
                        <span class="location" style="font-size: 90%">Surabaya, Jawa Timur</span>
                        <h2 class="mb-2" style="text-align: center; font-weight: bolder">Rp. 3 Miliar</h2>
                        <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
                        <div class="d-flex align-items-center">
                            <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/3030/3030336.png">
                            <h3 class="ml-2">3 kamar tidur</h3>
                        </div>
                        <img style="max-width: 25px; max-height: 25px" src="https://cdn-icons-png.flaticon.com/512/638/638137.png" alt="">
                        <span class="d-flex" style="margin-left: 0.5rem">3 kamar mandi</span>
                        <a href="#" class="btn d-flex btn-success" style="border-radius: 0%">Jual</a>
                        </div>
                        <div class="list-team d-flex align-items-center mt-2 border-top">
                        <a href="#" class="btn pt-md-2 pb-md-2" style="width: 100%; border-radius: 0; background-color: rgb(234,234,234); margin-top: 15px">Detail</a>
                        </div>
                    </div>
                </div>
            </div> 
            
        </div>
    </div>
</div>
<script>
    const showOnClick = () => {
        document.getElementById('item-card').style.display = "block";
    }
</script>
@endsection