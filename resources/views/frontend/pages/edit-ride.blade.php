@extends('frontend.layout')
@section('content')

    <!-- offer a ride -->
    <form action="#">
        <div class="get-offer-ride">
            <div class="container">
                <div class="row">
                    <h3 class="get-ride-title">Offer a Ride (Edit Details)</h3>
                    <div class="get-form-offer">
                        <div class="col-sm-6 padding-left-o price-seat">
                            <div class="form-group">
                                <label for="pickup-point">Pickup Point</label>
                                <input type="text" id="origin-input" class="form-control" value="{{ $data->origin }}">
                            </div>
                            <div class="form-group">
                                <label for="pickup-point">Destination</label>
                                <input type="text" id="destination-input" class="form-control" value="{{ $data->destination }}">
                            </div>
                            <div class="col-sm-6 padding-left-o">
                                <div class="form-group">
                                    <label for="price">Price Per seat</label>
                                    <input type="text" placeholder="$200" class="form-control form-control-placeholder" value="{{ $data->price_per_seat }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="number-of-seat">Number Of Seats</label>
                                    <select name="" id="" class="get-select-picker" title="Seats">
                                        <option value="1" @if($data->total_seats == 1) {{ 'selected' }} @endif>1 Seat</option>
                                        <option value="2" @if($data->total_seats == 2) {{ 'selected' }} @endif>2 Seats</option>
                                        <option value="3" @if($data->total_seats == 3) {{ 'selected' }} @endif>3 Seats</option>
                                        <option value="4" @if($data->total_seats == 4) {{ 'selected' }} @endif>4 Seats</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pick--get-atime">
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Departure Time</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input type="text" class="form-control datepicker-f" placeholder="Pick a Date" value="{{ date('Y-m-d', strtotime($data->departure_time)) }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" value="{{ date('H', strtotime($data->departure_time)) }}">
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input type="text" class="form-control timepicker-mm" placeholder="Min:MM" value="{{ date('i A', strtotime($data->departure_time)) }}">
                                </div>
                            </div>
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Arrival Time(Optional)</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input type="text" class="form-control datepicker-f" placeholder="Pick a Date" value="{{ date('Y-m-d', strtotime($data->arrival_time)) }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" value="{{ date('H', strtotime($data->arrival_time)) }}">
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input type="text" class="form-control timepicker-mm" placeholder="Min:MM" value="{{ date('i A', strtotime($data->arrival_time)) }}">
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
                        <div class="col-md-6 col-sm-12 text-uppercase ride-own-car padding-left-o">
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <p>Ride Your Own Car</p>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <ul class="ride-select-option">
                                        <li><input class="check-input" type="checkbox" id="checkbox1" name="checkbox01">
                                            <label for="checkbox1"></label>
                                        </li>
                                        <li>
                                            <input class="check-input-2" type="checkbox" id="checkbox2" name="checkbox01">
                                            <label for="checkbox2"></label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-type" class="ride-label">Car Type <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input type="text" class="form-control" name="car_type" value="{{ $data->vd->car_type }}">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-plate" class="ride-label">Car Plate No <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input type="text" class="form-control" name="car_plate_no" value="{{ $data->vd->car_plate_no }}">
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-luggage" class="ride-label">MAXIMUM LUGGAGE <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input type="text" class="form-control" name="luggage_limit" value="{{ $data->vd->luggage_limit }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-2 col-sm-12 col-xs-12 col-xs-offset-0  ride-offer-button">
                            <ul class="get-ride-feature">
                                <li>
                                    <span class="left-ride-feature">Pets</span>
										<span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox4" name="checkbox01">
			        						<label for="checkbox4"></label>
											<input class="check-input" type="checkbox" id="checkbox3" name="checkbox01">
			        						<label for="checkbox3"></label>
										</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Music</span>
										<span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox5" name="checkbox01">
			        						<label for="checkbox5"></label>
											<input class="check-input" type="checkbox" id="checkbox6" name="checkbox01">
			        						<label for="checkbox6"></label>
										</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Smoking</span>
										<span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox7" name="checkbox01">
			        						<label for="checkbox7"></label>
											<input class="check-input" type="checkbox" id="checkbox8" name="checkbox01">
			        						<label for="checkbox8"></label>
										</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Max.2 in Back Seat </span>
										<span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox9" name="checkbox01">
			        						<label for="checkbox9"></label>
											<input class="check-input" type="checkbox" id="checkbox13" name="checkbox01">
			        						<label for="checkbox13"></label>
										</span>
                                </li>
                            </ul>
                            <button class="btn btn-info btn-offer">Add More <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="get-ride-offer-button text-center clearfix">
                        <button class="btn btn-info btn-offer" type="submit">Save</button>
                        <button class="btn btn-info btn-offer get-ride-button-cancel" type="button"><a style="color: #ffffff" href="{{ url('/d/ride-details/'.$data->id) }}">Cancel</a></button>
                    </div>
                    <!-- end ride description -->
                </div>
            </div>
        </div>
    </form>
    <!-- end offer a ride -->

    @endsection