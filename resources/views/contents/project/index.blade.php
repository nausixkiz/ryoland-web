@extends('layouts.mainLayoutMaster')
@section('title', 'Projects')

@section('content')
    <div class="ltn__product-area ltn__product-gutter mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach($projects as $item)
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                            <div class="product-img">
                                                <a href="{{ route('real-estate.projects.show', $item->slug) }}">
                                                    <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                                                </a>
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="javascript:void(0)"><img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badg text-uppercase">{{ $item->status }}</li>
                                                    </ul>
                                                </div>
                                                <h2 class="product-title"><a href="{{ route('real-estate.projects.show', $item->slug) }}"> {{ $item->name }}</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> {{ $item->location }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach($projects as $item)
                                        <div class="col-lg-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="{{ route('real-estate.projects.show', $item->slug) }}">
                                                    <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg text-uppercase">{{ $item->status }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="{{ route('real-estate.projects.show', $item->slug) }}"> {{ $item->name }}</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> {{ $item->location }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="javascript:void(0)"><img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="team-details.html">{{ $item->user->name }}</a></h6>
                                                        <small>{{ $item->user->getRoleName() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ltn__pagination-area text-center">
                       {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
