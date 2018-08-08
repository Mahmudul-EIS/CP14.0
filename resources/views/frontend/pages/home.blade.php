@extends('frontend.layout')
@section('content')

    @if(Auth::check() && Auth::user()->role == 'driver')
        <div class="get-offer-ride">
            <div class="container">
                <div class="row">
                    @if(session()->has('error'))
                        <p class="alert alert-danger">
                            {{ session()->get('error') }}
                        </p>
                    @endif
                    <div class="ridemate-offer-button">
                        <button class="btn btn-info btn-offer"><a style="color: #ffffff;" href="{{ url('/d/offer-ride') }}">Offer a ride <i class="fas fa-car"></i></a></button>
                        <button class="btn btn-info btn-offer">Requests For Ride</button>
                    </div>
                    <!-- Ride details -->
                    <div class="get-ridemate-single">
                        <h3 class="check-total-fare text-center">Requests of Rides</h3>

                        @if(isset($reqs))
                            @foreach($reqs as $req)
                                @if(!isset($req->exx))

                        <!-- single request area -->

                        <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8  col-lg-offset-2 col-xs-12 ridemate-details-offer padding-left-o">
                            <h4 class="ridemate-home-h3">Ride Details</h4>
                            <div class="col-sm-8 col-xs-12 padding-left-o">
                                <div class="get-car-details-area clearfix">
                                    <div class="col-sm-5">
                                        <span class="ride-label">Form<span class="right-into">:</span></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="ride-label-badge">{{ $req->from }}</span>
                                    </div>
                                </div>
                                <div class="get-car-details-area clearfix">
                                    <div class="col-sm-5">
                                        <span class="ride-label">To<span class="right-into">:</span></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="ride-label-badge">{{ $req->to }}</span>
                                    </div>
                                </div>
                                <div class="get-car-details-area clearfix">
                                    <div class="col-sm-5">
                                        <span class="ride-label">Requested Seats <span class="right-into">:</span></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="ride-label-badge">{{ $req->required_seat }}</span>
                                    </div>
                                </div>
                                <button class="btn btn-info btn-offer ride-final-ride-button" type="button" data-toggle="modal" data-target="#myModalx{{ $req->id }}">Riders Details</button>
                            </div>
                            <div class="col-sm-4 col-xs-12 ride-details-feature">
                                <div class="get-car-details-area clearfix">
                                    <div class="col-sm-5">
                                        <span class="ride-label">Date <span class="right-into">:</span></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span class="ride-label-badge">{{ $req->departure_date }}</span>
                                    </div>
                                </div>
                                <button class="btn btn-info btn-offer offer-ride-ridemate-home"><a style="color: purple;" href="{{ url('/d/offer-ride?req='.$req->id) }}">Offer Ride</a></button>
                            </div>
                        </div>
                        <!-- end single ridemate area -->

                                @endif
                            @endforeach
                                    @endif


                    </div>
                    <!-- end ridemate details -->
                </div>
            </div>
        </div>
        @else
    <!-- landing area -->
    <div class="get-landing-area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="get-landing-text">
                        <h2 class="get-bold-text">Are you driving <br> somewhere soon?</h2>
                        <p>Take a ride through GetWobo and change the experience of the journey that you never feel before.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing area -->

    <!-- where to ara -->
    <div class="get-where">
        <div class="container">
            <div class="row">
                <h2 class="get-section-header">Where to?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inc ididunt ut labore et dolore magna aliqua.</p>
                <div class="get-a-ride">
                    <form method="@if(Auth::user() && Auth::user()->role == 'customer'){{'post'}}@else{{'get'}}@endif" action="@if(Auth::user() && Auth::user()->role == 'customer'){{url('/c/search')}}@else{{url('/sign-up/customer')}}@endif">
                        {{ csrf_field() }}
                        <div class="col-sm-3 col-xs-12 padding-left-o">
                            <input type="text" name="from" id="" class="get-select-picker placepicker form-control" placeholder="From" required>
                        </div>
                        <div class="col-sm-3 col-xs-12 padding-left-o">
                            <input type="text" name="to" id="" class="get-select-picker placepicker form-control" placeholder="To" required>
                        </div>
                        <div class="col-sm-3 col-xs-12 padding-left-o">
                            <input type="text" name="departure_date" placeholder="When" class="form-control" id="datetimepicker4" required>
                        </div>
                        <div class="col-sm-3 col-xs-12 padding-left-o">
                            <button type="submit" class="btn btn-info btn-offer"><span>Get a ride </span><i class="fas fa-car"></i></button>
                        </div>
                    </form>
                </div>
                @include('frontend.includes.messages')
            </div>
        </div>
    </div>
    <!-- end where to -->

    <!-- todays departure -->
    <div class="get-departure clearfix">
        <div class="container">
            <div class="row">
                <h2 class="get-departure-title">Today's Departure</h2>
                <!-- single departure -->
                <div class="col-sm-6 col-xs-12 padding-left-o">
                    <div class="get-single-departure clearfix">
                        <div class="col-md-8 col-sm-12">
                            <div class="get-user-icon">
                                <img src="{{ asset('public/assets/frontend/img/user/user-1.jpg') }}" alt="">
                            </div>
                            <div class="get-user-details">
                                <h3 class="get-user-name"><span>Name <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">Jonson Martin</span></h3>
                                <h3 class="get-user-name"><span>Age <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">26</span></h3>
                                <h3 class="get-user-name"><span>Seats Available <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name"></span></h3>
                                <ul class="get-user-icon-layer">
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="get-user-ratings">
                                <ul class="get-rate-user">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <button class="btn btn-info btn-offer text-uppercase">Book Ride</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end signle departure -->

                <!-- single departure -->
                <div class="col-sm-6 col-xs-12 padding-right-o">
                    <div class="get-single-departure clearfix">
                        <div class="col-md-8 col-sm-12">
                            <div class="get-user-icon">
                                <img src="{{ asset('public/assets/frontend/img/user/user-1.jpg') }}" alt="">
                            </div>
                            <div class="get-user-details">
                                <h3 class="get-user-name"><span>Name <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">Jonson Martin</span></h3>
                                <h3 class="get-user-name"><span>Age <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">26</span></h3>
                                <h3 class="get-user-name"><span>Seats Available <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name"></span></h3>
                                <ul class="get-user-icon-layer">
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="get-user-ratings">
                                <ul class="get-rate-user">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <button class="btn btn-info btn-offer text-uppercase">Book Ride</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end signle departure -->

                <!-- single departure -->
                <div class="col-sm-6 col-xs-12  padding-left-o">
                    <div class="get-single-departure clearfix">
                        <div class="col-md-8 col-sm-12">
                            <div class="get-user-icon">
                                <img src="{{ asset('public/assets/frontend/img/user/user-1.jpg') }}" alt="">
                            </div>
                            <div class="get-user-details">
                                <h3 class="get-user-name"><span>Name <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">Jonson Martin</span></h3>
                                <h3 class="get-user-name"><span>Age <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">26</span></h3>
                                <h3 class="get-user-name"><span>Seats Available <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name"></span></h3>
                                <ul class="get-user-icon-layer">
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="get-user-ratings">
                                <ul class="get-rate-user">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <button class="btn btn-info btn-offer text-uppercase">Book Ride</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end signle departure -->

                <!-- single departure -->
                <div class="col-sm-6 col-xs-12 padding-right-o">
                    <div class="get-single-departure clearfix">
                        <div class="col-md-8 col-sm-12">
                            <div class="get-user-icon">
                                <img src="{{ asset('public/assets/frontend/img/user/user-1.jpg') }}" alt="">
                            </div>
                            <div class="get-user-details">
                                <h3 class="get-user-name"><span>Name <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">Jonson Martin</span></h3>
                                <h3 class="get-user-name"><span>Age <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name">26</span></h3>
                                <h3 class="get-user-name"><span>Seats Available <span class="get-right-icon">:</span></span>
                                    <span class="get-dynamic-name"></span></h3>
                                <ul class="get-user-icon-layer">
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                    <li><i class="fas fa-user"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="get-user-ratings">
                                <ul class="get-rate-user">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <button class="btn btn-info btn-offer text-uppercase">Book Ride</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end signle departure -->
            </div>
        </div>
    </div>
    <!-- end todays deparature -->

    <!-- about us -->
    <div class="get-about-us clearfix">
        <div class="container">
            <div class="row">
                <h2 class="get-about-us-title">Go Literally <span>anywhere.</span> <br> from <span>everywhere.</span></h2>
                <div class="col-sm-3 padding-left-o">
                    <div class="get-single-text clearfix">
                        <div class="icon"><img class="icon-1" src="{{ asset('public/assets/frontend/img/icon-1.png') }}" alt="icon-1"></div>
                        <h3 class="get-single-title">Smart</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="get-single-text clearfix">
                        <div class="icon"><img class="icon-2" src="{{ asset('public/assets/frontend/img/icon-2.png') }}" alt="icon-2"></div>
                        <h3 class="get-single-title">Simple</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="get-single-text clearfix">
                        <div class="icon"><img class="icon-3" src="{{ asset('public/assets/frontend/img/icon-3.png') }}" alt="icon-3"></div>
                        <h3 class="get-single-title">Seamless</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about us -->
    @endif

    @endsection