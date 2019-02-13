<!DOCTYPE html>
<html>

<head>
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

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="@Url.Action(" Index ", "Administrator ")" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CT</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Car</b>Trading</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" data-toggle="push-menu">

            </a>
            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{Auth::user()->UserFullName}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Change password</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                        Sign out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                            </li>
                        </ul>

                    </li>
                </ul>

            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <style>
                    a {
                        font-size: 15px;
                    }
                </style>
                <li class="treeview">
                    <a href="#">

                        <span>Admin</span>

                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="{{ route('registration') }}"></i>All Admins</a></li> --}}
                        <li><a href="{{ route('registration') }}"></i>Registration</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Best Seller</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('bestseller.index') }}">Best Cars</a></li>
                        <li><a href="{{ route('bestseller.create') }}">Add a Car</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">

                        <span>Body Type</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('bodytype.index') }}">All Body Types</a></li>
                        <li><a href="{{ route('bodytype.create') }}">Add Body Type</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Brand</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('brand.index') }}"></i>All Brands</a></li>
                        <li><a href="{{ route('brand.create') }}"></i>Add Brand</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Car</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('car.index') }}">All Cars</a></li>
                        <li><a href="{{ route('car.create') }}">Add Car</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Messages</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('contacts.index') }}">All Messages</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <span>Maker</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('company.index') }}">All Makers</a></li>
                        <li><a href="{{ route('company.create') }}">Add Maker</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">

                        <span>Country</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('country.index') }}">All Countries</a></li>
                        <li><a href="{{ route('country.create') }}">Add Country</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Company Informations</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('clientinfo.create') }}">Update</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <span>Email Configurations</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('emailconfigurations.create') }}">Update</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <span>Latest Car</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('latestcar.index') }}">Latest Cars</a></li>
                        <li><a href="{{ route('latestcar.create') }}">Add a Car</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Orders</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('order.index') }}"></i>All Orders</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">

                        <span>Seaport</span>

                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('seaport.index') }}"></i>All Seaports</a></li>
                        <li><a href="{{ route('seaport.create') }}"></i>Add Seaport</a></li>

                    </ul>
                </li>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


</div>
<script src="{{asset('Admin/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/js/adminlte.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/grid-gallery.min.js')}}" type="text/javascript"></script>
@yield('additionalScript')
</body>

</html>