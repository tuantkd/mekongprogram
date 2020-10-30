@extends('layout.layout')
@section('title','Quản trị')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Quản trị</li>
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
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    QUẢN TRỊ
                                </b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('page-add-admin') }}">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <!-- SEARCH FORM -->
                            <form class="form-inline mb-2" method="GET" action="{{ url('page-admin') }}">
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
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Tài khoản</th>
                                        <th scope="col">Giới tính</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Điện thoại</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Địa chỉ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_admins as $key => $show_admin)
                                    <tr>
                                        <td data-label="STT">{{ ++$key }}</td>
                                        <td data-label="Hình ảnh" class="p-1">
                                            @if($show_admin->avatar != null)
                                            <a href="{{ asset('public/upload_avatar/'.$show_admin->avatar) }}">
                                                <img src="{{ asset('public/upload_avatar/'.$show_admin->avatar) }}"
                                                 style="max-width:100%;height:60px;border-radius:50%;">
                                            </a>
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Họ và tên">
                                            {{ $show_admin->fullname }}
                                        </td>
                                        <td data-label="Tài khoản">
                                            {{ $show_admin->username }}
                                        </td>
                                        <td data-label="Giới tính">
                                            @if($show_admin->sex != null)
                                                {{ $show_admin->sex }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Ngày sinh">
                                            @if($show_admin->birthday != null)
                                                {{ $show_admin->birthday }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Điện thoại">
                                            @if($show_admin->phone != null)
                                                {{ $show_admin->phone }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Email">
                                            @if($show_admin->email != null)
                                                {{ $show_admin->email }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
                                        </td>
                                        <td data-label="Địa chỉ">
                                            @if($show_admin->address != null)
                                                {{ $show_admin->address }}
                                            @else
                                                <b class="text-danger">Không có</b>
                                            @endif
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
                                {{ $show_admins->links() }}
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

    {{--Thông báo box--}}
    @if (Session::has('add_admin_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm quản trị'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
{{--======================================================--}}




