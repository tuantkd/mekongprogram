<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon image -->
    <link rel="icon" type = "image/png" sizes = "32x32" href = "{{ asset('public/dist/img/logo-mekong.png') }}">
    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- Ckeditor 4 -->
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('public/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('public/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('public/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <!-- Bootstrap-datepicker -->
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



    <style type="text/css" media="screen">
        table {
            margin: 5;
            padding: 0;
            width: 100%;
            table-layout: auto;

        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .10em;
        }

        table th,
        table td {
            padding: .200em;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        table th {
            font-size: 12px;
            text-transform: uppercase;
            color: black;font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                width: 100%;
            }

            table thead {
                clip: rect(0 0 0 0);
                height: 1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
            }

            table tr {
                display: block;
                margin-bottom: 15px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .6em;
                text-align: right;

            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
                border: 1px solid #ddd;
            }
        }

        /*error jquery*/
        .error{
            color:red;
            font-style: italic;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style="font-family: 'Mulish', sans-serif;">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown p-0">
                <a href="{{ url('logout') }}" class="nav-link text-danger"
                onclick="return confirm('Bạn có muốn đăng xuất không ?');">
                    <b><i class="fa fa-sign-out"></i> Đăng xuất</b>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset('public/dist/img/logo-mekong.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"><b>MeKong Program</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                @if(Auth::check())
                <div class="image">
                    <img src="{{ asset('public/upload_avatar/'.Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ url('page-profile-user/'.Auth::id()) }}" class="d-block">
                        <b>{{ Auth::user()->username }}</b>
                    </a>
                </div>
                @endif
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @if (Auth::user()->role_id == 1)

                        {{--===================================================--}}
                        {{--BẢNG ĐIỀU KHIỂN--}}
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{ url('/') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Bảng điều khiển</p>
                            </a>
                        </li>
                        {{--QUẢN LÝ NGƯỜI DÙNG--}}
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Quản lý người dùng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('page-role') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quyền truy cập</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('page-admin') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản trị</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('page-editor') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Điều phối viên</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <div class="dropdown-divider mb-0"></div>
                        {{--===================================================--}}


                        {{--===================================================--}}
                        {{--DỰ ÁN BAN ĐẦU--}}
                        <li class="nav-header">DỰ ÁN BAN ĐẦU</li>
                        <li class="nav-item">
                            <a href="{{ url('page-project-parent') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Dự án ban đầu</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>
                                    Tháng dự án
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview pl-3">
                                @php($project_deployments = DB::table('project_three_and_deployment_times')->get()->unique('deployment_time_id'))
                                @foreach($project_deployments as $project_deployment)
                                    @php($deployments = DB::table('deployment_times')->where('id',$project_deployment->deployment_time_id)->get())
                                    @foreach($deployments as $deployment)
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Tháng {{ $deployment->deployment_month_initialize }}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview pl-4">
                                            @php($project_months = DB::table('project_three_and_deployment_times')->where('deployment_time_id',$deployment->id)->get())
                                            @foreach($project_months as $project_month)
                                                @php($project_level_threes = DB::table('project_level_threes')->where('id',$project_month->project_three_id)->get())
                                                @foreach($project_level_threes as $project_level_three)
                                                    <li class="nav-item">
                                                        <a href="{{ url('page-month-project/'.$deployment->id) }}" class="nav-link">
                                                            <i class="nav-icon fas fa-circle"></i>
                                                            <p>{{ $project_level_three->project_three_code }}</p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </li>
                        <div class="dropdown-divider mb-0"></div>
                        {{--===================================================--}}



                    @else



                        {{--===================================================--}}
                        {{--DỰ ÁN BAN ĐẦU--}}
                        <li class="nav-header">DỰ ÁN BAN ĐẦU</li>
                        <li class="nav-item">
                            <a href="{{ url('page-project-parent') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Dự án ban đầu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('page-month-project') }}" class="nav-link">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>Tháng và dự án</p>
                            </a>
                        </li>
                        <div class="dropdown-divider mb-0"></div>
                        {{--===================================================--}}
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content-header')
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
        Copyright &copy;
        <script>
            var dt = new Date();
            document.write(dt.getFullYear());
        </script>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ url('public/plugins/sparklines/sparkline.js') }}"></script>

<!-- daterangepicker -->
<script src="{{ url('public/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('public/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- JQVMap -->
<script src="{{ url('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('public/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/dist/js/demo.js') }}"></script>

</body>
</html>
