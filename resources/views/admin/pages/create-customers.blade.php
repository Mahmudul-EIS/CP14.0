@extends('admin.layout')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Customer</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                @include('admin.includes.messages')
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">
                            {{ $error }}
                        </p>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" action="{{ url('/admin/create-driver') }}" role="form">
                            <fieldset>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter User Name" name="name" type="text" required="" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Last Name" name="last_name" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your Email" name="email" type="email" autofocus="" required="" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Re-type Password" name="repass" type="password" value="" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control datepicker-f" placeholder="MM/YY" name="dob" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Id Card No" name="id_card" value="">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="get-select-picker" title="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="upload-driving-licence">Upload Picture</label>
                                    <div class="file">
                                        <input type="file" class="" name="picture">
                                    </div>
                                </div>
                                <button class="btn btn-info btn-offer" type="submit">Create</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <p class="back-link">© 2018. All rights reserved</p>
        </div>
    </div>	<!--/.main-->

    @endsection