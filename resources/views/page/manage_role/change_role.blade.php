@extends('layout.layout')
@section('title','Thay đổi quyền')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-role') }}">Quyền truy cập</a></li>
                        <li class="breadcrumb-item active">Thay đổi quyền</li>
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
        <div class="container-fluid p-0">
            <!-- Main row -->
            <div class="row">
                <div class="col-lg-3"></div>
                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    THAY ĐỔI QUYỀN
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('update-change-role/'.$change_role->id) }}" id="ChangeRole" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-lg-7">
                                        <label for="">Người dùng</label>
                                        <input type="text" name="inputFullname" class="form-control"
                                               value="{{ $change_role->fullname }}" disabled>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Quyền truy cập</label>
                                        <select class="form-control" name="inputRoleId" required>
                                            @php($get_roles = DB::table('roles')->where('id',$change_role->role_id)->get())
                                            @foreach($get_roles as $get_role)
                                            <option value="{{ $get_role->id }}">{{ $get_role->role_name }}</option>
                                            @endforeach
                                            <option value="">- - Chọn quyền - -</option>
                                            @php($roles = DB::table('roles')->get())
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col-12 col-lg-12">
                                        <button type="submit" class="btn btn-primary btn-sm">Thay đổi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <div class="col-lg-3"></div>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $( "#ChangeRole" ).validate({
            rules: {
                inputRoleId: {
                    required: true
                }
            },
            messages: {
                inputRoleId: "Chưa chọn quyền"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>

@endsection
{{--======================================================--}}




