@extends('frontend.layout')
@section('content')
    <!--ridemate profile -->
    <div class="get-offer-ride  get-ride-mate-profile">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 padding-left-o">
                    <h3 class="get-popular-list">Edit Profile</h3>
                </div>
                <div class="col-sm-8 col-xs-12 price-seat">
                    <!-- eidt ridemate profile -->
                    <button class="btn btn-info btn-offer edit-badge-area">Edit Info <img src="img/file.png" alt=""></button>
                    <!-- notification popupbar -->
                    <div class="get-edit-profile">
                        <ul class="edit-profile-option">
                            <li><a href="{{ url('d/profile/edit/'.$user->id) }}">Edit Profile</a></li>
                            <li data-toggle="modal" data-target="#myModalx">Change Password</li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{ url('d/profile/edit/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="clearfix">
                    <!-- end edit ridemate profile -->
                    <div class="col-sm-8 col-xs-12 ride--profile padding-left-o">
                        <div class="get-ridemate-user ">
                            <div class="user-edit-picture img-result user-icon" data-toggle="modal" data-target="#myModalimg">
                                <img class="image-upload-hide" src="img/user/user-1.jpg" alt="">
                                <img class="cropped" src="" alt="">
                                <div class="image-hover open-popup-image">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="user-details">
                                <div class="form-group">
                                    <label for="ridemate-name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Your Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="ridemate-email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Your Email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ridemate-email">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $usd->address }}" placeholder="Your Address">
                                </div>
                                <div class="form-group get-sign-up-mate">
                                    <label for="ridemate-name">Age</label>
                                    <div class="col-sm-3 padding-left-o">
                                        <select name="day" id="" class="get-select-picker" title="Day">
                                            @for($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}" @if(date_format(new DateTime($usd->dob), 'd') == $i){{ 'selected'  }}@endif>{{ $i }}</option>
                                            @endfor
                                        </select>

                                    </div>
                                    <div class="col-sm-3">
                                        <select name="month" id="" class="get-select-picker" title="Month">
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}" @if(date_format(new DateTime($usd->dob), 'm') == $i){{ 'selected'  }}@endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="year" id="" class="get-select-picker" title="Year">
                                            @for($i = 1930; $i <= date('Y'); $i++)
                                                <option value="{{ $i }}" @if(date_format(new DateTime($usd->dob), 'Y') == $i){{ 'selected'  }}@endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group get-sign-up-mate">
                                    <label for="ridemate-gender">Gender</label>
                                    <select name="gender" id="" class="get-select-picker" title="Gender">
                                        <option value="male" @if($usd->gender == 'male'){{ 'selected' }} @else {{ ''  }} @endif>Male</option>
                                        <option value="female" @if($usd->gender == 'female'){{ 'selected' }} @else {{ ''  }} @endif>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ridemate-contact">Contact Number</label>
                                    <input type="text" name="contact" class="form-control" value="{{ $usd->contact }}" placeholder="Your Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="ridemate-contact">Car Registration</label>
                                    <input type="text" name="car_reg" class="form-control" value="{{ $dd->car_reg }}" placeholder="Your Car Registration">
                                </div>
                                <div class="form-group">
                                    <label for="ridemate-dle">Driving License No. & Expiry Date</label>
                                    <div class="col-sm-8 col-xs-12 main--form padding-left-o">
                                        <input type="text" name="driving_license" class="form-control" value="{{ $dd->driving_license }}" placeholder="Your Driving Licence">
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <input type="text" name="expiry" class="form-control" value="{{ date('m/Y',strtotime($dd->expiry)) }}" placeholder="mm/yy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ridemate-identi">Identification No.</label>
                                    <input type="text" name="id_card" class="form-control" value="{{ $usd->id_card }}" placeholder="Your Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ridemate-option-get text-center sign-in-option-get clearfix">
                    <button type="submit" class="btn btn-info btn-offer">Save</button>
                    <button type="button" class="btn btn-info btn-offer join-us-sign-in">Cancel</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- end ridemate profile area  -->

    <!-- Credit card information -->

    <div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                </div>
                <form action="{{ url('d/profile/edit/password/'.$user->id) }}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="col-sm-12 padding-left-o padding-right-0">
                            <div class="form-group">
                                <input type="password" name="oldpass" class="form-control" placeholder="Old Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="newpass" class="form-control" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="repass" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer login-modal-footer">
                        <button type="submit" class="btn btn-info btn-offer">Confirm</button>
                        <button type="button" class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end credit card payment popup -->


    <!-- image upload popup -->

    <div class="modal fade income-statement-popup" id="myModalimg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload Your Profile Picture</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('d/profile/edit/image/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <!-- input file -->
                        <div class="box">
                            <input type="file" id="file-input" name="picture">
                        </div>
                        <!-- leftbox -->
                        <div class="modal-footer login-modal-footer">
                            <button type="submit" class="btn btn-info btn-offer">Confirm</button>
                            <button type="button" class="btn btn-info btn-offer" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer income-modal-footer clearfix">
                </div>
            </div>
        </div>
    </div>
    <!-- end income Statement popup -->
    @endsection