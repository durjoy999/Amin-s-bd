@extends('layouts.frontend.frontend_app')
@section('frontend_title')
Track Your Order
@endsection
@section('facilities_active')
active
@endsection
@section('frontend_brudcrumb')
<section class="page-title page-title-11 bg-overlay bg-overlay-dark bg-parallax" id="page-title">
    <div class="bg-section"><img src="{{ asset('frontend_assets/images/braud-cum.jpg') }}" alt="Background" /></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="title">
                    <div class="title-heading">
                        <h1>Track Your Order
                        </h1>
                    </div>
                    <ol class="breadcrumb d-flex">
                        <li class="breadcrumb-item">
                            <a href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            Track Your Order
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('frontend_content')
<section id="service-result" class="mt-2">
    <div class="container">
        <div class="container-fluid px-md-4 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-11 col-lg-10 col-xl-9">
                    <div class="card card0 border-0 shadow">
                        <div class="row">
                            <div class="col-12">
                                {{-- <h4>{{ $all_status->orderShip->order_type }}</h4> --}}
                                <div class="card card00 m-2 border-0">
                                    <div class="row text-center justify-content-center px-3">
                                        <div class="col-lg-12">
                                            <h3 class="pt-3">Track Your Order</h3>
                                            {{-- Shipment Type:<span>@if ($orders->shipping_type == 'shipping')
                                                Shipping
                                                @else
                                                Source & Shipping
                                                @endif
                                            </span> --}}
                                            @if ($invoice_type != 'catonTrack')
                                            <p class="text--center">Order Number:{{ $invoice['invoice_no'] }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex flex-md-row px-3 mt-4 flex-column-reverse">
                                        <div class="col-md-12">
                                            <div class="card1" style="margin-right: 0px; margin-left:0px; border:none; text-center">
                                                @if ($invoice_type != 'catonTrack')
                                                @if ($invoice['type'] == 'shipment')
                                                <h6 class="mb-5">
                                                    @foreach ($status as $single_status)
                                                    @if ($single_status['id'] <= $invoice['status_id']) <i class="fas fa-check-square text-success mr-2"></i> {{ $single_status['shipment_status'] }}
                                                        <br>
                                                        <br>
                                                        @elseif($single_status['id'] > $invoice['status_id'])
                                                        <i class="fas fa-times-circle text-danger mr-2"></i>{{ $single_status['shipment_status'] }}
                                                        <br>
                                                        <br>
                                                        @endif
                                                        @endforeach
                                                </h6>
                                                @else
                                                <h6 class="mb-5">
                                                    @foreach ($status as $single_status)
                                                    @if ($single_status['id'] <= $invoice['status_id']) <i class="fas fa-check-square text-success mr-2"></i> {{ $single_status['source_shipment_status'] }}
                                                        <br>
                                                        <br>
                                                        @elseif($single_status['id'] > $invoice['status_id'])
                                                        <i class="fas fa-times-circle text-danger mr-2"></i>{{ $single_status['source_shipment_status'] }}
                                                        <br>
                                                        <br>
                                                        @endif
                                                        @endforeach
                                                </h6>
                                                @endif
                                                @else
                                                <h2 class="mb-5 text-success text-center">{{ $invoice['status'] }}</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        var current_fs,
            next_fs,
            previous_fs;
        // No BACK button on first screen
        if ($(".show").hasClass("first-screen")) {
            $(".prev").css({'display': 'none'});
        }
        // Next button
        $(".next-button").click(function () {
            current_fs = $(this)
                .parent()
                .parent();
            next_fs = $(this)
                .parent()
                .parent()
                .next();
            $(".prev").css({'display': 'block'});
            $(current_fs).removeClass("show");
            $(next_fs).addClass("show");
            $("#progressbar li")
                .eq($(".card2").index(next_fs))
                .addClass("active");
            current_fs.animate({}, {
                step: function () {
                    current_fs.css({'display': 'none', 'position': 'relative'});
                    next_fs.css({'display': 'block'});
                }
            });
        });
        // Previous button
        $(".prev").click(function () {
            current_fs = $(".show");
            previous_fs = $(".show").prev();
            $(current_fs).removeClass("show");
            $(previous_fs).addClass("show");
            $(".prev").css({'display': 'block'});
            if ($(".show").hasClass("first-screen")) {
                $(".prev").css({'display': 'none'});
            }
            $("#progressbar li")
                .eq($(".card2").index(current_fs))
                .removeClass("active");
            current_fs.animate({}, {
                step: function () {
                    current_fs.css({'display': 'none', 'position': 'relative'});
                    previous_fs.css({'display': 'block'});
                }
            });
        });
    });
</script>
@endsection