@extends('frontend.layout')
@section('content')

    <!-- sign in page -->
    <div class="get-offer-ride">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 sign-in-get-ad padding-left-o padding-right-o">
                    <h3 class="get-popular-list">Rider</h3>
                    <h3 class="highlight">Register!!</h3>
                </div>
                @if($errors->any())
                    @foreach($errors->usd->all() as $error)
                        <p class="alert alert-danger">
                            {{ $error }}
                        </p>
                    @endforeach
                @endif
                <!-- search result page -->
                <form action="{{ url('/sign-up/customer') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="First Name" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                        </div>
                        <div class="form-group get-sign-up-mate">
                            <label for="date-of-birth">Date Of Birth</label>
                            <div class="col-sm-3 padding-left-o">
                                <select name="day" id="" class="get-select-picker" title="Day">
                                    @for($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="month" id="" class="get-select-picker" title="Month">
                                    @for($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="year" id="" class="get-select-picker" title="Year">
                                    @for($i = 1930; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" name="reemail" class="form-control" placeholder="Confirm Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="repass" class="form-control" placeholder="Confirm Password" required="required">
                        </div>
                        <div class="form-group get-sign-up-mate">
                            <label for="gender">Gender</label>
                            <select name="gender" class="get-select-picker" title="Gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Address" required="required">
                        </div>
                    </div>
                    <div class="col-sm-12 padding-left-o">
                        <div class="col-sm-6 pad-xs-o">
                            <div class="form-group">
                                <input type="text" name="id_card" class="form-control" placeholder="Identity Card No." required="required">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="remember-me-option">
                            <input type="checkbox" id="checkbox1" name="checkbox">
                            <label for="checkbox1">I Agree to the <a href="#">Privacy Agreement</a> & <a href="#">Terms of Conditions</a>.</label>
                        </div>
                        <div class="sign-in-option-get">
                            <button class="btn btn-info btn-offer">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end signin page -->

    @endsection