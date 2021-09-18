@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top:70px;">

        <section class="vh-50 mt-5">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://www.webtricz.com/img/bg/da_img.png" class="img-fluid" alt="Sign image">
                    </div>

                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="divider d-flex align-items-center my-0">
                                <p class="text-center fw-bold mx-3 mb-0"><b>Create New Account</b></p>
                            </div>

                            <!-- Name input -->
                            <div class="form-outline mb-2 row">
                                <label class="form-label font-weight-bold">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-2 row">
                                <label class="form-label font-weight-bold">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-2 row">
                                <label class="form-label font-weight-bold">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <!-- Confirm Password input -->
                            <div class="form-outline mb-2 row">
                                <label class="form-label font-weight-bold">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>

                            <!-- Register -->
                            <div class="text-center text-lg-start mt-4 pt-2 row">
                                <button type="submit" class="btn px-3 text-white"
                                    style="background-color: rgb(171, 52, 235)">
                                    {{ __('Register') }}
                                </button>
                                <p class="small fw-bold mt-2 pt-1 mb-0 ml-4">Already have an account? <a
                                        href="{{ route('login') }}">{{ __('Login') }}</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
