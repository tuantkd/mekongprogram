@extends('layout.layout')
@section('title','Quyền truy cập')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Quyền truy cập</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
{{--======================================================--}}


{{--======================================================--}}
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('post-page-role') }}" id="AddRole" method="POST">
                @csrf
                <div class="modal-content">
                <div class="modal-header p-2">
                    <h5 class="modal-title"><b>Thêm quyền truy cập</b></h5>
                </div>
                <div class="modal-body p-2">
                    <div class="form-group">
                        <label for="">Tên quyền</label>
                        <input type="text" name="inputNameRole" id="inputNameRole" class="form-control" placeholder="Nhập tên quyền" required>
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả quyền</label>
                        <textarea name="inputRoleDiscribe" id="inputRoleDiscribe" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer p-2">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- End Modal -->


    <section class="content">
        <div class="container-fluid p-0">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    QUYỀN TRUY CẬP
                                </b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="#" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:5%;">STT</th>
                                        <th scope="col" style="width:25%;">Tên quyền</th>
                                        <th scope="col" style="width:70%;">Mô tả</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_roles as $key => $show_roles)
                                    <tr>
                                        <td data-label="STT">{{ ++$key }}</td>
                                        <td data-label="Tên quyền" class="text-muted">
                                            <b>{{ $show_roles->role_name }}</b>
                                        </td>
                                        <td data-label="Mô tả" class="text-muted">
                                            <p>{{ $show_roles->role_description }}</p>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td data-label="Thông báo" colspan="3" class="text-danger">
                                                <b>Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>



                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    QUYỀN NGƯỜI DÙNG
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <!-- SEARCH FORM -->
                            <form class="form-inline mb-2" method="GET" action="{{ url('page-role') }}">
                                <div class="input-group input-group-sm">
                                    <input class="form-control" type="search" placeholder="Tìm kiếm người dùng" name="inputSearch">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- END SEARCH FORM -->

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Người dùng</th>
                                        <th scope="col">Quyền truy cập</th>
                                        <th scope="col">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_role_users as $key => $show_role_user)
                                    <tr>
                                        <td data-label="STT">1</td>
                                        <td data-label="Người dùng" class="text-success">
                                            <b>{{ $show_role_user->fullname }}</b>
                                        </td>
                                        <td data-label="Quyền truy cập">
                                            @php($get_roles = DB::table('roles')->where('id', $show_role_user->role_id)->get())
                                            @foreach($get_roles as $get_role)
                                                {{ $get_role->role_name }}
                                            @endforeach
                                        </td>
                                        <td data-label="Tùy chọn">
                                            <a class="btn btn-success btn-xs" href="{{ url('page-change-role/'.$show_role_user->id) }}" title="Thay đổi quyền">
                                                <i class="fa fa-exchange"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td data-label="Thông báo" colspan="9" class="text-danger">
                                                <b>Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{--pagination--}}
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_role_users->links() }}
                            </ul>
                            {{--pagination--}}

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

    <script>
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
    </script>


    {{--Thông báo box--}}
    @if (Session::has('add_role_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm quyền truy cập'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_role_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thay đổi quyền'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
{{--======================================================--}}




