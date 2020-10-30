@extends('layout.layout')
@section('title','Dự án cấp ba')
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
                        <li class="breadcrumb-item"><a href="{{ url('page-project-one') }}">VN-0054</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-project-two') }}">1.1</a></li>
                        <li class="breadcrumb-item active">1.1.1</li>
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
                                <i class="ion ion-clipboard mr-1"></i>
                                <b style="text-transform: uppercase;color:#00bfff;">1.1.1</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('page-add-project-three') }}">
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
                                        <th scope="col" style="width:10%;">Mã dự án</th>
                                        <th scope="col" style="width:15%;">Tên hoạt động</th>
                                        <th scope="col" style="width:10%;">Tổng tiền</th>
                                        <th scope="col" style="width:15%;">Kết quả cần đạt</th>
                                        <th scope="col" style="width:15%;">Chỉ số cần đạt</th>
                                        <th scope="col" style="width:17%;">Ghi chú</th>
                                        <th scope="col" colspan="2" style="width:8%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT:" class="p-1"><h6>1</h6></td>
                                        <td data-label="Mã dự án:" class="p-1">
                                            <a href="{{ url('page-deployment-time') }}">
                                                <h6 style="text-transform: uppercase;font-weight: bold;color:#2e8b57;">1.1.1.1</h6>
                                            </a>
                                        </td>
                                        <td data-label="Tên hoạt động:" class="p-1">
                                            <b style="color:#2e8b57;">Họp định kỳ với Ban Quản lý dự án tỉnh </b>
                                        </td>
                                        <td data-label="Tổng tiền:" class="p-1">
                                            <b style="color:#2e8b57;">19.000.000 đ</b>
                                        </td>
                                        <td data-label="Kết quả cần đạt:" class="text-muted p-1">
                                            <p>
                                                - Thống nhất phương thức triển khai dự án ở địa phương, hình thức báo cáo, xây dựng kế hoạch định kỳ
                                                - Thống nhất bản cơ chế hỗ trợ người nghèo tiếp cận các giải pháp NLBV, NLTT
                                                - Thống nhất tiêu chí thực hiện ấp xanh Vồ Bà
                                            </p>
                                        </td>
                                        <td data-label="Chỉ số cần đạt:" class="text-muted p-1">
                                            <p>Không có</p>
                                        </td>

                                        <td data-label="Ghi chú:" class="text-muted p-1">
                                            <p>Không có</p>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-primary btn-xs" href="{{ url('page-edit-project-three') }}" title="Chỉnh sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-danger btn-xs" href="#" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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


@endsection
{{--======================================================--}}




