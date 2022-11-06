@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Shipping Cost Calculator
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
                <h1 class="title">Shipping Cost Calculator</h1>
            </div>
        </div>
    </div>
</section>
<!-- Header End -->
<div class="d-flex justify-content-center px-5">
    <div class="section-title position-relative pb-3 ">
        <br>
        <h3 style="margin-bottom: 0px;font-size: 18px;text-transform: uppercase; font-weight: 900s;
          padding-left: 6px;">shipping cost calcution</h3>
    </div>
</div>
<div class="container-fluid p-0">
    <div class="container p-5">
        <nav>
            <div class="nav nav-tabs bg-light bg-gradient" id="nav-tab" role="tablist">
                <button class="nav-link nav-tap active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    <li class="fas fa-plane"></li>Air
                </button>
                <button class="nav-link nav-tap" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <li class="fas fa-ship "></li>Sea
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container">
                <style>
                  .new1 {
                    color: red;
                    font-size: 17px;
                  }
                  .form-select:focus {
                    border-color: #f06743;
                    box-shadow: 0 0 0 0.25rem rgba(253, 13, 13, 0.25);
                }
              </style>
                    <div class="row py-5 shipping-weith">
                        <form action="{{ route('frontend.air.shipping') }}" method="POST">
                            @csrf
                            <input class="blog_val_id" type="hidden" name="air" value="air">
                            <div class="col-1">
                                <div class="nav nav-pills justify-content-center mb-2 text-center position-res mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-d2d-tab" data-toggle="pill" href="#v-pills-d2d" role="tab" aria-controls="v-pills-d2d" aria-selected="true" style="width: 75px;">D2D
                                    </a>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-12">
                                        @if (Session::has('alert-danger'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('alert-danger') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex ">
                                            <li class="mr-2">
                                                <i class="fas fa-globe-asia" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <select class="form-select form-select-md mb-3 responsive-with " id="country" name="country" aria-label=".form-select-lg example" style="width: 125%; height: 94% !important;">
                                                    <option value="">Select Country </option>
                                                    @foreach ($countries as $country )
                                                    <option class="new1"  value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                    <i class="fas fa-angle-down"></i>
                                                </select>
                                                @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex ">
                                            <li class="mr-2">
                                                <i class="fas fa-home" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <input type="text" readonly class="form-control responsive-with" id="inputPassword" placeholder="Dhaka, Bangladesh" style="width: 120%; height: 51px;" value="Dhaka, Bangladesh">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex">
                                            <li class="mr-2">
                                                <i class="fas fa-weight" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <input type="number" class="form-control responsive-with" placeholder="Enter Weight(KG)" style="width: 120%; height: 51px;" name="weight">
                                                @error('weight')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex ">
                                            <li class="mr-2">
                                                <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <select class="form-select form-select-md mb-3  responsive-with" id="country" name="product" aria-label=".form-select-lg example" style="width: 125%; height: 90% !important;">
                                                    <option value="">select product </option>
                                                    @foreach ($products as $product)
                                                    <option class="new1" value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                    <i class="fas fa-angle-down"></i>
                                                </select>
                                                @error('product')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center py-5 shipping_btn_res ">
                                <button type="submit" class="btn btn-primary px-3 px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container">
                    <div class="row py-5 shipping-weith">
                        <form action="{{ route('frontend.air.shipping') }}" method="POST">
                            @csrf
                            <input class="blog_val_id" type="hidden" name="air" value="sea">
                            <div class="col-1">
                                <div class="nav nav-pills justify-content-center mb-2 text-center position-res mb-4" id="v-pills-tab " role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-d2d-tab" data-toggle="pill" href="#v-pills-d2d" role="tab" aria-controls="v-pills-d2d" aria-selected="true" style="width: 75px;">D2D
                                    </a>
                                </div>
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-12">
                                        @if (Session::has('alert-danger'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('alert-danger') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex ">
                                            <li class="mr-2">
                                                <i class="fas fa-globe-asia" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                 <select class="form-select form-select-md mb-3  responsive-with" id="country" name="country" aria-label=".form-select-lg example" style="width: 125%; height: 94% !important;">
                                                    <option value="">Select Country </option>
                                                    @foreach ($countries as $country )
                                                    <option class="new1" value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                    <i class="fas fa-angle-down"></i>
                                                </select>
                                                @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex ">
                                            <li class="mr-2">
                                                <i class="fas fa-home" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <input type="text" readonly class="form-control responsive-with" id="inputPassword" placeholder="Dhaka, Bangladesh" style="width: 120%; height: 51px;" value="Dhaka, Bangladesh">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex">
                                            <li class="mr-2">
                                                <i class="fas fa-weight" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <input type="number" class="form-control responsive-with" placeholder="Enter Weight(KG)" style="width: 120%; height: 51px;" name="weight">
                                                @error('weight')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-3">
                                        <ul class="d-flex ">
                                            <li class="mr-2">
                                                <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <select class="form-select form-select-md mb-3  responsive-with" id="product" name="product" aria-label=".form-select-lg example" style="width: 125%; height: 94% !important;">
                                                    <option value="">select product </option>
                                                    @foreach ($products as $product)
                                                    <option class="new1" value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                    <i class="fas fa-angle-down"></i>
                                                </select>
                                                @error('product')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center py-5 ">
                                    <button type="submit" class="btn btn-primary px-3 px-5">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div style="padding-bottom: 500px;"></div> -->
<!-- Contact Start -->
<div class="container-xxl py-5 resposive" id="contact" style="background: #f8f8f8;padding: 200px;">
    <div class="container py-5">
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-6 col-sm-6">
                <h1 class="display-5 mb-0 heading-style"> Contact Us</h1>
            </div>
            <div class="col-6 col-sm-6 text-lg-end">
                <a class="btn btn-primary py-3 px-5" href="javascript:void(0)">Say Hello</a>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-12">
                @if (Session::has('message_submit_successfully'))
                <div class="alert alert-success">
                    {{ Session::get('message_submit_successfully') }}
                </div>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required name="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="phone" class="form-control" id="phone" placeholder="Your Phone" required name="phone">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="phone">Your Phone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="address" placeholder="Enter Address" required name="address">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px" required name="message"></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-5 res" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
