@extends('layout.layout')
@section('title','Phân công dự án')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-project-parent') }}">Dự án</a></li>
                        <li class="breadcrumb-item active">Phân công dự án</li>
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
                <section class="col-lg-6 offset-lg-3">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    PHÂN CÔNG DỰ ÁN
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">

                            <form action="{{ url('post-division-user/'.$project_parent_id->id) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-5">
                                        <label for="">Dự án</label>
                                        <input type="text" name="inputCodeProject" value="{{ $project_parent_id->project_code }}"
                                        class="form-control" disabled>
                                    </div>

                                    <div class="col-7">
                                        <label for="">Người dùng</label>
                                        <select name="inputUserId" class="form-control">
                                            <option value="">- - Chọn - -</option>

                                            @php($get_users = DB::table('users')->where('role_id',2)->get())
                                            @foreach($get_users as $get_user)
                                            <option value="{{ $get_user->id }}">{{ $get_user->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Phân công</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>

    {{--<script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $( "#AddRole" ).validate({
            rules: {
                inputNameRole: {
                    required: true
                },
                inputRoleDiscribe: {
                    required: true
                }
            },
            messages: {
                inputNameRole: "Chưa nhập tên quyền",
                inputRoleDiscribe: "Chưa nhập miêu tả quyền"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>--}}

    @if (Session::has('mes_error'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Người dùng đã phân công !'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




