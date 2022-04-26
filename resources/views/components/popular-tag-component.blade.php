@if($tags->count() > 0)
    <div class="widget ltn__tagcloud-widget">
        <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Tags</h4>
        <ul>
            @foreach($tags as $tag)
                <li><a href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
