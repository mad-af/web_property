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
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">APA YANG KITA TAWARKAN</span>
            <h2 class="mb-2">Properti Unggulan</h2>
        </div>
        </div>
        <div class="row ftco-animate">
        <div class="col-md-12">
            <div class="register-notif" style="position: absolute; z-index:999;">
            <span class="register-text">
                <p>
                Ayo bikin akun untuk melihat lebih lanjut
                </p>
                <a href="#" class="register-button">
                Daftar
                </a>
            </span>
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
            <?php }?>
            </div>
        </div>
        </div>
    </div>
</section>
  
@endsection