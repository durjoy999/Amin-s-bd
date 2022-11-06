{{-- @extends('layouts.admin.auth.admin_auth_app') --}}
{{-- @section('admin_auth_content')
    <div class="auth-content my-auto">
        <div class="mt-3 mb-3 text-center">
            <h5 class="mb-0">Admin Panel</h5>
            <p class="text-muted mb-0">Sign In To Continue</p>
        </div>
        @if (Session::has('something_wrong'))
            <div class="alert alert-danger">
                {{ Session::get('something_wrong') }}
            </div>
        @endif
        @if (Session::has('password_reset_time_out'))
            <div class="alert alert-danger">
                {{ Session::get('password_reset_time_out') }}
            </div>
        @endif
        @if (Session::has('login_failed'))
            <div class="alert alert-danger">
                {{ Session::get('login_failed') }}
            </div>route
       @endif
        @if (Session::has('password_updated_success'))
            <div class="alert alert-success">
                {{ Session::get('password_updated_success') }}
            </div>
        @endif
        @if (Session::has('email_password_does_not_match'))
            <div class="alert alert-danger">
                {{ Session::get('email_password_does_not_match') }}
            </div>
        @endif
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="form-floating form-floating-custom mb-2">
                <input type="text" class="form-control" id="input-username" name="email" placeholder="Enter Email" {{ old('email') ? 'checked' : '' }}>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <label for="input-username">Email</label>
                <div class="form-floating-icon">
                <i data-feather="mail"></i>
                </div>
            </div>
            <div class="form-floating form-floating-custom mb-2 auth-pass-inputgroup">
                <input type="password" class="form-control pe-5" id="password-input" name="password" placeholder="Enter Password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                </button>
                <label for="input-password">Password</label>
                <div class="form-floating-icon">
                    <i data-feather="lock"></i>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <div class="form-check font-size-15">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember-check" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label font-size-13" for="remember-check">
                            Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
            </div>
        </form>
        <div class="text-center">
            <p class="text-muted mb-0">Don't remember your account ? <a href="{{ route('admin.resetPassword') }}"
                    class="text-primary fw-semibold"> Forgot Password </a> </p>
        </div>
    </div>
@endsection --}}

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Chinese products import & shipping company - Amin's</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin_assets') }}/images/favicon.png">
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/css/preloader.min.css" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('admin_assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin_assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin_assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body data-topbar="dark">
    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="{{ url('/') }}" class="d-block auth-logo">
                                        <img src="{{ asset('admin_assets')}}/images/logo-dark.png" alt="" height="80"> <span class="logo-txt"></span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <form class="mt-4 pt-2" action="{{route('admin.login.post')}}" method="POST">
                                        @csrf
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="input-username" placeholder="Enter User Name">
                                            <label for="input-username">Email</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control pe-5 @error('password') is-invalid @enderror" id="password-input" placeholder="Enter Password">
                                            <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-check font-size-15">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label font-size-13" for="remember">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check font-size-15">
                                                    <a href="{{ route('admin.resetPassword') }}">Forget Password</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button style="background-color: #f0674c" class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <span>© <script>
                                            document.write(new Date().getFullYear())
                                        </script> ALL RIGHTS RESERVED BY AMIN'S || DEVELOPED BY <i class="fa fa-heart text-danger" aria-hidden="true"></i></span>
                                    <a target="_blank" href="https://birit.xyz">
                                        BIRIT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7 col-0" style="background-color: #f0674c">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        {{-- <div class="bg-overlay"></div> --}}
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin_assets')}}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('admin_assets')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin_assets')}}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('admin_assets')}}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('admin_assets')}}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('admin_assets')}}/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="{{ asset('admin_assets')}}/libs/pace-js/pace.min.js"></script>
    <script src="{{ asset('admin_assets')}}/js/pages/pass-addon.init.js"></script>
    <script src="{{ asset('admin_assets')}}/js/pages/feather-icon.init.js"></script>
</body>
</html>
