@extends('layouts.mainLayoutMaster')
@section('title', 'Properties')

@push('page-styles')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/leafletjs/leaflet.css')) }}">
@endpush

@section('content')
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-start">
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="d-none">
                                <div class="showing-product-number text-right">
                                    <span>Showing 1–12 of 18 results</span>
                                </div>
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default Sorting</option>
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

                                    @foreach($properties as $item)
                                        <div class="col-xl-6 col-sm-6 col-12">
                                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                                <div class="product-img">
                                                    <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                                        <img src="{{  $item->getThumbnailConversionUrl() }}" alt="{{  $item->name }}">
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
                                                            <li class="sale-badg">@if($item->status == 'rent') For Rent @else For Sell @endif</li>
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
                                                        <li>
                                                            <span><i class="fa-solid fa-bath"></i> {{ $item->number_bathroom }} </span>
                                                        </li>
                                                        <li>
                                                            <span><i class="fa-solid fa-square"></i> {{ $item->square }} </span>
                                                            &#13217;
                                                        </li>
                                                    </ul>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                                    <i class="flaticon-expand"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                    <i class="flaticon-heart-1"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('real-estate.properties.show', $item->slug) }}" title="{{ $item->name }} Detail">
                                                                    <i class="flaticon-add"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
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
                                    @foreach($properties as $item)
                                        <div class="col-lg-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                            <div class="product-img">
                                                <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                                    <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge-price">
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badg">@if($item->status == 'rent') For Rent @else For Sell @endif</li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>{{ currency($item->price) }}<label>/Month</label></span>
                                                    </div>
                                                </div>
                                                <h2 class="product-title"><a href="{{ route('real-estate.properties.show', $item->slug) }}">{{ $item->name }}</a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html">
                                                                <i class="flaticon-pin"></i> {{ $item->location }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <li>
                                                        <span><i class="fa-solid fa-bed-empty"></i> {{ $item->number_bedroom }} </span>
                                                    </li>
                                                    <li><span><i class="fa-solid fa-bath"></i> {{ $item->number_bathroom }} </span>
                                                    </li>
                                                    <li><span><i class="fa-solid fa-square"></i> {{ $item->square }} </span>
                                                        &#13217;
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="real-estate-agent">
                                                    <div class="agent-img">
                                                        <a href="javascript:void(0)"><img src="{{ $item->user->profile_photo_url }}" alt="{{ $item->user->name }}"></a>
                                                    </div>
                                                    <div class="agent-brief">
                                                        <h6><a href="javascript:void(0)">{{ $item->user->name }}</a></h6>
                                                        <small>{{ $item->user->getRoleName() }}</small>
                                                    </div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                                <i class="flaticon-expand"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                <i class="flaticon-heart-1"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('real-estate.properties.show', $item->slug) }}" title="{{ $item->name }} Details">
                                                                <i class="flaticon-add"></i>
                                                            </a>
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
                    </div>
                    {{ $properties->links() }}
                </div>

                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Advance Information</h3>
                        <label class="mb-30"><small>About {{ $properties->count() }} results (0.62 seconds) </small></label>
                        <div class="widget" id="map" style="position:relative;width:100%;min-width:290px;height:1000px;">
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@stop

@push('page-scripts')
    <script src="{{ asset(mix('vendors/js/leafletjs/leaflet.js')) }}"></script>
    <script>
        const map = L.map('map').setView([42.621994, -75.219623], 10);

        const tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmF1c2l4a2l6IiwiYSI6ImNsMmM4OWszZTBtNmMza2xhOXFqdnRpa2kifQ.EqmTKF4GTC1Mrf-JduTpCA', {
            maxZoom: 10,
            zoom: 4,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        {!! $mapScriptMarkerRender !!}
    </script>
@endpush
