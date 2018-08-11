@extends('frontend.layout')
@section('content')
<!-- populer highlight -->
<div class="get-offer-ride">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 highlight-get-popular padding-left-o padding-right-o">
                <h3 class="get-popular-list">Search result</h3>
                <h3 class="highlight">{{ date('l',strtotime($time)) }}, {{ date('d F Y',strtotime($time)) }}</h3>
            </div>
            <!-- search result page -->
            <div class="single-popular-item">
                <div class="col-md-10 col-md-offset-1 col-sm-12 popular-departure col-xs-12 padding-left-o">
                    @if(isset($data->error))
                        <h3 class="highlight">{{ $data->error }}</h3>
                    @else
                    @foreach($data as $d)
                    <div class="get-single-departure clearfix">
                        <div class="col-sm-5">
                            <div class="get-user-icon">
                                <img src="<?php if(isset($d->usd->picture)){echo asset('public/uploads/drivers/'.$d->usd->picture);}?>" alt="">
                            </div>
                            <div class="get-user-details">
                                <h3 class="get-user-name"><span>Name <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">{{ $d->user->name }}</span></h3>
                                <h3 class="get-user-name"><span>Age <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">{{ date('Y') - date('Y',strtotime($d->usd->dob)) }}</span></h3>
                                <h3 class="get-user-name"><span>Seats Available <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name"></span></h3>
                                @if($d->total_seats == 1)
                                <ul class="get-user-icon-layer">
                                    <li><i class="fas fa-user"></i></li>
                                </ul>
                                @elseif($d->total_seats == 2)
                                    <ul class="get-user-icon-layer">
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                    </ul>
                                @elseif($d->total_seats == 3)
                                    <ul class="get-user-icon-layer">
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                    </ul>
                                @elseif($d->total_seats == 4)
                                    <ul class="get-user-icon-layer">
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                    </ul>
                                @elseif($d->total_seats == 5)
                                    <ul class="get-user-icon-layer">
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                        <li><i class="fas fa-user"></i></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="get-time-depatrue">
                                <div class="time-departure">
                                    <span>Time Departure:</span>
                                    <p class="time">{{ date('h:i A',strtotime($d->departure_time)) }}</p>
                                </div>
                                <div class="time-departure">
                                    <span>Time Arrival:</span>
                                    <p class="time">{{ date('h:i A',strtotime($d->arrival_time)) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="get-user-ratings">
                                <ul class="get-rate-user">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <div class="get-price">
                                    <h3 class="get-total-prize">${{ $d->price_per_seat }}</h3>
                                </div>
                                <a href="{{ url('/ride-details/'.$d->link) }}"><button class="btn btn-info btn-offer text-uppercase">Details</button></a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- end search result page -->
        </div>
    </div>
</div>
<!-- end offer a ride -->
@endsection