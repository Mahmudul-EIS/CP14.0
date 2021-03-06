@extends('frontend.layout')
@section('content')
    <!-- offer a ride -->
   <form action="{{ url('d/offer-ride') }}" method="post">
            {{csrf_field()}}
        <div class="get-offer-ride">
            <div class="container">
                <div class="row">
                    <h3 class="get-ride-title">Offer a Ride</h3>
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
                                <input name="origin" type="text" id="origin-input" placeholder="Enter a departure location" class="form-control" required="required" @if(isset($data->from)) value="{{ $data->from }}" readonly @else value="{{ old('origin') }}"  @endif>
                            </div>
                            <div class="form-group">
                                <label for="pickup-point">Destination</label>
                                <input name="destination" type="text" id="destination-input" placeholder="Enter a destination location" class="form-control" required="required" @if(isset($data->to)) value="{{ $data->to }}" readonly @else value="{{ old('destination') }}"  @endif>
                            </div>
                            <div class="col-sm-6 padding-left-o">
                                <div class="form-group">
                                    <label for="price">Price Per seat</label>
                                    <input name="price_per_seat" type="text" placeholder="$200" class="form-control form-control-placeholder" required="required" value="{{ old('price_per_seat') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="number-of-seat">Number Of Seats</label>
                                    <select name="total_seats" id="" class="get-select-picker" title="Seats" required>
                                        <option value="1" @if(old('total_seats') == 1) selected @endif>1 Seat</option>
                                        <option value="2" @if(old('total_seats') == 2) selected @endif>2 Seats</option>
                                        <option value="3" @if(old('total_seats') == 3) selected @endif>3 Seats</option>
                                        <option value="4" @if(old('total_seats') == 4) selected @endif>4 Seats</option>
                                        <option value="5" @if(old('total_seats') == 5) selected @endif>5 Seats</option>
                                    </select>
                                    @if(isset($data->seat_required)) <input type="hidden" name="seat_booked" value="{{ $data->seat_required }}"> @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pick--get-atime">
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Departure Time</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input name="d_date" type="text" class="form-control datepicker-f" placeholder="Pick a Date" required="required" @if(isset($data->departure_date)) value="{{ date('Y-m-d', strtotime($data->departure_date)) }}" readonly @else value="{{ old('d_date') }}" @endif>
                                </div>
                                <div class="col-sm-3">
                                    <input name="d_hour" type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" required="required" @if(isset($data->departure_date)) value="{{ date('H', strtotime($data->departure_date)) }}" readonly @else value="{{ old('d_hour') }}" @endif>
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input name="d_minute" type="text" class="form-control timepicker-mm" placeholder="Min:MM" required="required" @if(isset($data->departure_date)) value="{{ date('i', strtotime($data->departure_date)) }}" readonly @else value="{{ old('d_minute') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group pick-get-time">
                                <label for="departure-time">Arrival Time(Optional)</label>
                                <div class="col-sm-6 padding-left-o">
                                    <input name="a_date" type="text" class="form-control datepicker-f" placeholder="Pick a Date" required="required" @if(isset($data->departure_date)) value="{{ date('Y-m-d', strtotime($data->departure_date)) }}" @else value="{{ old('a_date') }}" @endif>
                                </div>
                                <div class="col-sm-3">
                                    <input name="a_hour" type="text" class="form-control timepicker-hh" placeholder="Hrs:HH" required="required" @if(isset($data->departure_date)) value="{{ date('H', strtotime($data->departure_date)) + 1 }}" @else value="{{ old('a_hour') }}" @endif>
                                </div>
                                <div class="col-sm-3 padding-right-o">
                                    <input name="a_minute" type="text" class="form-control timepicker-mm" placeholder="Min:MM" required="required" @if(isset($data->departure_date)) value="{{ date('i', strtotime($data->departure_date)) }}" @else value="{{ old('a_minute') }}" @endif>
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
                                    <input name="car_type" id="car-type" type="text" class="form-control" @if(isset($vd->car_type)) value="{{ $vd->car_type }}" @else value="{{ old('car_type') }}" @endif>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-plate" class="ride-label">Car Plate No <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="car_plate_no" id="car-plate" type="text" class="form-control" @if(isset($vd->car_plate_no)) value="{{ $vd->car_plate_no }}" @else value="{{ old('car_plate_no') }}"  readonly @endif>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div class="col-sm-6 padding-left-o">
                                    <label for="car-luggage" class="ride-label">MAXIMUM LUGGAGE <span class="right-into">:</span></label>
                                </div>
                                <div class="col-sm-6 padding-ride-o">
                                    <input name="luggage_limit" id="car-luggage" type="text" class="form-control" @if(isset($vd->luggage_limit)) value="{{ $vd->luggage_limit }}" @else value="{{ old('luggage_limit') }}"  @endif>
                                </div>
                            </div>
                            @if(isset($vd))<input type="hidden" name="vd_action" id="vd_action" value="edit"><input type="hidden" name="vd_id" value="{{ $vd->id }}">@else <input type="hidden" id="vd_action" name="vd_action" value="add"> @endif
                        </div>
                        <div class="col-md-3 col-md-offset-2 col-sm-12 col-xs-12 col-xs-offset-0 ride-offer-button">
                            <ul class="get-ride-feature">
                                <li>
                                    <span class="left-ride-feature">Pets</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox4" name="checkbox01" @if(old('pets') == 'no') checked @endif>
			        						<label class="red-color @if(old('pets') == 'no') add-radio-color @endif" id="pets-red" for="checkbox4"></label>
											<input class="check-input" type="checkbox" id="checkbox3" name="checkbox01" @if(old('pets') == 'yes') checked @endif>
			        						<label class="green-color @if(old('pets') == 'yes') add-green-color @endif" id="pets-green" for="checkbox3"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Music</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox5" name="checkbox01"  @if(old('music') == 'no') checked @endif>
			        						<label class="red-color @if(old('music') == 'no') add-radio-color @endif" id="music-red" for="checkbox5"></label>
											<input class="check-input" type="checkbox" id="checkbox6" name="checkbox01" @if(old('music') == 'yes') checked @endif>
			        						<label class="green-color @if(old('music') == 'yes') add-green-color @endif" id="music-green" for="checkbox6"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Smoking</span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox7" name="checkbox01" @if(old('smoking') == 'no') checked @endif>
			        						<label class="red-color @if(old('smoking') == 'no') add-radio-color @endif" id="smoking-red" for="checkbox7"></label>
											<input class="check-input" type="checkbox" id="checkbox8" name="checkbox01" @if(old('smoking') == 'yes') checked @endif>
			        						<label class="green-color @if(old('smoking') == 'yes') add-green-color @endif" id="smoking-green" for="checkbox8"></label>
									</span>
                                </li>
                                <li>
                                    <span class="left-ride-feature">Max.2 in Back Seat </span>
                                    <span class="right-ride-feature">
											<input class="check-input-2" type="checkbox" id="checkbox9" name="checkbox01" @if(old('back_seat') == 'no') checked @endif>
			        						<label class="red-color @if(old('back_seat') == 'no') add-radio-color @endif" id="back-red" for="checkbox9"></label>
											<input class="check-input" type="checkbox" id="checkbox10" name="checkbox01" @if(old('back_seat') == 'yes') checked @endif>
			        						<label class="green-color @if(old('back_seat') == 'yes') add-green-color @endif" id="back-green" for="checkbox10"></label>
									</span>
                                </li>
                            </ul>
                            <input type="hidden" name="pets" id="pets" value="{{ old('pets') }}">
                            <input type="hidden" name="music" id="music" value="{{ old('music') }}">
                            <input type="hidden" name="smoking" id="smoking" value="{{ old('smoking') }}">
                            <input type="hidden" name="back_seat" id="back" value="{{ old('back_seat') }}">
                            <p id="added-items"></p>
                            <input type="hidden" name="total" id="total">
                            <button type="button" id="add-more" data-toggle="modal" data-target="#myModalx" class="btn btn-info btn-offer">Add More <i class="fas fa-plus"></i></button>
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
    <div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add More</h4>
                </div>
                <form id="item-save">
                    <div class="modal-body">
                        <div class="col-sm-12 padding-left-o padding-right-0">
                            <div class="form-group">
                                <input type="text" id="item-name" class="form-control" placeholder="Enter Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer login-modal-footer">
                        <button type="submit" class="btn btn-info btn-offer">Save</button>
                        <button type="button" class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection