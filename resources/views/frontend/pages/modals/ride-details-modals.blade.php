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
                <a href="{{ url('/sign-up/customer') }}"><button class="btn btn-info btn-offer ">Login</button></a>
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
                <form method="post" action="{{ route('ride_details', $data->id) }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success btn-offer" name="start_ride">Yes</button>
                    <button class="btn btn-danger btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(Auth::check() && Auth::user()->role == 'driver')
@if(isset($data->bookings))
    @foreach($data->bookings as $b)
<!--Add Riders in Seats details -->
<div class="modal fade" id="myModalnsx{{ $b->user_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Rider Information</h4>
            </div>
            <div class="modal-body rider-details-ridemate">
                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Name <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span>{{ $b->requester->name }} {{ $b->ud->last_name }}</span>
                    </div>
                </div>
                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Email <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span>{{ $b->requester->email }}</span>
                    </div>
                </div>

                <div class="ridemate-name-area">
                    <div class="ridemate-name">
                        Gender <span class="ridemate-right">:</span>
                    </div>
                    <div class="ridemate-name-xs">
                        <span>{{ $b->ud->gender }}</span>
                    </div>
                </div>
                <div class="ridemate-name-area">
                    <div class="ridemate-popup">
                        Rider Add/Cancel Information<span class="ridemate-right">:</span>
                    </div>
                </div>
                <div class="ridemate-name-area">
                    @if($b->status != 'confirmed')
                    <form id="confirm-book" method="post" action="{{ url('/d/confirm-bookings') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="book_id" value="{{ $b->id }}">
                        <input type="hidden" name="link" value="{{ $data->link }}">
                        <input type="hidden" name="status" value="confirmed">
                    </form>
                    @endif
                    <form method="post" action="{{ url('/d/cancel-bookings') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="book_id" value="{{ $b->id }}">
                        <input type="hidden" name="link" value="{{ $data->link }}">
                        <input type="hidden" name="status" value="rejected">
                    </form>
                    <div class="ridemate-popup">
                        @if($b->status != 'confirmed')
                        <button type="submit" form="confirm-book" class="btn btn-info btn-offer ride-popup-ride-button">Confirm Booking</button>
                        @endif
                        <button class="btn btn-info btn-offer ride-popup-ride-button"  data-dismiss="modal">Cancel Booking</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endforeach
    @endif
    @endif