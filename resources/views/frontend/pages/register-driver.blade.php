@extends('frontend.layout')
@section('content')

    <!-- sign in page -->
    <div class="get-offer-ride">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 sign-in-get-ad padding-left-o padding-right-o">
                    <h3 class="get-popular-list">Join</h3>
                    <h3 class="highlight">With Us Today!</h3>
                </div>
                <!-- search result page -->
                <form action="#">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="pasword" class="form-control" placeholder="Pasword" required="required">
                        </div>
                        <div class="form-group get-sign-up-mate">
                            <label for="date-of-birth">Date Of Birth</label>
                            <div class="col-sm-3 padding-left-o">
                                <select name="" id="" class="get-select-picker" title="Day">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>

                            </div>
                            <div class="col-sm-3">
                                <select name="" id="" class="get-select-picker" title="Month">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="" id="" class="get-select-picker" title="Year">
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Confirm Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="pasword" class="form-control" placeholder="Confirm Password" required="required">
                        </div>
                        <div class="form-group get-sign-up-mate">
                            <label for="gender">Gender</label>
                            <select name="" id="" class="get-select-picker" title="Gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" required="required">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Car’s Plate Reg No." required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Driving License No." required="required">
                        </div>
                    </div>
                    <div class="col-sm-2 sign-up-order-mm">
                        <div class="form-group">
                            <input type="text" class="form-control datepicker-f" placeholder="MM/YY">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group get-sign-up-mate">
                            <label for="upload-driving-licence">Upload Driving Lience</label>
                            <div class="file btn btn-sm btn-primary">
                                <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div><span>Upload jpg , png , .pdf</span>
                                <input type="file" class="input-upload" name="file">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 padding-left-o">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Identity Card No." required="required">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="remember-me-option">
                            <input type="checkbox" id="checkbox1" name="checkbox01">
                            <label for="checkbox1">I Agree to the <a href="#">Privacy Agreement</a> & <a href="#" class="sinuo-class">Terms of Conditions</a>.</label>
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