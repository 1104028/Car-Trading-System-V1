<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Trading System | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="{{asset('Admin/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('Admin/css/AdminLTE.min.css')}}">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Car trading system admin Login</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Welcome</p>
            <form method="POST" action="{{ route('adminloginpost') }}">
                    {{ csrf_field() }}
                <div class="form-group has-feedback">
                  
                        <input class="form-control text-box single-line" data-val="true" data-val-required="User Name required" id="UserName" name="UserName" placeholder="User Name" type="text" value="" />
                        <span class="field-validation-valid text-danger" data-valmsg-for="UserName" data-valmsg-replace="true"></span>

                </div>
                <div class="form-group has-feedback">
                    
                        <input class="form-control text-box single-line password" data-val="true" data-val-minlength="Minimum 6 characters required" data-val-minlength-min="6" data-val-required="Password is required" id="Password" name="Password" placeholder="Password" type="password" value="" />
                        <span class="field-validation-valid text-danger" data-valmsg-for="Password" data-valmsg-replace="true"></span>

                </div>
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-6">
                        <div class="checkbox icheck">
                                <input class="check-box" data-val="true" data-val-required="The RememberMe field is required." id="RememberMe" name="RememberMe" type="checkbox" value="true" /><input name="RememberMe" type="hidden" value="false" /> Remember Me
                                <span class="field-validation-valid text-danger" data-valmsg-for="RememberMe" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <input type="submit" value="Log In" class="btn btn-primary btn-block btn-flat" />
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-1"></div>
                </div>

            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <script src="{{asset('Admin/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('Admin/js/bootstrap.min.js')}}" type="text/javascript"></script>

</body>
</html>





