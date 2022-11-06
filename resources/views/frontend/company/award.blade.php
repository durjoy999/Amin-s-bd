@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Awards
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
                <h1 class="title">Awards Recognition</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<div class="container pt-4">
    <div class="d-flex justify-content-center p-3 ">
        <div class="section-title2 position-relative pb-3 ">
            <h6 class="text-primary">&nbsp; Safe& Punctual Sourcing & Shipping Solution!</h6>
            <h3 class="award-title">We Are Authorized Of Some <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Well Known Company </h3>
        </div>
    </div>
    <div class="row px-5">
        @forelse ($awards as $award)
        <div class="col-sm-4 col-lg-6 col-xl-4 col-xxl-4 py-3">
            <div class="card awards-body">
                <img src="{{ asset('photo') }}/{{ $award->image }}" class="card-img-top award-img" alt="award">
                <div class="card-body award-background">
                    <h5 class="card-title text-center">{{ $award->title }}</h5>
                    <p class="card-text text-primary">{!! $award->description !!}</p>
                </div>
            </div>
        </div>
        @empty
        No Award Found
        @endforelse
    </div>
</div>
@endsection
