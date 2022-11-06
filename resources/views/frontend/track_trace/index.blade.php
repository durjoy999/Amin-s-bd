@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Track & Trace
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
                <h1 class="title">Track & Trace</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<!-- Request A Quote Start -->
<div class="container">
    <div class="d-flex justify-content-center p-4">
        <!-- <h3 class="heading-style">Request A Quote</h3> -->
        <div class="section-title position-relative pb-3 ">
            <h3 style="text-transform: uppercase; font-size: 29px; height: 23px; color: black; padding-left: 18px;">TRACK & TRACE</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-8 col-sm-8 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
            <!-- -->
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <!-- <h6 class="text-secondary text-uppercase mb-3" style="font-weight: 600; color: #f06743 !important;">Get A Quote</h6>
                    <h1 class="mb-2" style="font-weight: 700;line-height: 1.2; color: #060315; font-size: 25px;font-family: sans-serif;">TRACK & TRACE</h1> -->
                    <img src="{{ asset('frontend_assets/img/track&trace.jpeg') }}" alt="" style="width:110%; ">
                </div>
                <div class="p-2 bd-highlight">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <div class="p-2">
                                <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 42px; height: 41px;">
                                        <i class="fa fa-phone-alt text-white"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5 class="mb-1">Call </h5>
                                        <h4 class="text-primary mb-0"><a class="text-decoration-none text-dark" href="tel:+8801766766771">+8801766766771</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-12">
                            <div class="ml-auto p-2" style="">
                                <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 42px; height: 41px;">
                                        <i class="fa fa-envelope  text-white"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h5 class="mb-1">E-Mail</h5>
                                        <h4 class="text-primary mb-0"><a class="text-decoration-none text-dark" href="mailto:aminsbdofficial@gmail.com">aminsbdofficial@gmail.com</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-light  my-2" style="height: 120px;">
                        <div class="p-2">
                            <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                                <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width:50px; height: 40px; padding: 15px;">
                                    <i class="fa fa-map-marker-alt  text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="mb-1 ps-1">House #27, Road #09, Sector #11, Uttara, Dhaka - 1230, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-sm-8 ps-5 ps-5_res wow slideInRight" data-wow-duration="2s" data-wow-delay="0s">
            <div class="container-fluid mb-5 wow fadeIn search_background" data-wow-delay="0.1s">
                <div class="container">
                    @if (Session::has('validation_error'))
                        {{ Session::get('validation_error') }}
                    </div>
                    @endif
                    @if (Session::has('order_not_found'))
                    <div class="alert alert-danger">
                        {{ Session::get('order_not_found') }}
                    </div>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <div class="row g-2">
                            <div class="row-md-12">
                                <div class="row g-2">
                                    <div class="row-md-6">
                                        <h5 class="p-2">Shipment Type</h5>
                                        <select class="form-select border-0 py-3" name="type">
                                            <option value="">Select Type</option>
                                            <option value="catonTrack">Tracking Number</option>
                                            <option value="source">Source</option>
                                            <option value="sourceshipment">Source Shipment</option>
                                            <option value="shipment">Shipment</option>
                                        </select>
                                    </div>
                                    <div class="row-md-6">
                                        <h5 class="p-2">Tracking Number</h5>
                                        <input type="text" class="form-control border-0 py-3 " placeholder="Enter Your Tracking Number" style="background: white;" name="order_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row-md-12">
                                <button type="submit" class="btn btn-primary w-100 py-3 " style="margin-top: 47px;">Track Oder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Request A Quoteend -->
@endsection
