{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-3" />--}}

{{--        <div class="card-body">--}}
{{--            <form method="POST" action="{{ route('register') }}">--}}
{{--                @csrf--}}

{{--                <div class="mb-3">--}}
{{--                    <x-jet-label value="{{ __('Name') }}" />--}}

{{--                    <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"--}}
{{--                                 :value="old('name')" required autofocus autocomplete="name" />--}}
{{--                    <x-jet-input-error for="name"></x-jet-input-error>--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <x-jet-label value="{{ __('Email') }}" />--}}

{{--                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"--}}
{{--                                 :value="old('email')" required />--}}
{{--                    <x-jet-input-error for="email"></x-jet-input-error>--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <x-jet-label value="{{ __('Password') }}" />--}}

{{--                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"--}}
{{--                                 name="password" required autocomplete="new-password" />--}}
{{--                    <x-jet-input-error for="password"></x-jet-input-error>--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <x-jet-label value="{{ __('Confirm Password') }}" />--}}

{{--                    <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--                </div>--}}

{{--                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                    <div class="mb-3">--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <x-jet-checkbox id="terms" name="terms" />--}}
{{--                            <label class="custom-control-label" for="terms">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',--}}
{{--                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',--}}
{{--                                    ]) !!}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <div class="mb-0">--}}
{{--                    <div class="d-flex justify-content-end align-items-baseline">--}}
{{--                        <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">--}}
{{--                            {{ __('Already registered?') }}--}}
{{--                        </a>--}}

{{--                        <x-jet-button>--}}
{{--                            {{ __('Register') }}--}}
{{--                        </x-jet-button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
@extends('layouts.mainLayoutMaster')
@section('title', 'Register')

@section('content')
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Register <br>Your Account</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                        Sit aliquid,  Non distinctio vel iste.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form method="POST" action="{{ route('register') }}" class="ltn__form-box contact-form-box">
                        @csrf
                        <input @error('name') class="is-invalid" @enderror type="text" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus autocomplete="name">
                        <input @error('email') class="is-invalid" @enderror type="email" name="email" value="{{ old('email') }}" placeholder="Email*">

                        <input @error('password') class="is-invalid" @enderror type="password" name="password" required autocomplete="new-password" placeholder="Password*">
                        <input @error('password_confirmation') class="is-invalid" @enderror type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password*">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="">
                            By clicking "create account", I consent to the privacy policy.
                        </label>
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                        </div>
                    </form>
                    <div class="by-agree text-center">
                        <p>By creating an account, you agree to our:</p>
                        <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p>
                        <div class="go-to-btn mt-50">
                            <a href="{{ route('login') }}">ALREADY HAVE AN ACCOUNT ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
