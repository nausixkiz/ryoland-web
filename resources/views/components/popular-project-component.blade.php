@if($popularProjects->count() > 0)
    <div class="widget ltn__top-rated-product-widget">
        <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Projects</h4>
        <ul>
            @foreach($popularProjects as $item)
                <li>
                    <div class="top-rated-product-item clearfix">
                        <div class="top-rated-product-img">
                            <a href="{{ route('real-estate.projects.show', $item->slug) }}">
                                <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                            </a>
                        </div>
                        <div class="top-rated-product-info">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </ul>
                            </div>
                            <h6><a href="{{ route('real-estate.projects.show', $item->slug) }}">{{ $item->name }} </a></h6>
                            <div class="product-price">
                                <span>From {{ currency($item->price_from) }} to </span>
                                <span>{{ currency($item->price_to) }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
