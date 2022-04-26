@extends('layouts.mainLayoutMaster')
@section('title', $property->name)

@push('page-styles')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/leafletjs/leaflet.css')) }}">
@endpush

@section('content')
    <x-gallery-component :gallery="$gallery"/>
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                @if($property->isFeatured())
                                    <li class="ltn__blog-category">
                                        <a href="javascript:void(0)">Featured</a>
                                    </li>
                                @endif
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="#">@if($property->isForRent()) For Rent @else For Sale @endif</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <em class="far fa-calendar-alt"></em> {{ $property->created_at->format('d M Y') }}
                                </li>
                                <li>
                                    <em class="far fa-eye"></em> {{ views($property)->unique()->count() }} Views
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $property->name }}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> {{ $property->location }}</label>
                        <h4 class="title-2">Description</h4>
                        {!! $property->description !!}

                        <h4 class="title-2">Property Detail</h4>
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                            <ul>
                                <li><label>Property ID:</label> <span>RL{{ $property->id }}</span></li>
                                {!! $categoryNameRenderHtml !!}
                            </ul>
                            <ul>
                                <li><label>Square: </label> <span>{{ $property->square }} m²</span></li>
                                <li><label>Baths:</label> <span>{{ $property->number_bathroom }}</span></li>
                                <li><label>Beds:</label> <span>{{ $property->number_bedroom }}</span></li>
                                <li><label>Beds:</label> <span>{{ $property->number_floor }}</span></li>
                                <li><label>Price:</label> <span>{{ currency($property->price )}}</span></li>
                                <li><label>Property Status:</label> <span>@if($property->isForRent()) For Rent @else For Sale @endif</span></li>
                            </ul>
                        </div>

                        <h4 class="title-2">Distance Key Between Facilities</h4>
                        <div class="property-detail-feature-list clearfix mb-45">
                            <ul>
                                @foreach($property->facilities as $facility)
                                    <li>
                                        <div class="property-detail-feature-list-item">
                                        <i class="{{ $facility->icon }}"></i>
                                        <div>
                                            <h6>{{ $facility->name }}</h6>
                                            <small>{{ $facility->pivot->distance }} km</small>
                                        </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                @foreach($property->features as $feature)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="ltn__menu-widget">
                                            <ul>
                                                <li>
                                                    <p class="text-primary text-capitalize">
                                                        <em class="fa-solid fa-check"></em>
                                                        {{ $feature->name }}
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="property-details-google-map mb-60" id="map">
                        </div>

                        <h4 class="title-2">Related Properties</h4>
                        <div class="row">
                            @foreach($relatedProperty as $item)
                                <div class="col-xl-6 col-sm-6 col-12">
                                <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                    <div class="product-img">
                                        <a href="{{ route('real-estate.properties.show', $item->slug) }}"><img src="{{ $property->getThumbnailConversionUrl() }}" alt="{{ $item->name }}"></a>
                                        <div class="real-estate-agent">
                                            <div class="agent-img">
                                                <a href="javascript:void(0)"><img src="{{ Avatar::create($item->user->name) }}" alt="{{ $item->user->name }}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-badge">
                                            <ul>
                                                <li class="sale-badg">For Sale</li>
                                            </ul>
                                        </div>
                                        <h2 class="product-title">
                                            <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                                {{ $item->name }}
                                            </a>
                                        </h2>
                                        <div class="product-img-location">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                                        <i class="flaticon-pin"></i>
                                                        {{ $item->location }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                            <li><span>{{ $item->number_bedroom }} </span>
                                                Bedrooms
                                            </li>
                                            <li><span>{{ $item->number_bathroom }} </span>
                                                Bathrooms
                                            </li>
                                            <li><span>{{ $item->square }} </span>
                                                Ft
                                            </li>
                                        </ul>
                                        <div class="product-hover-action">
                                            <ul>
                                                <li>
                                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                                       data-bs-target="#quick_view_modal">
                                                        <i class="flaticon-expand"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                                       data-bs-target="#liton_wishlist_modal">
                                                        <i class="flaticon-heart-1"></i></a>
                                                </li>
                                                <li>
                                                    <a href="portfolio-details.html" title="Compare">
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
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                        <x-author-component :author="$property->user"></x-author-component>
                        <!-- Search Widget -->
                        <div class="widget ltn__search-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- Form Widget -->
                        <div class="widget ltn__form-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Contact</h4>
                            <form action="#">
                                <input type="text" name="name" placeholder="Your Name*">
                                <input type="text" name="phone" placeholder="Your Phone*">
                                <input type="text" name="email" placeholder="Your e-Mail*">
                                <textarea name="message" placeholder="Write Message..."></textarea>
                                <button type="submit" class="btn theme-btn-1">Send Message</button>
                            </form>
                        </div>
                        <x-popular-project-component></x-popular-project-component>
                        <x-real-estate.category-component :categories="$property->categories"/>
                        <x-popular-property-component></x-popular-property-component>
                        <x-popular-blog-component></x-popular-blog-component>
                        <x-social-component></x-social-component>
                        <x-popular-tag-component></x-popular-tag-component>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="{{ asset(mix('vendors/js/leafletjs/leaflet.js')) }}"></script>
    <script>
        const map = L.map('map').setView([{{ $property->latitude }}, {{ $property->longitude }}], 13);

        const tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmF1c2l4a2l6IiwiYSI6ImNsMmM4OWszZTBtNmMza2xhOXFqdnRpa2kifQ.EqmTKF4GTC1Mrf-JduTpCA', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        const marker = L.marker([{{ $property->latitude }}, {{ $property->longitude }}]).addTo(map);
        marker.bindPopup('').openPopup();
    </script>
@endpush
