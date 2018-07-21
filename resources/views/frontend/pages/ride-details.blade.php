@extends('frontend.layout')
@section('content')

    <div class="get-offer-ride">
        <div class="container">
            <div class="row">
                <h3 class="get-popular-list list-option-ride">Ride Details</h3>
                <div class="col-sm-12 get-join-as">
                    <div class="col-sm-5">
                        <div class="form-ride-details">
                            <h3>Form</h3>
                            <h2>Kuching</h2>
                            <p>Jalan Tunku Abdul Rahman, 93748 Kuching, Sarawak, Malaysia</p>
                            <p class="get-departure-time">Departure Time: <span class="get-time">10:20PM</span></p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="arrow-icon">
                            <img src="img/arrow-icon.png" alt="">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-ride-details">
                            <h3>To</h3>
                            <h2>Sibu</h2>
                            <p>Sarawak House Complex, Jalan Kampung Nyabor, Malaysia</p>
                            <p class="get-departure-time">Arraival Time: <span class="get-time">08:20PM</span></p>
                        </div>
                    </div>
                </div>
                <!--End rdemade details  -->
                <!-- available seats -->
                <div class="get-available-seats get-normal-seats clearfix">
                    <div class="col-sm-4 padding-left-o">
                        <h3 class="check-total-fare">Available Seats</h3>
                    </div>
                    <div class="col-sm-5 col-sm-offset-3 col-xs-12">
                        <h3 class="price-per-seats">Price Per Seat: <span>$15</span></h3>
                    </div>
                    <ul class="get-ride-seat clearfix">
                        <li>
                            <div class="ride-seat-icon">
                                <i class="fas fa-user-times fixed-hover"></i>
                                <span>Ridermate</span>
                            </div>
                        </li>
                        <li>
                            <div class="ride-seat-icon first-ride">
                                <i class="fas fa-user"></i>
                                <span>Empty</span>
                            </div>
                        </li>
                        <li>
                            <div class="ride-seat-icon first-ride">
                                <i class="fas fa-user"></i>
                                <span>Empty</span>
                            </div>
                        </li>
                        <li>
                            <div class="ride-seat-icon first-ride">
                                <i class="fas fa-user"></i>
                                <span>Empty</span>
                            </div>
                        </li>
                        <li>
                            <div class="ride-seat-icon first-ride">
                                <i class="fas fa-user"></i>
                                <span>Empty</span>
                            </div>
                        </li>
                    </ul>
                    <span class="text-right">*Click To Select Your Seat</span>
                    <div class="col-sm-4 padding-left-o">
                        <h3 class="price-per-seats get-total-fare">Total Fare: <span>$30</span></h3>
                    </div>
                    <div class="col-sm-5 col-sm-offset-3 col-xs-12">
                        <button class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModal2">Request To Book</button>
                    </div>
                </div>
                <!-- end available seats -->

                <!-- get direction -->
                <div class="get-check-direction clearfix">
                    <h3 class="check-direction-title">Check Direction</h3>
                    <div id="googleMap"></div>
                </div>
                <!-- end get direction -->

                <!-- car details -->
                <div class="get-available-seats">
                    <h3 class="check-total-fare">Car Details</h3>
                    <div class="col-sm-5 col-xs-12 padding-left-o">
                        <div class="get-car-details-area clearfix">
                            <div class="col-sm-6 padding-left-o">
                                <span class="ride-label">Car Type <span class="right-into">:</span></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="ride-label-badge">Toyota Axio 2012</span>
                            </div>
                        </div>
                        <div class="get-car-details-area clearfix">
                            <div class="col-sm-6 padding-left-o">
                                <span class="ride-label">Car Plate No <span class="right-into">:</span></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="ride-label-badge">LA-558745 48</span>
                            </div>
                        </div>
                        <div class="get-car-details-area clearfix">
                            <div class="col-sm-6 padding-left-o">
                                <span class="ride-label">Maximum Luggage <span class="right-into">:</span></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="ride-label-badge">3 Bags</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3 col-xs-12 ride-details-feature">
                        <ul class="get-ride-feature">
                            <li>
                                <span class="right-ride-feature icon-feature-details"></span>
                                <span class="left-ride-feature">Pets</span>
                            </li>
                            <li>
                                <span class="right-ride-feature icon-feature-details"></span>
                                <span class="left-ride-feature">Music</span>
                            </li>
                            <li>
                                <span class="right-ride-feature icon-feature-details"></span>
                                <span class="left-ride-feature">Smoking</span>
                            </li>
                            <li>
                                <span class="right-ride-feature icon-cross-details"></span>
                                <span class="left-ride-feature">Max.2 in back Seat</span>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-info btn-offer ride-final-ride-button" type="button" data-toggle="modal" data-target="#myModalx">Ridemade Details</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end offer a ride -->

    @endsection