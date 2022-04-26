@if($blogs->count() > 0)
    <div class="widget ltn__popular-post-widget">
        <h4 class="ltn__widget-title ltn__widget-title-border-2">Latest News</h4>
        <ul>
            @foreach($blogs as $blog)
                <li>
                    <div class="popular-post-widget-item clearfix">

                        <div class="popular-post-widget-img">
                            <a href="{{ route('news.show', $blog->slug) }}">
                                <img src="{{ $blog->getThumbnailUrl() }}" alt="{{ $blog->name }}">
                            </a>
                        </div>
                        <div class="popular-post-widget-brief">
                            <h6><a href="{{ route('news.show', $blog->slug) }}">{{ $blog->name }}</a></h6>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date">
                                        <a href="{{ route('news.show', $blog->slug) }}"><em class="far fa-calendar-alt"></em>{{ $blog->created_at->diffForHumans() }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
