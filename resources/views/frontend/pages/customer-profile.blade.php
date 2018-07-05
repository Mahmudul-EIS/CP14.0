@extends('frontend.layout')
@section('content')
    <div class="get-offer-ride  get-ride-mate-profile">
    <div class="container">
        <div class="row">
            <div class="price-seat">
                <div class="col-lg-12 col-sm-12">
                    <button class="btn btn-info btn-offer edit-badge-area">Edit Info <img src="{{ url('/') }}/public/assets/frontend/img/file.png" alt=""></button>
                    <!-- notification popupbar -->
                    <div class="get-edit-profile">
                        <ul class="edit-profile-option">
                            <li><a href="#">Edit Profile</a></li>
                            <li data-toggle="modal" data-target="#myModal">Credit Card Information</li>
                            <li data-toggle="modal" data-target="#myModalx">Change Password</li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="col-md-9 col-lg-8 col-sm-12 col-xs-12 ride--profile padding-left-o">
                    <form action="#">
                        <h3 class="get-popular-list">Riders Profile</h3>
                        <div class="get-ridemate-user ">
                            <div class="user-icon">
                                <img src="<?php if(isset($usd->picture)){echo asset('public/uploads/customers/'.$usd->picture);}?>" alt="">
                            </div>
                            <div class="user-details">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="name" class="user-get-label">Name</label>
                                    </div>
                                    <div class="col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Your Full Name">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-sm-3">
                                        <label for="email" class="user-get-label">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="emil" class="form-control" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-sm-3">
                                        <label for="age" class="user-get-label">Age</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="" id="" class="get-select-picker" title="Day">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="" id="" class="get-select-picker" title="Month">
                                            <option value="12">12</option>
                                            <option value="11">11</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="" id="" class="get-select-picker" title="Year">
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2016">2015</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="age" class="user-get-label">Gender</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="" id="" class="get-select-picker" title="Gender">
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="rider-profile-button">
                                <button class="btn btn-info get-notification">Join Us</button>
                                <button class="btn btn-info get-notification" style="margin-right: 15px;">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>

                <div class="my-bookings-area clearfix">
                    <h3 class="get-popular-list">My Bookings</h3>
                    <!-- single ride area -->
                    <div class="col-md-12 col-lg-8 col-sm-12 col-xs-12 padding-left-o">
                        <div class="single-booking-point">
                            <div class="col-sm-5 padding-left-o">
                                <div class="departure-to-arrival clearfix">
                                    <div class="arrival-line">
                                        <span class="my-location"></span>
                                        <span class="arrival-lin-get"></span>
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <div class="get-area-details">
                                        <div class="get-ride-departure-time">
                                            <h3 class="departure-ride">Kuching</h3>
                                            <h4 class="depature-time-get">Departure time: <span>13.00</span></h4>
                                        </div>
                                        <div class="get-ride-departure-time">
                                            <h3 class="departure-ride">Shibu</h3>
                                            <h4 class="depature-time-get">Arrival time: <span>13.00</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="ridemade-details-button">
                                    <button class="btn btn-info btn-offer">Ridemates Details</button>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="total-fare-area">
                                    <h3 class="total-fare-get-section">
                                        Total Fare <span>$20</span>
                                    </h3>
                                    <button class="btn btn-info btn-offer"><i class="fas fa-location-arrow"></i> <br> View <br> Distance</button>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="car-details-type-arrow">
                                    <h3>Car Details</h3>
                                    <ul>
                                        <li><span class="ride-label">Car Type <span class="right-into">:</span></span>
                                        </li>
                                        <li>
                                            <span class="ride-label">Car Plate No <span class="right-into">:</span></span>
                                        </li>
                                        <li>
                                            <span class="ride-label">Maximum Luggage <span class="right-into">:</span></span>
                                        </li>
                                    </ul>
                                    <button class="btn btn-info btn-offer" type="button" data-toggle="modal" data-target="#myModal4">Cancel Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single ride area -->
                    <div class="col-md-12 col-lg-8 col-sm-12 col-xs-12 padding-left-o">
                        <div class="single-booking-point">
                            <div class="col-sm-5 padding-left-o">
                                <div class="departure-to-arrival clearfix">
                                    <div class="arrival-line">
                                        <span class="my-location"></span>
                                        <span class="arrival-lin-get"></span>
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <div class="get-area-details">
                                        <div class="get-ride-departure-time">
                                            <h3 class="departure-ride">Kuching</h3>
                                            <h4 class="depature-time-get">Departure time: <span>13.00</span></h4>
                                        </div>
                                        <div class="get-ride-departure-time">
                                            <h3 class="departure-ride">Shibu</h3>
                                            <h4 class="depature-time-get">Arrival time: <span>13.00</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="ridemade-details-button">
                                    <button class="btn btn-info btn-offer" type="button" data-toggle="modal" data-target="#myModal4">Ridemates Details</button>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="total-fare-area">
                                    <h3 class="total-fare-get-section">
                                        Total Fare <span>$20</span>
                                    </h3>
                                    <button class="btn btn-info btn-offer"><i class="fas fa-location-arrow"></i> <br> View <br> Distance</button>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="car-details-type-arrow">
                                    <h3>Car Details</h3>
                                    <ul>
                                        <li><span class="ride-label">Car Type <span class="right-into">:</span></span>
                                        </li>
                                        <li>
                                            <span class="ride-label">Car Plate No <span class="right-into">:</span></span>
                                        </li>
                                        <li>
                                            <span class="ride-label">Maximum Luggage <span class="right-into">:</span></span>
                                        </li>
                                    </ul>
                                    <button class="btn btn-info btn-offer" type="button" data-toggle="modal" data-target="#myModal4">Cancel Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single ride ara -->
                    <div class="col-md-12 col-lg-8 col-sm-12 col-xs-12 padding-left-o">
                        <div class="single-booking-point">
                            <div class="col-sm-5 padding-left-o">
                                <div class="departure-to-arrival clearfix">
                                    <div class="arrival-line">
                                        <span class="my-location"></span>
                                        <span class="arrival-lin-get"></span>
                                        <span><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <div class="get-area-details">
                                        <div class="get-ride-departure-time">
                                            <h3 class="departure-ride">Kuching</h3>
                                            <h4 class="depature-time-get">Departure time: <span>13.00</span></h4>
                                        </div>
                                        <div class="get-ride-departure-time">
                                            <h3 class="departure-ride">Shibu</h3>
                                            <h4 class="depature-time-get">Arrival time: <span>13.00</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="ridemade-details-button">
                                    <button class="btn btn-info btn-offer">Ridemates Details</button>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="total-fare-area">
                                    <h3 class="total-fare-get-section">
                                        Total Fare <span>$20</span>
                                    </h3>
                                    <button class="btn btn-info btn-offer"><i class="fas fa-location-arrow"></i> <br> View <br> Distance</button>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="car-details-type-arrow">
                                    <h3>Car Details</h3>
                                    <ul>
                                        <li><span class="ride-label">Car Type <span class="right-into">:</span></span>
                                        </li>
                                        <li>
                                            <span class="ride-label">Car Plate No <span class="right-into">:</span></span>
                                        </li>
                                        <li>
                                            <span class="ride-label">Maximum Luggage <span class="right-into">:</span></span>
                                        </li>
                                    </ul>
                                    <button class="btn btn-info btn-offer" type="button" data-toggle="modal" data-target="#myModal4">Cancel Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end ridemate profile area  -->
