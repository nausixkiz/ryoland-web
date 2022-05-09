@extends('layouts.mainLayoutMaster')
@section('title', 'News')

@section('content')
    <div class="ltn__blog-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-list-wrap">
                        @foreach($blogs as $blog)
                            <div class="ltn__blog-item ltn__blog-item-5  @if(!$blog->hasThumbnail()) ltn__blog-item-no-image @endif">
                                @if($blog->hasThumbnail())
                                    <div class="ltn__blog-img">
                                        <a href="{{ route('news.show', $blog->slug) }}">
                                            <img src="{{ $blog->getThumbnailUrl() }}" alt="Image">
                                        </a>
                                    </div>
                                @endif
                                <div class="ltn__blog-brief">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-category">
                                                <a href="{{ route('categories.show', $blog->category->slug) }}">{{ $blog->category->name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="ltn__blog-title"><a href="{{ route('news.show', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li>
                                                <i class="far fa-eye"></i>{{ views($blog)->unique()->count() }} Views
                                            </li>
                                            <li class="ltn__blog-date">
                                                <i class="far fa-calendar-alt"></i>{{ $blog->created_at->diffForHumans() }}
                                            </li>
                                        </ul>
                                    </div>
                                    <p>{{ $blog->description }}</p>
                                    <div class="ltn__blog-meta-btn">
                                        <div class="ltn__blog-meta">
                                            <ul>
                                                <li class="ltn__blog-author">
                                                    <a href="#"><img src="{{ $blog->user->profile_photo_url }}" alt="{{ $blog->user->name }}">By: {{ $blog->user->name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ltn__blog-btn">
                                            <a href="{{ route('news.show', $blog->slug) }}"><i class="fas fa-arrow-right"></i>Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $blogs->links('custom.pagination') }}
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area blog-sidebar ltn__right-sidebar">
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
