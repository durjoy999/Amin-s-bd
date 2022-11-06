@extends('layouts.frontend.frontend_app')
@section('news_active')
active
@endsection
@section('frontend_title')
News
@endsection
@section('frontend_content')
<!-- Header Start -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">News</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<!-- Blog Start -->
@include('frontend.includes.blog')
<!-- Blog End -->
@endsection
