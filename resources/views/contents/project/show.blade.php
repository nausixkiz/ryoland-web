@extends('layouts.mainLayoutMaster')
@section('title', $project->name)

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
                                @if($project->isFeatured())
                                    <li class="ltn__blog-category">
                                        <a href="javascript:void(0)">Featured</a>
                                    </li>
                                @endif
                                <li class="ltn__blog-category">
                                    <a class="bg-orange" href="javascript:void(0)">{{ $project->status }}</a>
                                </li>
                                <li class="ltn__blog-date">
                                    <em class="far fa-calendar-alt"></em> {{ $project->created_at->format('d M Y') }}
                                </li>
                                <li>
                                    <em class="far fa-eye"></em> {{ views($project)->unique()->count() }} Views
                                </li>
                            </ul>
                        </div>
                        <h1>{{ $project->name }}</h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> {{ $project->location }}</label>
                        <h4 class="title-2">Description</h4>
                        {!! $project->description !!}
                        <h4 class="title-2">Property Detail</h4>
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">
                            <ul>
                                <li><label>Project ID:</label> <span>RLP-{{$project->id}}</span></li>
                                <li><label>Number Of Blocks: </label> <span>{{ $project->number_block }}</span></li>
                                <li><label>Price From:</label> <span>{{ currency($project->price_from) }}</span></li>
                                <li><label>Open Sell Date:</label> <span>{{ $project->date_sell }}</span></li>
                            </ul>
                            <ul>
                                <li><label>Number Of Floors:</label> <span>{{ $project->number_floor }}</span></li>
                                <li><label>Number Of Flats:</label> <span>{{ $project->number_flat }}</span></li>
                                <li><label>Price Up To:</label> <span>{{ currency($project->price_to) }}</span></li>
                                <li><label>Finish date:</label> <span>{{ $project->date_finish }}</span></li>
                                <li><label>Property Status:</label> <span class="text-capitalize">{{ $project->status }}</span></li>
                            </ul>
                        </div>

                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                @foreach($project->features as $feature)
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
                        @if($relatedProject->count() > 0)
                            <h4 class="title-2">Related Projects</h4>
                            <div class="row">
                                @foreach($relatedProject as $item)
                                    <div class="col-xl-6 col-sm-6 col-12">
                                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                        <div class="product-img">
                                            <a href="{{ route('real-estate.projects.show', $item->slug) }}">
                                                <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                                            </a>
                                            <div class="real-estate-agent">
                                                <div class="agent-img">
                                                    <a href="{{ route('real-estate.projects.show', $item->slug) }}"><img src="{{ Avatar::create($item->user->name) }}" alt="{{ $item->user->name }}"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="{{ route('real-estate.projects.show', $item->slug) }}">{{ $item->name }}</a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('real-estate.projects.show', $item->slug) }}"><i class="flaticon-pin"></i> {{ $item->location }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <li><span>{{ $item->number_block }} </span>
                                                    Blocks
                                                </li>
                                                <li><span>{{ $item->number_floor }} </span>
                                                    Floors
                                                </li>
                                                <li><span>{{ $item->number_flat }} </span>
                                                    Flats
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
                        <x-author-component :author="$project->user"></x-author-component>
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
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Send Contact To {{ $project->user->name }}</h4>
                            <form action="#">
                                <input type="text" name="yourname" placeholder="Your Name*">
                                <input type="text" name="youremail" placeholder="Your e-Mail*">
                                <textarea name="yourmessage" placeholder="Write Message..."></textarea>
                                <button type="submit" class="btn theme-btn-1">Send Messege</button>
                            </form>
                        </div>
                        <x-popular-project-component></x-popular-project-component>
                        <x-real-estate.category-component :categories="$project->categories"></x-real-estate.category-component>
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
        const map = L.map('map').setView([{{ $project->latitude }}, {{ $project->longitude }}], 13);

        const tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmF1c2l4a2l6IiwiYSI6ImNsMmM4OWszZTBtNmMza2xhOXFqdnRpa2kifQ.EqmTKF4GTC1Mrf-JduTpCA', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        const marker = L.marker([{{ $project->latitude }}, {{ $project->longitude }}]).addTo(map);
        marker.bindPopup('{{ $project->name }}').openPopup();
    </script>
@endpush
