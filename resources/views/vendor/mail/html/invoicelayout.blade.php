<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Car Trading System | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="{{asset('Admin/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{asset('Admin/css/font-awesome.min.css')}}">
    <!-- Ionicons -->

    <link rel="stylesheet" href="{{asset('Admin/css/ionicons.min.css')}}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{asset('Admin/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/ListStylesRuku.css')}}">

    <link rel="stylesheet" href="{{asset('Admin/css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/morris.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/bootstrap3-wysihtml5.min.css')}}">
    <style>
            .height {
                min-height: 200px;
            }
    
            .icon {
                font-size: 47px;
                color: #5CB85C;
            }
    
            .iconbig {
                font-size: 77px;
                color: #5CB85C;
            }
    
            td {
                font-size: 20px;
            }
    
            .table > tbody > tr > .emptyrow {
                border-top: none;
            }
    
            .table > thead > tr > .emptyrow {
                border-bottom: none;
            }
    
            .table > tbody > tr > .highrow {
                border-top: 3px solid;
            }
        </style>
    
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    {{ $header or '' }}

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}

                                        {{ $subcopy or '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer or '' }}
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
