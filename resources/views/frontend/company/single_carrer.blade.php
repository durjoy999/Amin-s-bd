@extends('layouts.frontend.frontend_app')
@section('frontend_title')
{{ $singleCarrer->title }}
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
                <h1 class="title">Career Details</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-8 col-sm-8 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
                <div class="card text-dark bg-light mb-4 mt-5 widget single-carrer-box-width ">
                    <div class="card-header widget card-style">Recent News</div>
                    <div class="card-body single-carrer-border">
                        <div class="link-animated d-flex flex-column justify-content-start blog-text">
                            @forelse ($blogs as $blog)
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="{{ route('frontend.single.news',$blog->slug) }}"><i class="bi bi-arrow-right me-2"></i>{{ $blog->title }}</a>
                            @empty
                            No Blog Found
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="card text-dark bg-light mb-3 widget single-carrer-box-width">
                    <div class="card-header widget card-style">Job Circular</div>
                    <div class="card-body single-carrer-border">
                        <div class="d-flex justify-content-start">
                            @forelse ($carrers as $carrer)
                            <a href="{{ route('frontend.single.carrer',$carrer->slug) }}">
                                <button class="button single-carrer-tittle"><span>{{ $carrer->title }}</span></button>
                            </a>
                            @empty
                            No Circular Found
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-8 wow slideInRight" data-wow-duration="2s" data-wow-delay="0s">
                <div class="d-flex justify-content-star mt-5">
                    <p>By: {{ $singleCarrer->created_by }}</p>
                    <p class="px-3">{{ \Carbon\Carbon::parse($singleCarrer->created_at)->format('d M Y')}}</p>
                </div>
                <p>
                    {!! $singleCarrer->description !!}
                </p>
            </div>
        </div>
    </div>
    @endsection