@extends('layouts.mainLayoutMaster')
@section('title', 'News')

@section('content')
    <div class="ltn__page-details-area ltn__blog-details-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-category">
                                        <a href="{{ route('categories.show', $blog->category->slug) }}">{{ $blog->category->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="ltn__blog-title">{{ $blog->name }}</h2>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><img src="{{ Avatar::create($blog->user->name)->toBase64() }}" alt="{{ $blog->user->name }}">By: {{ $blog->user->name }}</a>
                                    </li>
                                    <li class="ltn__blog-date">
                                        <i class="far fa-calendar-alt"></i>{{ $blog->created_at->diffForHumans() }}
                                    </li>
                                    <li>
                                        <em class="far fa-eye"></em> {{ views($blog)->unique()->count() }} Views
                                    </li>
                                </ul>
                            </div>
                            <p>{!! $blog->contents !!}</p>
                        </div>
                        <!-- blog-tags-social-media -->
                        <div class="ltn__blog-tags-social-media mt-80 row">
                            <div class="ltn__tagcloud-widget col-lg-8">
                                <h4>Related Tags</h4>
                                <ul>
                                    @if($blog->hasRelatedTags())
                                        @foreach($blog->getAllTags() as $tag)
                                            <li><a href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="ltn__social-media text-right text-end col-lg-4">
                                <h4>Social Share</h4>
                                <ul>
                                    {!! SocialShare::page(route('news.show', $blog->slug), $blog->name)->facebook()->twitter()->reddit()->telegram() !!}
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- prev-next-btn -->
                        <div class="ltn__prev-next-btn row mb-50">
                                <div class="blog-prev col-lg-6">
                                    <h6 @if(!$blog->hasPreviousBlog()) class="text-muted" @endif>Prev Post</h6>
                                    @if($blog->hasPreviousBlog())
                                        <h3 class="ltn__blog-title"><a href="{{ route('news.show', $blog->previousBlog()->slug) }}">{{ $blog->previousBlog()->name }}</a></h3>
                                    @endif
                                </div>
                                <div class="blog-prev blog-next text-right text-end col-lg-6">
                                    <h6 @if(!$blog->hasNextBlog()) class="text-muted" @endif>Next Post</h6>
                                    @if($blog->hasNextBlog())
                                        <h3 class="ltn__blog-title"><a href="{{ route('news.show', $blog->nextBlog()->slug) }}">{{ $blog->nextBlog()->name }}</a></h3>
                                    @endif
                                </div>
                        </div>
                        <hr>
                        <!-- related-post -->
                        @if($related_blogs->count() > 0)
                            <div class="related-post-area mb-50">
                                <h4 class="title-2">Related Post</h4>
                                <div class="row">
                                    @foreach($related_blogs as $item)
                                        <div class="col-md-6">
                                        <!-- Blog Item -->
                                        <div class="ltn__blog-item ltn__blog-item-6">
                                            <div class="ltn__blog-img">
                                                <a href="{{ route('news.show', $item) }}"><img src="{{ $item->getThumbnailUrl() }}" alt="{{ $item->name }}"></a>
                                            </div>
                                            <div class="ltn__blog-brief">
                                                <div class="ltn__blog-meta">
                                                    <ul>
                                                        <li class="ltn__blog-date ltn__secondary-color">
                                                            <i class="far fa-calendar-alt"></i>{{ $item->created_at->diffForHumans() }}
                                                        </li>
                                                        <li>
                                                            <em class="far fa-eye"></em> {{ views($blog)->unique()->count() }} Views
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h3 class="ltn__blog-title">
                                                    <a href="{{ route('news.show', $item) }}">{{ $item->name }}</a>
                                                </h3>
                                               {!! $item->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
                        <x-author-component :author="$blog->user"></x-author-component>
{{--                        @include('contents.blog._widget.search')--}}
                        <!-- Form Widget -->
                        <div class="widget ltn__form-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border-2">Drop Message For {{ $blog->user->name }}</h4>
                            <form action="#">
                                <input type="text" name="yourname" placeholder="Your Name*">
                                <input type="text" name="youremail" placeholder="Your e-Mail*">
                                <textarea name="yourmessage" placeholder="Write Message..."></textarea>
                                <button type="submit" class="btn theme-btn-1">Send Message</button>
                            </form>
                        </div>
                        <x-popular-project-component></x-popular-project-component>
                        <x-blog.category-component></x-blog.category-component>
                        <x-popular-property-component></x-popular-property-component>
                        <x-popular-blog-component></x-popular-blog-component>
                        <x-social-component></x-social-component>
                        <x-popular-tag-component></x-popular-tag-component>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@stop
