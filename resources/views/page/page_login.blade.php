<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon image -->
    <link rel = "icon" type = "image/png" sizes = "32x32" href = "{{ asset('public/dist/img/logo-mekong.png') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href=".{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body class="hold-transition login-page" style="font-family: 'Mulish', sans-serif;">
<div class="login-box">
    <div class="login-logo">
        <a href="#" class="brand-link">
            <img src="{{ asset('public/dist/img/logo-mekong.png') }}" style="opacity:.8;max-width:100%;height:50px;">
            <span class="brand-text font-weight">
                <b style="text-transform: uppercase;font-weight:bold;color:#0b2e13;">MeKong Program</b>
            </span>
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body" style="border-radius:10px;">
            <p class="login-box-msg" style="padding-left:1px;padding-right:1px;">Đăng nhập MeKong Program</p>

            <form action="{{ url('post-page-login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tài khoản" required name="inputUsername">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mật khẩu" required name="inputPassword">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Ghi nhớ tôi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-sign-in mr-2"></i> Đăng nhập
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->


{{--Thông báo box--}}
@if (Session::has('error_login'))
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            titleText: 'Tài khoản hoặc mật khẩu không đúng !',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
@endif

@if (Session::has('change_password_user'))
    <script type="text/javascript">
        Swal.fire({
            position: 'center'
            , icon: 'success'
            , title: 'Đã thay đổi mật khẩu. Vui lòng đăng nhập lại!'
            , showConfirmButton: false
            , timer: 2500
        });
    </script>
@endif
{{--Thông báo box--}}

<!-- jQuery -->
<script src="{{ url('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
