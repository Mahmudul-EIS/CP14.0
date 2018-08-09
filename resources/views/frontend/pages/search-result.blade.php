@extends('frontend.layout')
@section('content')
<!-- populer highlight -->
<div class="get-offer-ride">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 highlight-get-popular padding-left-o padding-right-o">
                <h3 class="get-popular-list">Search result</h3>
                <h3 class="highlight">Saturday, 26 September 2018</h3>
            </div>
            <!-- search result page -->
            <div class="single-popular-item">
                <div class="col-md-10 col-md-offset-1 col-sm-12 popular-departure col-xs-12 padding-left-o">
                    @if(empty($data))
                        <h3 class="highlight">No Search Results Found ! Please Try Again !</h3>
                    @else
                    @foreach($data as $d)
                    <div class="get-single-departure clearfix">
                        <div class="col-sm-5">
                            <div class="get-user-icon">
                                <img src="img/user/user-1.jpg" alt="">
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
                        <div class="col-sm-3">
                            <div class="get-time-depatrue">
                                <div class="time-departure">
                                    <span>Time Departure:</span>
                                    <p class="time">07:00 AM</p>
                                </div>
                                <div class="time-departure">
                                    <span>Time Arrival:</span>
                                    <p class="time">07:00 AM</p>
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
                                    <h3 class="get-total-prize">$45.00</h3>
                                </div>
                                <button class="btn btn-info btn-offer text-uppercase">Details</button>
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