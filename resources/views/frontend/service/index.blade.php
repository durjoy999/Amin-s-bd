@extends('layouts.frontend.frontend_app')
@section('service_active')
active
@endsection
@section('frontend_title')
{{ $singleService->title }}
@endsection
@section('frontend_content')
<!-- Header Start -->
<section id="breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="title">Service Details</h1>
      </div>
    </div>
  </div>
</section>
<!-- Header End -->
<div class="container ">
  <div class="d-flex justify-content-center px-5 pb-5">
    {{-- <div class="section-title position-relative pb-3 ">
      <br>
      <h3 style="margin-bottom: 0px;font-size: 16px;text-transform: uppercase; font-weight: 900s;
              padding-left: 6px; color: black;">{{ $singleService->title }}</h3>
    </div> --}}
  </div>
  <div class="row justify-content-center">
    <div class="col-xl-4 col-lg-8 col-sm-8 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
      <div class="card text-dark bg-light mb-3 widget" style="max-width: 20rem;">
        <div class="card-header widget card-style">Our Service</div>
        @forelse ($services as $service)
        <div class="card-body">
          <h5 class="card-title card-titl1">{{ $service->title }}</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <a href="{{ route('frontend.service',$service->slug) }}">
            <button class="button" style="vertical-align:middle;float: right;"><span>Read More</span></button>
          </a>
        </div>
        @empty
        No Service Found
        @endforelse
      </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-sm-8 wow slideInRight" data-wow-duration="2s" data-wow-delay="0s">
      <div class="border-start1 border-5 text-primary  ps-4 mb-5">
        <h6 class="text-body text-uppercase mb-2">service name!</h6>
        <h1 class="display-6 mb-0 section-title position-relative pb-3">
          {{ $singleService->title }}
        </h1>
      </div>
      <p class="mb-5" style="font-size: 20px;">
        {!! $singleService->description !!}
      </p>
    </div>
  </div>
</div>
</div>
@endsection
