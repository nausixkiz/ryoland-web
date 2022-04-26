<div class="widget ltn__menu-widget ltn__menu-widget-2--- ltn__menu-widget-2-color-2---">
    <h4 class="ltn__widget-title ltn__widget-title-border-2">Top Categories</h4>
    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('real-estate.categories.show', $category->slug) }}">{{ $category->name }} <span>({{ $category->projects()->count() }})</span></a></li>
        @endforeach
    </ul>
</div>
