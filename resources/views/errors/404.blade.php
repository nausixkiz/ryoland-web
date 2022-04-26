@extends('layouts.mainLayoutMaster')
@section('title', __('Not Found'))

@section('content')
    <div class="ltn__404-area ltn__404-area-1 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-404-inner text-center">
                        <div class="error-img mb-30">
                            <img src="{{ asset('images/error/404.png') }}" alt="{{ __('Not Found') }}">
                        </div>
                        <h1 class="error-404-title d-none">404</h1>
                        <h1>Oops! Looks like something wrong</h1>
                        <p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                        <div class="btn-wrapper">
                            <a href="{{ route('home') }}" class="btn btn-transparent"><i class="fas fa-long-arrow-alt-left"></i> BACK TO HOME</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
