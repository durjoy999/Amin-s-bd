
<!DOCTYPE html>
<html lang="en" class="ju">
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W5C2PPP');
    </script>
    <!-- End Google Tag Manager -->
    <!--FACEBOOK VARIFICATION START-->
    <meta name="facebook-domain-verification" content="xk0iv93vm6tu2ol7j92w8sxny4kfqa" />
    <!--FACEBOOK VARIFICATION END-->
    <meta charset="utf-8">
    <title>@yield('frontend_title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('photo/settings/general') }}/{{ generalSettings()->favicon }}">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend_assets') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('frontend_assets') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend_assets') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend_assets') }}/css/slick.css" rel="stylesheet">
    
    {{-- {!! htmlScriptTagJsApi([]) !!} --}}
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5C2PPP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4 juwell">
                <a href="" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img src="{{ asset('frontend_assets') }}/img/logo.png" alt="" style="width: 100%;">
                    </div>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto ">
                        <a href="{{route ('frontend.homee')}}" class="nav-item nav-link @yield('home_active')">Home</a>
                        <div class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle @yield('company_active')" data-bs-toggle="dropdown">Company</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('frontend.about') }}" class="dropdown-item">About Us</a>
                                <a href="{{ route('frontend.award') }}" class="dropdown-item">Awards & Recognition</a>
                                <a href="{{ route('frontend.carrer') }}" class="dropdown-item">Careers</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link dropdown-toggle @yield('service_active')"> Services </a>
                            <div class="dropdown-menu rounded-0 m-0">
                                @foreach (services() as $service)
                                <a href="{{ route('frontend.service',$service->slug) }}" class="dropdown-item">{{ $service->title }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle @yield('facilities_active')" data-bs-toggle="dropdown">Facilities</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('frontend.calculator.index') }}" class="dropdown-item">Shipping Cost Calculator</a>
                                <a href="{{ route('frontend.equest.quote') }}" class="dropdown-item">Request A Quote</a>
                                <a href="{{ route('frontend.track.shipment') }}" class="dropdown-item">Track & Trace</a>
                                <a href="{{ route('frontend.find.location') }}" class="dropdown-item">Find A location</a>
                            </div>
                        </div>
                        <a href="{{ route('frontend.blogs') }}" class="nav-item nav-link @yield('news_active')">news</a>
                        <a href="{{ route('frontend.contact') }}" class="nav-item nav-link @yield('contact_active')">Contact</a>
                    </div>
                    <div class="module-contact">
                        <a href="{{ route('frontend.calculator.index') }}" class="btn btn-primary px-3 d-none d-lg-flex" style="margin-right:5px ;">Shipping Cost</a>
                        <a href="{{ route('login') }}" target="_blank" class="btn btn-primary px-3 d-none d-lg-flex">sign in</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
        @yield('frontend_content')
        <!-- Footer Start -->
        <div class="container-fluid bg-light text-white-50 footer mt-5 wow fadeIn futer-de" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!-- <h5 class="text-white mb-4">Get In Touch</h5> -->
                        <div class="box-futter">
                            <img src="{{ asset('frontend_assets') }}/img/logo.png" alt="aminslogo" style="width: 100%;">
                        </div>
                        <p class="text-dark" style="font-size: 13px;line-height: 25px;">Amin's is an import & trading company of Bangladesh. We especially import our goods from China, KSA & India. In China we have our own warehouse in Guangzhou & Shanghai.</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/aminsbdofficial/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/aminsbdofficial" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UCeSmmh9M_mY7bn3An6ZFS_w" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/company/aminsbdofficial/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="box-img-futter pt-3">
                            <img src="https://images.dmca.com/Badges/dmca-badge-w150-5x1-06.png?ID=8cac94fb-c6a8-4c9f-abe0-656755f70beb" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <p class=" fs-4 text-dark fw-bold mb-4 fs-5">Quick Links</p>
                        <div class="opacity-50">
                            @foreach (services() as $service)
                            <a class="btn btn-link text-dark" href="{{ route('frontend.service',$service->slug) }}">{{ $service->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <p class=" fs-4 text-dark fw-bold mb-4">Quick Contact</p>
                        <P class="text-dark" style="font-size: 13px;">If you have any questions or need help, feel free to contact with our team.</P>
                        <p class="mb-0"><i class="fa fa-phone-alt me-3 fotter-number"></i><a class="fw-bold text-dark fotter-address" href="tel:+8801766766771">+8801766766771</a></p>
                        <p class="mb-0"><i class="fa fa-phone-alt me-3 fotter-number"></i><a class="fw-bold text-dark fotter-address" href="tel:+8613270506530">+8613270506530</a></p>
                        <p class="mb-0"><i class="fa fa-phone-alt me-3 fotter-number"></i><a class="fw-bold text-dark fotter-address" href="https://wa.me/+8801766766771">+8801766766771</a></p>
                        <p class="mb-2 pt-2 text-dark fotter-address1"><i class="fa fa-map-marker-alt me-3 fotter-address3"></i>House #27, Road #09, Sector #11, Uttara, Dhaka - 1230, Bangladesh</p>
                        <p class="fs-5 fw-bold pt-4 text-dark">Total Hit Counter : {{ hitCounter()->hit_counters }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <p class=" fs-4 text-dark fw-bold mb-4">Connect With Us</p>
                        <iframe class="fotter-iframe" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faminsbdofficial&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=true&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=true&amp;appId" height="200" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="position-relative">
                            <div class="position-absolute top-50 start-50 translate-middle pt-2">
                                <p class="text-dark" style="font-size: 13px;">&copy;&nbsp;2022 ALL RIGHTS RESERVED BY AMIN'S || DEVELOPED BY<a class="fs-5" href="https://birit.com.bd/" style="color: var(--primary) !important;text-decoration: none;">&nbsp;&nbsp;<img src="{{ asset('frontend_assets') }}/img/love.png" alt="love" style="width: 22px;">&nbsp;BIR it</a></P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {!! GoogleReCaptchaV3::init() !!} --}}
        </div>
        <!-- Footer End -->
        <!-- Back to Top -->
        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontend_assets') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend_assets/lib/owlcarousel/owl.carousel.js') }}"></script>
    @yield('frontend_js_link')
    <!-- Template Javascript -->
    <script src="{{ asset('frontend_assets') }}/js/main.js">
    </script>
    @yield('frontend_js')
    {{-- {!! GoogleReCaptchaV3::init() !!} --}}

</body>

</html>
