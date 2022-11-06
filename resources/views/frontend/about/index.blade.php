@extends('layouts.frontend.frontend_app')
@section('frontend_title')
About Us
@endsection
@section('company_active')
active
@endsection
@section('frontend_content')
<!-- Header Start -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title"> about us</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
@include('frontend.includes.about')
@include('frontend.includes.why_choose_us')
@include('frontend.includes.testimonial')
@include('frontend.includes.we_are_working_with')
<div class="pt-5"></div>
@include('frontend.includes.our_partners')
@endsection
