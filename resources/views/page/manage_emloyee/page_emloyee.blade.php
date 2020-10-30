@extends('layout.layout')
@section('title','Nhân viên')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Nhân viên</li>
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
                                    NHÂN VIÊN
                                </b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('page-add-emloyee') }}">
                                    <i class="fa fa-plus"></i> Thêm mới
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <!-- SEARCH FORM -->
                            <form class="form-inline mb-2" method="GET" action="{{ url('page-emloyee') }}">
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
                                        <th scope="col" colspan="2">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_emloyees as $key => $show_emloyee)
                                        <tr>
                                            <td data-label="STT">{{ ++$key }}</td>
                                            <td data-label="Hình ảnh" class="p-1">
                                                @if($show_emloyee->avatar != null)
                                                    <a href="{{ asset('public/upload_avatar/'.$show_emloyee->avatar) }}">
                                                        <img src="{{ asset('public/upload_avatar/'.$show_emloyee->avatar) }}"
                                                             style="max-width:100%;height:60px;border-radius:50%;">
                                                    </a>
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Họ và tên">
                                                {{ $show_emloyee->fullname }}
                                            </td>
                                            <td data-label="Tài khoản">
                                                {{ $show_emloyee->username }}
                                            </td>
                                            <td data-label="Giới tính">
                                                @if($show_emloyee->sex != null)
                                                    {{ $show_emloyee->sex }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Ngày sinh">
                                                @if($show_emloyee->birthday != null)
                                                    {{ $show_emloyee->birthday }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Điện thoại">
                                                @if($show_emloyee->phone != null)
                                                    {{ $show_emloyee->phone }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Email">
                                                @if($show_emloyee->email != null)
                                                    {{ $show_emloyee->email }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Địa chỉ">
                                                @if($show_emloyee->address != null)
                                                    {{ $show_emloyee->address }}
                                                @else
                                                    <b class="text-danger">Không có</b>
                                                @endif
                                            </td>
                                            <td data-label="Tùy chọn">
                                                <a class="btn btn-danger btn-sm" href="{{ url('delete-emloyee/'.$show_emloyee->id) }}" title="Xóa"
                                                   onclick="return confirm('Bạn có chắc xóa không ?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <td data-label="Tùy chọn">
                                                <a class="btn btn-success btn-sm" href="{{ url('page-change-role/'.$show_emloyee->id) }}" title="Thay đổi quyền">
                                                    <i class="fa fa-exchange"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td data-label="Thông báo" colspan="11" class="text-danger">
                                                <b>Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{--pagination--}}
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_emloyees->links() }}
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
    @if (Session::has('add_emloyee_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm nhân viên'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_emloyee_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa nhân viên'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
{{--======================================================--}}




