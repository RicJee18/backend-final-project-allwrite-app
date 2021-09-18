@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:70px;">

        <section class="vh-50 mt-5">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://www.webtricz.com/img/bg/da_img.png " class="img-fluid" alt="Sample image">
                    </div>

                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div
                                class="d-flex row flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 mr-3">Sign in with</p>
                                <button type="button" class="btn btn-floating mx-1 rounded-circle text-white"
                                    style="background-color: rgb(171, 52, 235)">
                                    <i class="fa fa-facebook"></i>
                                </button>

                                <button type="button" class="btn  btn-floating mx-1 rounded-circle text-white"
                                    style="background-color: rgb(171, 52, 235)">
                                    <i class="fa fa-twitter"></i>
                                </button>

                                <button type="button" class="btn  btn-floating mx-1 rounded-circle text-white"
                                    style="background-color: rgb(171, 52, 235)">
                                    <i class="fa fa-linkedin"></i>
                                </button>
                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0">Or</p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-2 row">
                                <label class="form-label font-weight-bold"
                                    for="form3Example3">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-2 row">
                                <label class="form-label font-weight-bold"
                                    for="form3Example4">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="d-flex justify-content-between align-items-center row">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2 row">

                                <button type="submit" class="btn px-3 text-white"
                                    style="background-color: rgb(171, 52, 235)">
                                    {{ __('Login') }}
                                </button>
                                <p class="small fw-bold mt-2 pt-1 mb-0 ml-4">Don't have an account? <a
                                        href="{{ route('register') }}">{{ __('Register') }}</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
