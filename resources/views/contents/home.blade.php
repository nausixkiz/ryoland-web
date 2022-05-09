@extends('layouts.mainLayoutMaster')
@section('title', 'Home')

@section('content')
    <div class="ltn__slider-area ltn__slider-6">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <div class="ltn__slide-item--- ltn__slide-item-9 section-bg-1 bg-image" data-bs-bg="{{ asset('images/background/slider-bg.png') }}">
                <div class="ltn__slide-item-inner">
                    <div class="slide-item-info bg-overlay-white-90 text-center">
                        <div class="slide-item-info-inner slide-item-info-line-no  ltn__slide-animation">

                            <div class="slide-item-car-dealer-form">
                                <h3 class="text-color-white--- text-center mb-30">Find Your <span class="ltn__primary-color">Perfect</span> Home</h3>
                                <div class="ltn__car-dealer-form-tab">
                                    <div class="ltn__tab-menu  text-uppercase text-center">
                                        <div class="nav">
                                            <a class="active show" data-bs-toggle="tab" href="#ltn__form_tab_1_1"><i class="fa-solid fa-house"></i> Rent Home</a>
                                            <a data-bs-toggle="tab" href="#ltn__form_tab_1_2" class=""><i class="fa-solid fa-house-day"></i> Sale Home</a>
                                        </div>
                                    </div>
                                    <div class="tab-content pb-10">
                                        <div class="tab-pane fade active show" id="ltn__form_tab_1_1">
                                            <div class="car-dealer-form-inner">
                                                <form action="#" class="ltn__car-dealer-form-box row">
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <select class="nice-select">
                                                            <option>Property Type</option>
                                                           @foreach($categories as $item)
                                                                <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <select class="nice-select">
                                                            <option>Countries</option>
                                                            @foreach($countries as $item)
                                                                <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <select class="nice-select">
                                                            <option value="rent">For Rent</option>
                                                            <option value="sale">For Sale</option>
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <div class="btn-wrapper text-center mt-0">
                                                             <a href="javascript:void(0)" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ltn__form_tab_1_2">
                                            <div class="car-dealer-form-inner">
                                                <form action="#" class="ltn__car-dealer-form-box row">
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <select class="nice-select">
                                                            <option>Property Type</option>
                                                            @foreach($categories as $item)
                                                                <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <select class="nice-select">
                                                            <option>Countries</option>
                                                            @foreach($countries as $item)
                                                                <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item col-lg-12 col-md-12">
                                                        <select class="nice-select">
                                                            <option value="rent">For Rent</option>
                                                            <option value="sale">For Sale</option>
                                                        </select>
                                                    </div>
                                                    <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-12 col-md-12">
                                                        <div class="btn-wrapper text-center mt-0">
                                                            <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                            <a href="javascript:void(0)" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search</a>
                                                        </div>
                                                    </div>
                                                </form>
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
    @if($properties->count() > 0)
        <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">Property</h6>
                            <h1 class="section-title">Latest Listings</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__product-slider-item-three-active slick-arrow-1">
                    @foreach($properties as $item)
                        <div class="col-xl-4 col-sm-6 col-12">
                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                            <div class="product-img">
                                <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                    <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                                </a>
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href=""{{ route('real-estate.properties.show', $item->slug) }}"><img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">For Rent</li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="{{ route('real-estate.properties.show', $item->slug) }}">{{ $item->name }}</a></h2>
                                <div class="product-img-location">
                                    <ul>
                                        <li>
                                            <a href="locations.html"><i class="flaticon-pin"></i> {{ $item->location }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                    <li>
                                        <span><i class="fa-solid fa-bed-empty"></i> {{ $item->number_bedroom }} </span>
                                    </li>
                                    <li><span><i class="fa-solid fa-bath"></i> {{ $item->number_bathroom }} </span>
                                        Bath
                                    </li>
                                    <li><span><i class="fa-solid fa-square"></i> {{ $item->square }} </span>
                                        &#13217;
                                    </li>
                                </ul>
                            </div>
                            <div class="product-info-bottom">
                                <div class="product-price">
                                    <span>{{ currency($item->price) }}<label>/Month</label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="ltn__feature-area section-bg-1--- pt-115 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Our Services</h6>
                        <h1 class="section-title">Our Main Focus</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter---  justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                            <img src="{{ asset('images/icon/buy-a-home.png') }}" alt="Buy A Home">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="javascript:void(0)">Buy a home</a></h3>
                            <p>Find your place with an immersive photo experience and the most listings, including things you won’t find anywhere else.</p>
                            <a class="ltn__service-btn" href="javascript:void(0)">Search Home <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                            <img src="{{ asset('images/icon/sell-a-home.png') }}" alt="Sell A Home">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="javascript:void(0)">Sell a home</a></h3>
                            <p>We’re creating a seamless online experience – from shopping on the largest rental network, to applying, to paying rent.</p>
                            <a class="ltn__service-btn" href="javascript:void(0)">See your options <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                        <div class="ltn__feature-icon">
                            <img src="{{ asset('images/icon/rent-a-home.png') }}" alt="Rent A Home">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="javascript:void(0)">Rent a home</a></h3>
                            <p>No matter what path you take to sell your home, we can help you navigate a successful sale.</p>
                            <a class="ltn__service-btn" href="javascript:void(0)">Find rentals <i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($upComingProjects->count() > 0)
        <div class="ltn__upcoming-project-area section-bg-1--- bg-image-top pt-115 pb-65" data-bs-bg="{{ asset('images/background/upcoming-project-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color--- white-color">Upcoming Projects</h6>
                        <h1 class="section-title  white-color">Dream Living Space <br>
                            Setting New Standards</h1>
                    </div>
                </div>
            </div>

            <div class="row ltn__upcoming-project-slider-1-active slick-arrow-3">
                @foreach($upComingProjects as $item)
                    <div class="col-lg-12">
                        <div class="ltn__upcoming-project-item">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="ltn__upcoming-project-img">
                                        <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-5 section-bg-1">
                                    <div class="ltn__upcoming-project-info ltn__menu-widget">
                                        <h6 class="section-subtitle ltn__secondary-color mb-0">About Projects</h6>
                                        <h1 class="mb-30">{{ $item->name }}</h1>
                                        <ul class="mt">
                                            <li>1. Project Name: <span>{{ $item->name }}</span></li>
                                            <li>2. Building Location: <span>{{ $item->city->name }} City</span></li>
                                            <li>3. Price From: <span>{{ currency($item->price_from) }}</span></li>
                                            <li>4. Price Up To: <span>{{ currency($item->price_to) }}</span></li>
                                        </ul>
                                        <div class="btn-wrapper animated">
                                            <a href="{{ route('real-estate.projects.show', $item->slug) }}" class="theme-btn-1 btn btn-effect-1">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @if($areas->count() > 0)
        <div class="ltn__search-by-place-area before-bg-top bg-image-top--- pt-115 pb-70" data-bs-bg="{{ asset('images/background/1899390.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center---">
                            <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">Area Properties</h6>
                            <h1 class="section-title">Find Your Dream House <br>
                                Search By Area</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__search-by-place-slider-1-active slick-arrow-1">
                    @foreach($areas as $item)
                        <div class="col-lg-4">
                            <div class="ltn__search-by-place-item">
                                <div class="search-by-place-img">
                                    <a href="javascript:void(0)"><img src="{{ $item->getThumbnailUrl() }}" alt="{{ $item->name }}"></a>
                                    <div class="search-by-place-badge">
                                        <ul>
                                            <li>{{ $item->properties->count() }} Properties</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="search-by-place-info">
                                    <h6><a href="javascript:void(0)">{{ $item->name }}</a></h6>
                                    <h4><a href="javascript:void(0)">Mission District Area</a></h4>
                                    <div class="search-by-place-btn">
                                        <a href="javascript:void(0)">View Property <i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if($blogs->count() > 0)
    <div class="ltn__blog-area pt-115--- pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">News & Blogs</h6>
                        <h1 class="section-title">Latest News Feeds</h1>
                    </div>
                </div>
            </div>
            <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                @foreach($blogs as $item)
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="{{ route('news.show', $item->slug) }}"><img src="{{ $item->getThumbnailUrl() }}" alt="{{ $item->name }}"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="javascript:void(0)"><i class="far fa-user"></i>by: {{ $item->user->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="{{ route('news.show', $item->slug) }}">{{ $item->name }}</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{  $item->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="{{ route('news.show', $item->slug) }}">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection
