@extends('frontend.layout')
@section('content')

    <div class="get-offer-ride">
        <div class="container">
            <div class="row">
               
                <h3 class="get-popular-list list-option-ride">Ride Details</h3>
                
                <div class="get-form-control-button">
                    <button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#startRide">Ride Start</button>
                </div>

                <div class="col-sm-12 get-join-as">
                    <div class="col-sm-5">
                        <div class="form-ride-details">
                            <h3>Form</h3>
                            <h2 id="start">{{ $data->origin }}</h2>
                            <p></p>
                            <p class="get-departure-time">Departure Time: <span class="get-time">{{ date('h:i A',strtotime($data->departure_time)) }}</span></p>
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
                            <h2 id="end">{{ $data->destination }}</h2>
                            <p></p>
                            <p class="get-departure-time">Arraival Time: <span class="get-time">{{ date('h:i A',strtotime($data->arrival_time)) }}</span></p>
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
                        <h3 class="price-per-seats">Price Per Seat: <span>${{ $data->price_per_seat }}</span></h3>
                    </div>
                    <ul class="get-ride-seat clearfix">
                        <li>
                            <div class="ride-seat-icon">
                                <i class="fas fa-user-times fixed-hover"></i>
                                <span>Ridermate</span>
                            </div>
                        </li>
                        @if($data->total_seats == 3)
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
                        @elseif($data->total_seats == 4)
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
                        @elseif($data->total_seats == 5)
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
                            <li>
                                <div class="ride-seat-icon first-ride">
                                    <i class="fas fa-user"></i>
                                    <span>Empty</span>
                                </div>
                            </li>
                        @endif
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
                                <span class="ride-label-badge">{{ $data->vd->car_type }}</span>
                            </div>
                        </div>
                        <div class="get-car-details-area clearfix">
                            <div class="col-sm-6 padding-left-o">
                                <span class="ride-label">Car Plate No <span class="right-into">:</span></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="ride-label-badge">{{ $data->vd->car_plate_no }}</span>
                            </div>
                        </div>
                        <div class="get-car-details-area clearfix">
                            <div class="col-sm-6 padding-left-o">
                                <span class="ride-label">Maximum Luggage <span class="right-into">:</span></span>
                            </div>
                            <div class="col-sm-6">
                                <span class="ride-label-badge">{{ $data->vd->luggage_no }} Bags</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3 col-xs-12 ride-details-feature">
                        <ul class="get-ride-feature">
                            <li>
                                <span class="right-ride-feature <?php foreach ($data->rd as $r){if($r->key == 'pets' && $r->value == 'yes'){echo "icon-feature-details";}else{echo "icon-cross-details";}}?>"></span>
                                <span class="left-ride-feature">Pets</span>
                            </li>
                            <li>
                                <span class="right-ride-feature <?php foreach ($data->rd as $r){if($r->key == 'music' && $r->value == 'yes'){echo "icon-feature-details";}else{echo "icon-cross-details";}}?>"></span>
                                <span class="left-ride-feature">Music</span>
                            </li>
                            <li>
                                <span class="right-ride-feature <?php foreach ($data->rd as $r){if($r->key == 'smoking' && $r->value == 'yes'){echo "icon-feature-details";}else{echo "icon-cross-details";}}?>"></span>
                                <span class="left-ride-feature">Smoking</span>
                            </li>
                            <li>
                                <span class="right-ride-feature <?php foreach ($data->rd as $r){if($r->key == 'back_seat' && $r->value == 'yes'){echo "icon-feature-details";}else{echo "icon-cross-details";}}?>"></span>
                                <span class="left-ride-feature">Max.2 in back Seat</span>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-info btn-offer ride-final-ride-button" type="button" data-toggle="modal" data-target="#myModalx">Ridemate Details</button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end offer a ride -->
    @endsection

<!--Riders details -->
<div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Riders Details</h4>
            </div>
            <div class="modal-body rider-details-ridemate">
                <h3 class="rider-title">Rider</h3>
                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Name <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span>{{ $data->user->name }}</span>
                    </div>
                </div>
                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Email <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span>{{ $data->user->email }}</span>
                    </div>
                </div>

                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Gender <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span>{{ $data->user->gender }}</span>
                    </div>
                </div>
                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Occupied Seat <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- request to book -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Require Log In</h4>
            </div>
            <div class="modal-body table-responsive">
                <p>Please log in first!!!</p>
            </div>
            <div class="modal-footer login-modal-footer">
                <button class="btn btn-info btn-offer ">Login</button>
                <button class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- request to book -->
<div class="modal fade" id="startRide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Require Log In</h4>
            </div>
            <div class="modal-body table-responsive">
                <p>Please log in first!!!</p>
            </div>
            <div class="modal-footer login-modal-footer">
                 <form method="post" action="{{ route('ride_details', $ride_id) }}">
                     {{ csrf_field() }}
                <button type="submit" class="btn btn-success btn-offer" name="start_ride">Yes</button>
            
                <button class="btn btn-danger btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
