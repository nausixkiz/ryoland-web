@if(@isset($breadcrumbs))
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg/14.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $breadcrumbs[count($breadcrumbs)- 1]['name'] }}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            @foreach($breadcrumbs as $breadcrumb)
                                <li>
                                    @if(isset($breadcrumb['url']))
                                        <a href="{{ $breadcrumb['url'] }}">
                                            <span class="ltn__secondary-color">
                                                <i class="{{ $breadcrumb['icon'] }}"></i>
                                            </span> {{ $breadcrumb['name'] }}
                                        </a>
                                    @else
                                        {{ $breadcrumb['name'] }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
