@extends('layouts.mainLayoutMaster')
@section('title', 'News')

@section('content')
    <div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="{{ route('news.show', $blog->slug) }}"><img src="{{ $blog->getThumbnailUrl() }}" alt="{{ $blog->name }}"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="javascript:void(0)"><i class="far fa-user"></i> {{ $blog->user->name }}</a>
                                        </li>
                                        <br>
                                        @if($blog->hasRelatedTags())
                                            @foreach($blog->getAllTags() as $tag)
                                                <li class="ltn__blog-tags"><a href="{{ route('tags.show', $tag->slug) }}"><i class="fas fa-tags"></i>{{ $tag->name }}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="{{ route('news.show', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ $blog->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="{{ route('news.show', $blog->slug) }}">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $blogs->links('custom.pagination') }}
        </div>
    </div>
@stop
