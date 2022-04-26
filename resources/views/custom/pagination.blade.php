@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12">
            <div class="ltn__pagination-area text-center">
                <div class="ltn__pagination">
                    <ul>
                        <li>
                            <a href="@if($paginator->onFirstPage()) javascript:void(0) @else {{ $paginator->previousPageUrl() }} @endif">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                        </li>
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                            @endif
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="active" aria-current="page">
                                            <a href="javascript:void(0)">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        <li>
                            <a href="@if (!$paginator->hasMorePages()) javascript:void(0) @else {{ $paginator->nextPageUrl() }} @endif"
                               rel="next" aria-label="@lang('pagination.next')">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
