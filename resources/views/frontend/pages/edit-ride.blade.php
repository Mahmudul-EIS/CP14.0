@extends('frontend.layout')
@section('content')

    <!-- offer a ride -->
    <form method="post" action="{{ url('/d/edit-ride/'.$data->link) }}">
        {{ csrf_field() }}
        <div class="get-offer-ride">
            <div class="container">
                <div class="row">
                    <h3 class="get-ride-title">Offer a Ride (Edit Details)</h3>
                    <div class="col-sm-6">
                        @include('frontend.includes.messages')
                        @if(isset($errors))
                            @foreach($errors as $error)
                                <p class="alert alert-danger">
                                    {{ $error }}
                                </p>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="get-form-offer">
                        <div class="col-sm-6 padding-left-o price-seat">
                            <div class="form-group">
                                <label for="pickup-point">Pickup Point</label>
                                <input name="origin" type="text" id="origin-input" class="form-control" value="{{ $data->origin }}">
                            </div>
                            <div class="form-group">
                                <label for="pickup-point">Destination</label>
                                <input name="destination" type="text" id="destination-input" class="form-control" value="{{ $data->destination }}">
                            </div>
                            <div class="col-sm-6 padding-left-o">
                                <div class="form-group">
                                    <label for="price">Price Per seat</label>
                                    <input name="price_per_seat" type="text" placeholder="$200" class="form-control form-control-placeholder" value="{{ $data->price_per_seat }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="number-of-seat">Number Of Seats</label>
                                    <select name="total_seats" id="" class="get-select-picker" title="Seats">
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
                                    <input name="d_date" type="text" class="form-control datepicker-f" placeholder="Pick a Date" value="{{ date('Y-m-d', strtotime($data->departure_time)) }}">
                                </div>
                                <div class="col-sm-3">
                                    <input name="d_hour" type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" value="{{ date('H', strtotime($data->departure_time)) }}">
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input name="d_minute" type="text" class="form-control timepicker-mm" placeholder="Min:MM" value="{{ date('i A', strtotime($data->departure_time)) }}">
                                </div>
                            </div>
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Arrival Time(Optional)</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input name="a_date" type="text" class="form-control datepicker-f" placeholder="Pick a Date" value="{{ date('Y-m-d', strtotime($data->arrival_time)) }}">
                                </div>
                                <div class="col-sm-3">
                                    <input name="a_hour" type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" value="{{ date('H', strtotime($data->arrival_time)) }}">
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input name="a_minute" type="text" class="form-control timepicker-mm" placeholder="Min:MM" value="{{ date('i A', strtotime($data->arrival_time)) }}">
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
                                            <label class="green-color @if(isset($data->vd)) add-green-color @endif" id="own-vehicle-green" for="checkbox1"></label>
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
                                    <input name="car_type" id="car-type" type="text" class="form-control" @if(isset($data->vd->car_type)) value="{{ $data->vd->car_type }}" @else value="{{ old('car_type') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-plate" class="ride-label">Car Plate No <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="car_plate_no" id="car-plate" type="text" class="form-control" @if(isset($data->vd->car_plate_no)) value="{{ $data->vd->car_plate_no }}" @else value="{{ old('car_plate_no') }}"  readonly @endif>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-luggage" class="ride-label">MAXIMUM LUGGAGE <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="luggage_limit" id="car-luggage" type="text" class="form-control" @if(isset($data->vd->luggage_limit)) value="{{ $data->vd->luggage_limit }}" @else value="{{ old('car_plate_no') }}"  @endif>
                                </div>
                            </div>
                            @if(isset($data->vd))<input type="hidden" name="vd_action" id="vd_action" value="edit"><input type="hidden" name="vd_id" value="{{ $data->vd->id }}">@else <input type="hidden" id="vd_action" name="vd_action" value="add"> @endif
                        </div>
                        <div class="col-md-3 col-md-offset-2 col-sm-12 col-xs-12 col-xs-offset-0 ride-offer-button">
                            <ul class="get-ride-feature">
                                <li>
                                    <span class="left-ride-feature">Pets</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox4" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'pets' && $rd->value == 'no') checked @endif @endforeach>
			        						<label class="red-color @foreach($data->rd as $rd)@if($rd->key == 'pets' && $rd->value == 'no') add-radio-color @endif @endforeach" id="pets-red" for="checkbox4"></label>
											<input class="check-input" type="checkbox" id="checkbox3" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'pets' && $rd->value == 'yes') checked @endif @endforeach>
			        						<label class="green-color @foreach($data->rd as $rd)@if($rd->key == 'pets' && $rd->value == 'yes') add-green-color @endif @endforeach" id="pets-green" for="checkbox3"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Music</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox5" name="checkbox01"  @foreach($data->rd as $rd)@if($rd->key == 'music' && $rd->value == 'no') checked @endif @endforeach>
			        						<label class="red-color @foreach($data->rd as $rd)@if($rd->key == 'music' && $rd->value == 'no') add-radio-color @endif @endforeach" id="music-red" for="checkbox5"></label>
											<input class="check-input" type="checkbox" id="checkbox6" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'music' && $rd->value == 'yes') checked @endif @endforeach>
			        						<label class="green-color @foreach($data->rd as $rd)@if($rd->key == 'music' && $rd->value == 'yes') add-green-color @endif @endforeach" id="music-green" for="checkbox6"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Smoking</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox7" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'smoking' && $rd->value == 'no') checked @endif @endforeach>
			        						<label class="red-color @foreach($data->rd as $rd)@if($rd->key == 'smoking' && $rd->value == 'no') add-radio-color @endif @endforeach" id="smoking-red" for="checkbox7"></label>
											<input class="check-input" type="checkbox" id="checkbox8" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'smoking' && $rd->value == 'yes') checked @endif @endforeach>
			        						<label class="green-color @foreach($data->rd as $rd)@if($rd->key == 'smoking' && $rd->value == 'yes') add-green-color @endif @endforeach" id="smoking-green" for="checkbox8"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Max.2 in Back Seat </span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox9" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'back_seat' && $rd->value == 'no') checked @endif @endforeach>
			        						<label class="red-color @foreach($data->rd as $rd)@if($rd->key == 'back_seat' && $rd->value == 'no') add-radio-color @endif @endforeach" id="back-red" for="checkbox9"></label>
											<input class="check-input" type="checkbox" id="checkbox10" name="checkbox01" @foreach($data->rd as $rd)@if($rd->key == 'back_seat' && $rd->value == 'yes') checked @endif @endforeach>
			        						<label class="green-color @foreach($data->rd as $rd)@if($rd->key == 'back_seat' && $rd->value == 'yes') add-green-color @endif @endforeach" id="back-green" for="checkbox10"></label>
									</span>
                                </li>
                            </ul>
                            <input type="hidden" name="pets" id="pets" value="@foreach($data->rd as $rd)@if($rd->key == 'pets') {{ $rd->value }} @endif @endforeach">
                            <input type="hidden" name="music" id="music" value="@foreach($data->rd as $rd)@if($rd->key == 'music') {{ $rd->value }} @endif @endforeach">
                            <input type="hidden" name="smoking" id="smoking" value="@foreach($data->rd as $rd)@if($rd->key == 'smoking') {{ $rd->value }} @endif @endforeach">
                            <input type="hidden" name="back_seat" id="back" value="@foreach($data->rd as $rd)@if($rd->key == 'back_seat') {{ $rd->value }} @endif @endforeach">
                            <input type="hidden" name="ride_id" value="{{ $data->id }}">
                            <button type="button" class="btn btn-info btn-offer">Add More <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="get-ride-offer-button text-center clearfix">
                        <button class="btn btn-info btn-offer" type="submit">Save</button>
                        <button class="btn btn-info btn-offer get-ride-button-cancel" type="button"><a style="color: #ffffff" href="{{ url('/d/ride-details/'.$data->link) }}">Cancel</a></button>
                    </div>
                    <!-- end ride description -->
                </div>
            </div>
        </div>
    </form>
    <!-- end offer a ride -->

    @endsection