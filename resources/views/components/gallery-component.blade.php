<div class="ltn__img-slider-area mb-90">
    <div class="container-fluid">
        <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
            @if($gallery->count() > 0)
                @foreach($gallery as $item)
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-4">
                            <a href="{{ $item }}" data-rel="lightcase:myCollection">
                                <img src="{{ $item }}" alt="Gallery">
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
