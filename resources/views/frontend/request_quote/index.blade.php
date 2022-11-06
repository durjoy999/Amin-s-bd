@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Request A Quote
@endsection
@section('facilities_active')
active
@endsection
@section('frontend_content')
<!-- Header Start -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">Request a quote</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<div class="container px-5 res-px-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase mb-4 GetAQuote-tittle">Get A Quote</h6>
                <div class="section-title position-relative pb-3 ">
                    <h1 class="GetAQuote-tittle1">Request A Quote</h1>
                </div>
                <p class="mb-5 GetAQuote-tittle2">What you want just quote it. Our team will replay you soon.</p>
                <div class="row">
                    <div class="col-sm-12 col-xl-6">
                        <div class="p-2">
                            <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                <div class="bg-primary d-flex align-items-center justify-content-center rounded GetAQuote-tittle3">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="mb-1">Call </h5>
                                    <h4 class="text-primary mb-0">+012 345 6789</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="ml-auto p-2" style="">
                            <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                <div class="bg-primary d-flex align-items-center justify-content-center rounded GetAQuote-tittle3">
                                    <i class="fa fa-envelope  text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h5 class="mb-1">E-Mail</h5>
                                    <h4 class="text-primary mb-0">info@gmail.com</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-light  my-2" style="height: 120px;">
                    <div class="p-2">
                        <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded GetAQuote-tittle4">
                                <i class="fa fa-map-marker-alt  text-white"></i>
                            </div>
                            <div class="ps-3">
                                <p class="mb-1 ps-1">House#27, Road#09,
                                    Sector#11, Uttara,
                                      Dhaka - 1230, Bangladesh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('alert-info'))
                        <div class="alert alert-success">
                            {{ Session::get('alert-info') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="bg-light  p-5 wow fadeIn" data-wow-delay="0.5s" style="background-color:#F8F2F0 !important;">
                    @include('frontend.includes.request_quote')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection