@if($popularProperties->count() > 0)
    <div class="widget ltn__popular-product-widget">
        <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Properties</h4>
        <div class="row ltn__popular-product-widget-active slick-arrow-1">
            @foreach($popularProperties as $item)
                <div class="col-12">
                    <div
                        class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                <img src="{{ $item->getThumbnailConversionUrl() }}" alt="{{ $item->name }}">
                            </a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="javascript:void(0)">
                                        <img src="{{ Avatar::create($item->user->name) }}"
                                             alt="{{ $item->user->name }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-price">
                                <span>{{ currency($item->price) }}<label>/Month</label></span>
                            </div>
                            <h2 class="product-title"><a
                                    href="{{ route('real-estate.properties.show', $item->slug) }}">{{ $item->name }}</a>
                            </h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="{{ route('real-estate.properties.show', $item->slug) }}">
                                            <i class="flaticon-pin"></i>
                                            {{ $item->location }}</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span><i class="fa-solid fa-bed-empty"></i> {{ $item->number_bedroom }} </span>
                                </li>
                                <li><span><i class="fa-solid fa-bath"></i> {{ $item->number_bathroom }} </span>
                                </li>
                                <li><span><i class="fa-solid fa-square"></i> {{ $item->square }} </span>
                                    &#13217;
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
