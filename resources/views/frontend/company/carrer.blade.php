@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Career
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
                <h1 class="title">Careers</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<div class="container bootstrap snippets bootdeys carrer">
    <div class="d-flex justify-content-center p-4">
        <div class="section-title position-relative pb-3 mb-2">
            <h3 class="title-line9 carrer-tittle"> &nbsp; Careers Pages</h3>
        </div>
    </div>
    <div class="row">
        @forelse ($carrers as $carrer)
        <div class="col-md-4 col-sm-6 content-card">
            <div class="">
                <div class="card card-just-text careers-hover shadow-lg  bg-body rounded" data-background="color" data-color="blue" data-radius="none">
                    <div class="content text-height-control">
                        <p class="carrer-type">{{ $carrer->type }}</p>
                        <h4 class="title"><a href="javascript:void(0)">{{ $carrer->title }}</a></h4>
                        <p class="mb-2 mt-5 description carrer-address"><i class="fa fa-map-marker-alt me-3"></i>House#27, Road#09, &nbsp; Sector#11, Uttara, Dhaka - 1230, Bangladesh</p>
                        <a href="{{ route('frontend.single.carrer',$carrer->slug) }}">
                            <button class="button mt-4 carrer-btn"><span>Read More</span></button>
                        </a>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>
        @empty
        No Career Found
        @endforelse
    </div>
</div>
@endsection
