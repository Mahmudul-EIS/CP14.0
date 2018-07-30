@extends('frontend.layout')
@section('content')
    <!-- offer a ride -->
   <form action="{{ url('d/offer-ride') }}" method="post">
            {{csrf_field()}}
        <div class="get-offer-ride">
            <div class="container">
                <div class="row">
                    <h3 class="get-ride-title">Offer a Ride</h3>
                    @if(session()->has('success'))
                            <p class="alert alert-success">
                                {{ session()->get('success') }}
                            </p>
                    @endif
                    <div class="get-form-offer">
                        <div class="col-sm-6 padding-left-o price-seat">
                            <div class="form-group">
                                <label for="pickup-point">Pickup Point</label>
                                <input name="origin" type="text" id="origin-input" placeholder="Enter a departure location" class="form-control" required="required" @if(isset($data->from)) value="{{ $data->from }}" readonly @endif>
                            </div>
                            <div class="form-group">
                                <label for="pickup-point">Destination</label>
                                <input name="destination" type="text" id="destination-input" placeholder="Enter a destination location" class="form-control" required="required" @if(isset($data->to)) value="{{ $data->to }}" readonly @endif>
                            </div>
                            <div class="col-sm-6 padding-left-o">
                                <div class="form-group">
                                    <label for="price">Price Per seat</label>
                                    <input name="price_per_seat" type="text" placeholder="$200" class="form-control form-control-placeholder" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="number-of-seat">Number Of Seats</label>
                                    <select name="total_seats" id="" class="get-select-picker" title="Seats" required @if(isset($data->seat_required)) disabled @endif>
                                        <option value="1" @if(isset($data->seat_required) && $data->seat_required == '1') selected @endif>1 Seat</option>
                                        <option value="2" @if(isset($data->seat_required) && $data->seat_required == '2') selected @endif>2 Seats</option>
                                        <option value="3" @if(isset($data->seat_required) && $data->seat_required == '3') selected @endif>3 Seats</option>
                                        <option value="4" @if(isset($data->seat_required) && $data->seat_required == '4') selected @endif>4 Seats</option>
                                        <option value="5" @if(isset($data->seat_required) && $data->seat_required == '5') selected @endif>5 Seats</option>
                                    </select>
                                    @if(isset($data->seat_required)) <input type="hidden" name="total_seats" value="{{ $data->seat_required }}"> @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pick--get-atime">
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Departure Time</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input name="d_date" type="date" class="form-control" placeholder="Pick a Date" required="required" @if(isset($data->departure_date)) value="{{ $data->departure_date }}" readonly @endif>
                                </div>
                                <div class="col-sm-3">
                                    <input name="d_hour" type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" required="required">
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input name="d_minute" type="text" class="form-control timepicker-mm" placeholder="Min:MM" required="required">
                                </div>
                            </div>
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Arrival Time(Optional)</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input name="a_date" type="date" class="form-control" placeholder="Pick a Date">
                                </div>
                                <div class="col-sm-3">
                                    <input name="a_hour" type="text" class="form-control timepicker-hh" placeholder="Hrs:HH">
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input name="a_minute" type="text" class="form-control timepicker-mm" placeholder="Min:MM">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- check direction -->
                    <div class="get-check-direction clearfix">
                        <h3 class="check-direction-title">Check Direction</h3>
                        <div id="googleMap"></div>
                    </div>
                    <!-- end check direction -->

                    <!-- ride description -->
                    <div class="get-ride-description clearfix">
                        <h3 class="check-direction-title">Ride description</h3>
                        <div class="col-sm-12 col-md-6 text-uppercase ride-own-car padding-left-o">
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <p>Ride Your Own Car</p>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <ul class="ride-select-option">
                                        <li><input class="check-input" type="checkbox" id="checkbox1" name="checkbox01">
                                            <label class="green-color @if(isset($vd)) add-green-color @endif" id="own-vehicle-green" for="checkbox1"></label>
                                        </li>
                                        <li>
                                            <input class="check-input-2" type="checkbox" id="checkbox2" name="checkbox01">
                                            <label class="red-color" id="own-vehicle-red" for="checkbox2"></label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" id="own-vehicle" name="own_vehicle" value="">
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-type" class="ride-label">Car Type <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="car_type" id="car-type" type="text" class="form-control" @if(isset($vd->car_type)) value="{{ $vd->car_type }}" @endif>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-plate" class="ride-label">Car Plate No <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="car_plate_no" id="car-plate" type="text" class="form-control" @if(isset($vd->car_plate_no)) value="{{ $vd->car_plate_no }}" readonly @endif>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-luggage" class="ride-label">MAXIMUM LUGGAGE <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="luggage_limit" id="car-luggage" type="text" class="form-control" @if(isset($vd->luggage_limit)) value="{{ $vd->luggage_limit }}" @endif>
                                </div>
                            </div>
                            @if(isset($vd))<input type="hidden" name="vd_action" id="vd_action" value="edit"><input type="hidden" name="vd_id" value="{{ $vd->id }}">@else <input type="hidden" id="vd_action" name="vd_action" value="add"> @endif
                        </div>
                        <div class="col-md-3 col-md-offset-2 col-sm-12 col-xs-12 col-xs-offset-0 ride-offer-button">
                            <ul class="get-ride-feature">
                                <li>
                                    <span class="left-ride-feature">Pets</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox4" name="checkbox01">
			        						<label class="red-color" id="pets-red" for="checkbox4"></label>
											<input class="check-input" type="checkbox" id="checkbox3" name="checkbox01">
			        						<label class="green-color" id="pets-green" for="checkbox3"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Music</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox5" name="checkbox01">
			        						<label class="red-color" id="music-red" for="checkbox5"></label>
											<input class="check-input" type="checkbox" id="checkbox6" name="checkbox01">
			        						<label class="green-color" id="music-green" for="checkbox6"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Smoking</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox7" name="checkbox01">
			        						<label class="red-color" id="smoking-red" for="checkbox7"></label>
											<input class="check-input" type="checkbox" id="checkbox8" name="checkbox01">
			        						<label class="green-color" id="smoking-green" for="checkbox8"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Max.2 in Back Seat </span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox9" name="checkbox01">
			        						<label class="red-color" id="back-red" for="checkbox9"></label>
											<input class="check-input" type="checkbox" id="checkbox10" name="checkbox01">
			        						<label class="green-color" id="back-green" for="checkbox10"></label>
									</span>
                                </li>
                            </ul>
                            <input type="hidden" name="pets" id="pets" value="">
                            <input type="hidden" name="music" id="music" value="">
                            <input type="hidden" name="smoking" id="smoking" value="">
                            <input type="hidden" name="back_seat" id="back" value="">
                            <button type="button" class="btn btn-info btn-offer">Add More <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="get-ride-offer-button text-center clearfix">
                        <button type="submit" class="btn btn-info btn-offer">Offer Ride</button>
                    </div>
                    <!-- end ride description -->
                </div>
            </div>
        </div>
       @if($req_id != '')<input type="hidden" name="req_id" value="{{ $req_id }}"><input type="hidden" name="req_user_id" value="{{ $data->user_id }}">@endif
    </form>
    <!-- end offer a ride -->

    @endsection