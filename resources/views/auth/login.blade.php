@extends('layouts.frontend.auth.frontend_auth_app')
@section('frontend_auth_content')
    <div class="auth-content my-auto">
        <div class="mt-3 mb-3 text-center">
            <h5 class="mb-0">User Panel</h5>
            <p class="text-muted mb-0">Sign In To Continue</p>
        </div>
        @if (Session::has('login_failed'))
            <div class="alert alert-danger">
                {{ Session::get('login_failed') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
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
            <p class="text-muted mb-0">Don't remember your account ? <a href="{{ route('password.request') }}"
                    class="text-primary fw-semibold"> Forgot Password </a> </p>
        </div>
        <div class="text-center">
            <p class="text-muted mb-0">Don't have an account ? <a href="{{ route('register') }}"
                    class="text-primary fw-semibold"> Register </a> </p>
        </div>
    </div>
@endsection