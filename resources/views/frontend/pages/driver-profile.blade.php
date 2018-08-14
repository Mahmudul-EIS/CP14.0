@extends('frontend.layout')
@section('content')
    <!--ridemate profile -->
    <div class="get-offer-ride  get-ride-mate-profile">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-10 col-xs-12 col-xs-offset-0 padding-right-0">
                    <div class="col-lg-12 col-sm-12">
                        <button class="btn btn-info btn-offer edit-badge-area">Edit Info <img src="{{ url('/') }}/public/assets/frontend/img/file.png" alt=""></button>
                        <!-- notification popupbar -->
                        <div class="get-edit-profile">
                            <ul class="edit-profile-option">
                                <li><a href="{{ url('d/profile/edit/'.$user->id) }}">Edit Profile</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="highlight-get-popular clearfix">
                    <div class="col-sm-12 col-md-8 col-xs-12 padding-left-o">
                        <h3 class="get-popular-list">Ridemate Profile</h3>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="get-ridemate-user clearfix">
                            <div class="user-icon">
                                <img src="<?php if(isset($usd->picture)){echo asset('public/uploads/drivers/'.$usd->picture);}?>" alt="">
                            </div>
                            <div class="user-details">
                                <h3 class="get-ride-user">{{ $user->name }}</h3>
                                <div class="user-get-emails">
                                    <ul>
                                        <li><p>Email<span class="ride-button">:</span></p>
                                            <span>{{ $user->email }}</span>
                                        </li>
                                        <li><p>Age<span class="ride-button">:</span></p>
                                            <span>{{ date('Y') - date('Y',strtotime($usd->dob)) }}</span>
                                        </li>
                                        <li><p>Gender<span class="ride-button">:</span></p>
                                            <span>{{ $usd->gender }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="get-available-seats ridemate-profile--w clearfix">
                    <h3 class="check-total-fare">Ride Description</h3>
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
                        <div class="get-car-details-area clearfix">
                            <div class="col-sm-6 padding-left-o">
                                <span class="ride-label">Language Proficiency <span class="right-into">:</span></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="ride-label-badge">English</span>
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
                </div>
                <!--Ride description  -->
                <!-- feedback -->
                <div class="get-feedback-area ridemate-profile--w clearfix">
                    <h3 class="check-total-fare clearfix">Feedbacks</h3>
                    <div class="user-feedback-section clearfix">
                        <div class="feedback-user-icon"><img src="{{ url('/') }}/public/assets/frontend/img/user/user-4.jpg" alt=""></div>
                        <div class="feedback-get-user">
                            <h3 class="user-name">Iris West</h3>
                            <ul class="get-user-icon-layer clearfix">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p>ud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        </div>
                    </div>
                    <div class="user-feedback-section clearfix">
                        <div class="feedback-user-icon"><img src="{{ url('/') }}/public/assets/frontend/img/user/user-2.jpg" alt=""></div>
                        <div class="feedback-get-user">
                            <h3 class="user-name">barry Alen</h3>
                            <ul class="get-user-icon-layer clearfix">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p>ud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        </div>
                    </div>
                    <div class="user-feedback-section clearfix">
                        <div class="feedback-user-icon"><img src="{{ url('/') }}/public/assets/frontend/img/user/user-3.jpg" alt=""></div>
                        <div class="feedback-get-user">
                            <h3 class="user-name">Cisco Remon</h3>
                            <ul class="get-user-icon-layer clearfix">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="far fa-star"></i></li>
                            </ul>
                            <p>ud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix text-center">
                    <button class="btn btn-info btn-offer"  data-toggle="modal" data-target="#myModaln" >Review Income Statement</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end ridemate profile area  -->
    <div class="modal fade" id="myModalx2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog add-modal-item add-modal-item-get-ride" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Find A Ride</h4>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="" id="" class="get-select-picker" title="Form">
                                    <option value="dhaka">Dhaka</option>
                                    <option value="Kualalampur">Kualalampur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="" id="" class="get-select-picker" title="To">
                                    <option value="dhaka">Dhaka</option>
                                    <option value="Kualalampur">Kualalampur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker-f" placeholder="When">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="" id="" class="get-select-picker" title="Seats">
                                    <option value="1_seats">1 seats</option>
                                    <option value="2_seats">2 seats</option>
                                    <option value="3_seats">3 seats</option>
                                </select>
                            </div>
                        </div>
                        <div class="get-search-control clearfix">
                            <button class="btn btn-info btn-offer">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade income-statement-popup" id="myModaln" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Statement Income </h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 padding-left-o padding-right-0">
                        <div class="col-sm-12 col-md-4">
                            <div class="statement-ridemate">
                                <select name="" id="" class="get-select-picker" title="Select">
                                    <option value="dhaka">Daily Income</option>
                                    <option value="Kualalampur">Weekly Income</option>
                                    <option value="Kualalampur">Monthly</option>
                                    <option value="Kualalampur">Yearly</option>
                                </select>
                                <!-- live calender -->
                                <!-- daily calender -->
                                <div class="view-ridemate-profile-popup" id="dailypicker01"></div>
                                <!-- weekly calender -->
                                <div class="view-ridemate-profile-popup" id="dailypicker02"></div>
                                <div id="week-start"></div>
                                <!-- monthly calender -->
                                <div class="view-ridemate-profile-popup" id="dailypicker03"></div>
                                <!-- yearly calender -->
                                <div class="view-ridemate-profile-popup" id="dailypicker04"></div>
                                <button class="btn btn-info btn-offer">Generate</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8 ">
                            <table class="table table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Amount (including GST 6%)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Value 1</td>
                                    <td>Value 2</td>
                                    <td>Value 3</td>
                                </tr>
                                <tr>
                                    <td>Value 1</td>
                                    <td>Value 2</td>
                                    <td>Value 3</td>
                                </tr>
                                <tr>
                                    <td>Value 1</td>
                                    <td>Value 2</td>
                                    <td>Value 3</td>
                                </tr>
                                <tr>
                                    <td>Value 1</td>
                                    <td>Value 2</td>
                                    <td>Value 3</td>
                                </tr>
                                </tbody>
                            </table>
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="mounthly-income">Monthly Income</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer income-modal-footer clearfix">
                </div>
            </div>
        </div>
    </div>
@endsection
