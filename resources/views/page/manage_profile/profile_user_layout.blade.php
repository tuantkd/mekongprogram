@extends('layout.layout')
@section('title','Hồ sơ cá nhân')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Hồ sơ cá nhân</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
{{--======================================================--}}


{{--======================================================--}}
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile p-3">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                 src="{{ url('public/upload_avatar/'.Auth::user()->avatar) }}">
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->fullname }}</h3>

                            <p class="text-muted text-center">
                                @php($roles = DB::table('roles')->where('id',Auth::user()->role_id)->get())
                                @foreach($roles as $role)
                                    {{ $role->role_name }}
                                @endforeach
                            </p>

                            {{--<ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>--}}

                            <a href="{{ url('page-change-password') }}" class="btn btn-primary btn-block">Đổi mật khẩu</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-1">
                            <ul class="nav nav-pills">
                                <li class="nav-item m-1">
                                    <a class="btn btn-outline-info" href="{{ url('page-profile-user/'.Auth::id()) }}">
                                        Thông tin cá nhân
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            @yield('tab-content')
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
{{--======================================================--}}




