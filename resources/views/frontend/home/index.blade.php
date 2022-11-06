@extends('layouts.frontend.frontend_app')
@section('frontend_content')

<!--  BANNER SLIDER  -->
<div class="container-fluid  responsive-banner">
    <div class="banner">
        <div class="row fullwidth ">
            <div class="col-md-12 side-padding">
                <ul class="bannerSlider">
                    @foreach ($sliders as $slider)
                    <li class="slide">
                        <div class="slide__image">
                             <img class="img-fluid" src="{{asset('photo')}}/{{$slider->image}}" alt="{{$slider->image}}">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Search Start -->
<!-- Search Start -->
<div class="container-fluid mb-5 wow fadeIn search_background pt-custom" data-wow-delay="0.1s">
    <div class="container">
        @if (Session::has('validation_error'))
        <div width="100%" class="alert alert-danger">
            {{ Session::get('validation_error') }}
        </div>
        @endif
        @if (Session::has('order_not_found'))
        <div class="alert alert-danger">
            {{ Session::get('order_not_found') }}
        </div>
        @endif
        <form action="{{ route('frontend.track_trace') }}" method="POST">
            @csrf
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="p-2 fs-5">Invoice Type</label>
                            <select class="form-select  border-0 py-3" name="type" required>
                                <option value="">Select Type</option>
                                <option value="catonTrack">Tracking Number</option>
                                <option value="source">Source</option>
                                <option value="sourceshipment">Source Shipment</option>
                                <option value="shipment">Shipment</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="p-2 fs-5">Tracking Number</label>
                            <input type="text" class="form-control border-0 py-3 bg-white" placeholder="Enter Your Tracking Number" required name="order_id">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 py-3 mt-track_oder">Track Oder</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Search end -->
<!-- text Start -->
<div class="container">
    <marquee class="display-5 animated fadeIn mb-4" direction="left" height="100px">
        China,Uk,USA,Dubai,Franch,India, Thailand is now on you hand. Amin's is here to grow your Business
    </marquee>
</div>
<!-- text end -->
<!-- Request A Quote Start -->
<div class="container">
    <div class="d-flex justify-content-center p-4">
        <div class="section-title position-relative pb-3 mb-5">
            <p class="title-line9 fs-3" style="margin-bottom: 0px;padding-left: 18px;">Request A Quote</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-sm-12 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0s">
            <img src="{{ asset('frontend_assets') }}/img/request-a-quote.png" alt="cargoship" style="width:100%; display: block; margin-left: auto; margin-right: auto;">
        </div>
        <div class="col-xl-6 col-lg-12 col-sm-12 wow slideInRight" data-wow-duration="2s" data-wow-delay="0s">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('alert-info'))
                        <div class="alert alert-success">
                            {{ Session::get('alert-info') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row row-with" style="background: #f8f8f8;padding: 31px 0px 0px 0px;">
                    @include('frontend.includes.request_quote')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Request A Quoteend -->

@include('frontend.includes.about')

@include('frontend.includes.why_choose_us')

<!-- Service Start -->
<div class="container-xxl responsive py-5">
    <div class="container py-5 px-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="d-flex justify-content-center p-3">
                <div class="section-title3 position-relative pb-3 ">
                    <p class="text-primary fs-6"> &nbsp;&nbsp;&nbsp;&nbsp;Safe& Punctual Sourcing & Shipping Solution!</p>
                    <h2 class="fs-3"> Managing Sourcing,Shipping & <br> Warehouse Facilities In One Area </h2>
                </div>
            </div>
        </div>
        <div class="row g-4" style="margin-top: 30px;">
            @foreach ($services as $service)
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="{{ asset('photo') }}/{{ $service->image }}" alt="service image">
                    </div>
                    <h3 class="mb-3 fs-5">{{ $service->title }}</h3>
                    <a class="btn-slide mt-2" href="{{ route('frontend.service',$service->slug) }}"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                    {{-- <a href="{{ url('single/blogs') }}/{{ $service->id  }}" class="btn btn-sm btn-primary"><i class="fas fa-eye" ></i></a> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
@include('frontend.includes.we_are_working_with')

<!-- Testimonial Start -->
@include('frontend.includes.testimonial')
<!-- Testimonial End -->
<!-- Blog Start -->
@include('frontend.includes.blog')
<!-- Blog End -->
<!-- working with start -->
{{-- <section id="our-partner" class="smt-100"> --}}
    <div class="container" style="padding-bottom: 80px;">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="d-flex justify-content-center px-5 res-px">
                    <div class="section-title2 position-relative pb-3 mb-5">
                        <p class="fs-3 title-line-4" style="margin-bottom: 0px;font-size: 25px;
                                padding-left: 48px;">Our Concern</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 wow slideInLeft" data-wow-duration="2s" data-wow-delay="0s">
                <div class="partners">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                @forelse ($authorizeds as $authorized)
                                @if( $loop->iteration == 1)
                                <div class="col-1"></div>
                                @endif
                                <div class="col-4 col-lg-2 col-md-3 col-sm-4 mt-3">
                                    <div class="partner-box shadow">
                                        <img src="{{ asset('photo') }}/{{ $authorized->image }}" alt="picture">
                                    </div>
                                </div>
                                @if(($loop->iteration % 5) == 0 && ($loop->iteration != 1))
                                <div class="col-1"></div>
                                <div class="col-1"></div>
                                @endif
                                @empty
                                No Items Found
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
</section> --}}
<!-- working with end -->
<div class="container-fulid">
    <div class="container py-2 ">
        <div class="d-flex justify-content-center px-5 res-px">
            <div class="section-title2 position-relative pb-3 ">
                <p class=" fs-6 text-primary text-uppercase font-weight-bold text-center" style="margin-bottom: 8px;">&nbsp;OUR Another Location</p>
                <p class=" fs-3 title-line4" style="margin-bottom:0px;font-size: 25px;
                    padding-left: 14px;">&nbsp; Contact with us <br> on over the world</p>
            </div>
        </div>
        @include('frontend.includes.all_locations')
    </div>
</div>

<!-- contact Start -->
@include('frontend.includes.contact')
<!-- contact End -->
{{--
    <!---------- OUR PARTNER START ----------> --}}
@include('frontend.includes.our_partners')
{{--
<!---------- OUR PARTNER END ----------> --}}

@endsection
