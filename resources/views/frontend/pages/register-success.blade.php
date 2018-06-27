@extends('frontend.layout')
@section('content')

    <!-- get join with us -->

    <div class="get-join-with-us">
        <div class="container">
            <div class="row">
                <div class="join-section-title">
                    <h2>Thank You</h2>
                    <h3>For Signing Up with GetWobo !</h3>
                </div>
                <div class="col-sm-12">
                    <h3 class="">An email with verification link has been sent to you. Please verify to <a class="" href="{{ url('/login') }}">login.</a></h3>
                </div>
            </div>
        </div>
    </div>

    @endsection