</div>
<!-- Credit card information -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Credit Card Information</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 padding-left-o padding-right-0">
                    <div class="form-group">
                        <label for="credit name">Credit Card Holder</label>
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="credit name">Credit Card Number</label>
                        <input type="number" class="form-control" placeholder="Credit Card Number">
                    </div>
                    <div class="form-group modal-card-status">
                        <label for="credit name">Credit Card Type</label>
                        <select name="" id="" class="get-select-picker" title="Card">
                            <option value="master-card">Master Card</option>
                            <option value="vis">Visa</option>
                            <option value="paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="credit name">Activate Credit Card Payment</label>
                        <label class="toggle-switch-box switch-rounded switch-bg-success">
                            <input type="checkbox">
                            <span class="toggle-switch-item" data-tg-on="on" data-tg-off="off">
					    <span class="switch-button"></span>
					  </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer login-modal-footer">
                <button class="btn btn-info btn-offer">Save</button>
                <button class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end credit card payment popup -->

<!--change password -->

<div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 padding-left-o padding-right-0">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <div class="modal-footer login-modal-footer">
                <button class="btn btn-info btn-offer">Confirm</button>
                <button class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end change password popup -->

<!-- cancel booking popup -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cancel Booking</h4>
            </div>
            <div class="modal-body table-responsive">
                <p>Are you sure you want to cancel your booking ?</p>
            </div>
            <div class="modal-footer login-modal-footer">
                <button class="btn btn-info btn-offer">Confirm</button>
                <button class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end cancel booking popup -->
@endsection