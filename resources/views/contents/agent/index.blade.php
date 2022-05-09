@extends('layouts.mainLayoutMaster')
@section('title', 'Agents')

@section('content')
    <div class="ltn__team-area pt-110--- pb-90">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($agents as $item)
                    @if($item->properties->count() > 0)
                        <div class="col-lg-4 col-sm-6">
                            <div class="ltn__team-item ltn__team-item-3---">
                                <div class="team-img">
                                    <img src="{{ $item->profile_photo_url }}" alt="{{ $item->name }}">
                                </div>
                                <div class="team-info">
                                    <h4><a href="javascript:void(0)">{{ $item->name }}</a></h4>
                                    <h6 class="ltn__secondary-color">{{ $item->getRoleName() }}</h6>
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                    <p class="text-muted">With {{ $item->properties->count() }} Properties In Our System.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
