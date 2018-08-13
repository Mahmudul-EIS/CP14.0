@extends('frontend.layout')
@section('content')

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <h2 class="get-section-header">My Requests</h2>
                <div class="col-sm-12">
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
                <form method="post" id="delete-req" action="{{ url('/c/delete-request') }}">
                    {{ csrf_field() }}
                <h3>Active Requests</h3>
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <tbody>
                        @foreach($data as $d)
                            @if(empty($data->offer))
                        <tr>
                            <td><div class="table-form-form"><span>From :</span> <span class="right-text">{{ $d->from }}</span></div></td>
                            <td><div class="table-form-to"><span>To :</span> <span class="right-text">{{ $d->to }}</span></div></td>
                            <td><div class="table-form-req"><span>Requested Seats :</span> {{ $d->seat_required }} Seats</div></td>
                            <td><div class="table-form-req"><span>Date :</span> {{ date('d-M-Y H:i A', strtotime($d->departure_date)) }}</div></td>
                            <td>
                                <input type="checkbox" id="checkbox{{ $d->id }}" name="delete_req[]" value="{{ $d->id }}">
                                <label for="checkbox{{ $d->id }}"></label>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    <h3>Expired Requests</h3>
                    <p>Your expired requests will be removed automatically within one week.</p>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <tbody>
                            @foreach($ex_data as $d)
                                <tr>
                                    <td><div class="table-form-form"><span>From :</span> <span class="right-text">{{ $d->from }}</span></div></td>
                                    <td><div class="table-form-to"><span>To :</span> <span class="right-text">{{ $d->to }}</span></div></td>
                                    <td><div class="table-form-req"><span>Requested Seats :</span> {{ $d->seat_required }} Seats</div></td>
                                    <td><div class="table-form-req"><span>Date :</span> {{ date('d-M-Y H:i A', strtotime($d->departure_date)) }}</div></td>
                                    <td>
                                        <input type="checkbox" id="checkbox{{ $d->id }}" name="delete_req[]" value="{{ $d->id }}">
                                        <label for="checkbox{{ $d->id }}"></label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="get-add-request">
                    <button type="submit" class="btn btn-info btn-offer" form="delete-req">Delete Request</button>
                    <button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModal2">Add Request</button>
                </div>
            </div>
        </div>
    </div>

    @endsection