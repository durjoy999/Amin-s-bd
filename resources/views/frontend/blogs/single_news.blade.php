@extends('layouts.frontend.frontend_app')
@section('news_active')
active
@endsection
@section('frontend_title')
{{ $blog->title }}
@endsection
@section('frontend_content')
<!-- Header Start -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">Details</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<!-- Blog Start -->
<div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <h1 class="mb-4">{{ $blog->title }}</h1>
                    <p>
                        {!! $blog->description !!}
                    </p>
                </div>
                <!-- Blog Detail End -->
            </div>
            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Recent Post Start -->
                <div class="mb-5 wow slideInUp blog-text" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Recent Blogs</h3>
                    </div>
                    @forelse ($blogs as $blog)
                    <div class="d-flex rounded overflow-hidden mb-3 blog-img">
                        <img class="img-fluid" src="{{ asset('photo') }}/{{ $blog->image }}" alt="blog1">
                        <a href="{{ route('frontend.single.news',$blog->id) }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{ $blog->title }}</a>
                    </div>
                    @empty
                    No News Found
                    @endforelse
                </div>
                <!-- Recent Post End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
