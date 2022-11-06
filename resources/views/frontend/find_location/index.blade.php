@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Find A Location
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
                <h1 class="title">Find A location</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<!-- Request A Quote Start -->
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-xl-5 col-lg-8 col-sm-8 col-xxl-6 wow bounceInUp " data-wow-duration="2s" data-wow-delay="0s">
            <h6 class="text-secondary text-uppercase mb-3 find-location-tittle">Contact Us</h6>
            <div class="section-title position-relative pb-3">
                <h3 class="find-location-tittle1">Our location</h3>
            </div>
            <p class="mb-2 pt-3"><i class="fa fa-map-marker-alt me-3"></i>House #27, Road #09, Sector #11, Uttara, Dhaka - 1230, Bangladesh</p>
            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a class="text-decoration-none text-dark" href="tel:+8801766766771">+8801766766771</a></p>
            <p class="mb-2"><i class="fa fa-envelope me-3"></i><a class="text-decoration-none text-dark" href="mailto:aminsbdofficial@gmail.com">aminsbdofficial@gmail.com</a></p>
            <div class="d-flex pt-2 text-danger my-4">
                <a class="btn btn-outline-light btn-social text-danger mx-2 find-location-icon" href="https://www.instagram.com/aminsbdofficial/"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-social text-danger mx-2 find-location-icon" href="https://www.facebook.com/aminsbdofficial"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social text-danger mx-2 find-location-icon" href="https://www.youtube.com/channel/UCeSmmh9M_mY7bn3An6ZFS_w"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-outline-light btn-social text-danger mx-2 find-location-icon" href="https://www.linkedin.com/company/aminsbdofficial/"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="d-flex">
                <div class="p-2">
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded find-location-phone">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask</h5>
                            <h4 class="text-primary mb-0"><a class="text-decoration-none text-dark" href="tel:+8801766766771">+8801766766771</a></h4>
                        </div>
                    </div>
                </div>
                <div class="ml-auto p-2 find-location-margin">
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded find-location-phone">
                            <i class="fa fa-envelope  text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">E-Mail</h5>
                            <h4 class="text-primary mb-0"><a class="text-decoration-none text-dark" href="mailto:aminsbdofficial@gmail.com">aminsbdofficial@gmail.com</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-8 col-sm-8 col-xxl-6 wow slideInRight find-location-404" data-wow-duration="2s" data-wow-delay="0s">
            <div class="responsive-map ">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.328394950974!2d90.39020071429951!3d23.877971089809254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5e7fd527ee3%3A0xd4661c9857506797!2sAmins%20-%20Importing%20%26%20Shipping%20Company%20in%20Bangladesh!5e0!3m2!1sen!2sbd!4v1661161844468!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Request A Quoteend -->
@include('frontend.includes.all_locations')
@endsection