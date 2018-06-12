@extends('admin.layout')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Lists</h1>
            </div>
        </div><!--/.row-->



        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>01</td>
                                <td>John Doe</td>
                                <td>john.doe@gmail.com</td>
                                <td><span class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps">Edit</span></td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>John Doe</td>
                                <td>john.doe@gmail.com</td>
                                <td><span class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps">Edit</span></td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>John Doe</td>
                                <td>john.doe@gmail.com</td>
                                <td><span class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps">Edit</span></td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>John Doe</td>
                                <td>john.doe@gmail.com</td>
                                <td><span class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps">Edit</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <p class="back-link">© 2018. All rights reserved</p>
        </div>
    </div>	<!--/.main-->

@endsection