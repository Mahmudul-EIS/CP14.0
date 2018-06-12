<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GetWobo - Login</title>
    <link href="{{ asset('public/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/admin/css/styles.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('public/assets/admin/js/html5shiv.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <h3 class="text-center get-logo-text"><span>Get</span>Wobo.</h3>
            <div class="login-panel panel bottom-panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <a href="index.html" class="btn btn-info btn-offer">Login</a>
                            <a href="index.html" class="btn btn-info btn-offer">Cancel</a>
                            <div class="clearfix"></div>
                            <a href="#" class="text-center forget-admin">Forget Password</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>


<script src="{{ asset('public/assets/admin/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap.min.js') }}"></script>
</body>
</html>
