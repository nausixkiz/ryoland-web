@extends('layouts.mainLayoutMaster')
@section('title', 'Login')

@section('content')
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Sign In <br>To Your Account</h1>
                        <p>Sign in or join another way.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">

                        <form class="ltn__form-box contact-form-box" method="POST" action="{{ route('login') }}">
                            @csrf
                            <input @error('email') class="form-control is-invalid mb-0" @enderror type="email"
                                   name="email"
                                   value="{{old('email')}}" placeholder="{{ __('Email Address') }}" required
                                   autocomplete="email" autofocus>
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input @error('password') class="form-control is-invalid b-0" @enderror type="password"
                                   name="password" placeholder="{{ __('Password') }}" required
                                   autocomplete="current-password">
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <input class="form-check-input mb-20" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                            <div class="help-block text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <div class="btn-wrapper mt-3">
                                <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="go-to-btn mt-20">
                                    <a href="{{ route('password.request') }}" title="Forgot Your Password?"
                                       data-bs-toggle="modal"
                                       data-bs-target="#ltn_forgot_password_modal"><small> {{ __('FORGOT YOUR PASSWORD?') }}</small></a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                @if(Route::has('register'))
                    <div class="col-lg-6">
                        <div class="account-create text-center pt-50">
                            <h4>DON'T HAVE AN ACCOUNT?</h4>
                            <p>Add items to your wishlist and get personalised recommendations <br>
                                check out more quickly track your orders register</p>
                            <div class="btn-wrapper">
                                <a href="{{ route('register') }}" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if (Route::has('password.request'))
        <div class="ltn__modal-area ltn__add-to-cart-modal-area----">
            <div class="modal fade" id="ltn_forgot_password_modal" tabindex="-1">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="modal-product-info text-center">
                                                <h4>FORGET PASSWORD?</h4>
                                                <p class="added-cart"> Enter you register email.</p>
                                                <form action="#" class="ltn__form-box">
                                                    <input type="text" name="email"
                                                           placeholder="Type your register email*">
                                                    <div class="btn-wrapper mt-0">
                                                        <button class="theme-btn-1 btn btn-full-width-2" type="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br>
                                                    Use discount code at checkout</p>
                                                <div class="payment-method">
                                                    <img src="img/icons/payment.png" alt="#">
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
    @endif
@stop
