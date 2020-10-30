@extends('layout.layout')
@section('title','Thời gian triển khai')
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
                        <li class="breadcrumb-item"><a href="{{ url('page-project-three') }}">1.1.1</a></li>
                        <li class="breadcrumb-item active">1.1.1.1</li>
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
                                <b style="text-transform: uppercase;color:#2e8b57;">1.1.1.1</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('page-add-deployment-time') }}">
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
                                        <th scope="col" style="width:10%;">Tháng</th>
                                        <th scope="col" style="width:10%;">Số tiền</th>
                                        <th scope="col" style="width:20%;">Địa điểm</th>
                                        <th scope="col" style="width:15%;">Đối tác</th>
                                        <th scope="col" style="width:30%;">Mô tả</th>
                                        <th scope="col" colspan="2" style="width:10%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT:" class="p-1"><h6>1</h6></td>
                                        <td data-label="Tháng:" class="p-1">
                                            <b style="text-transform: uppercase;font-weight: bold;">Tháng 9/2020</b>
                                        </td>
                                        <td data-label="Số tiền:" class="p-1">
                                            <b class="text-success">10.000.000 Đ</b>
                                        </td>
                                        <td data-label="Địa điểm:" class="text-muted p-1">
                                            <p>An Giang (Tịnh Biên và Tri Tôn)</p>
                                        </td>
                                        <td data-label="Đối tác:" class="text-muted p-1">
                                            <p>Trung tâm Phát triển Sáng tạo Xanh (GreenID)</p>
                                        </td>

                                        <td data-label="Mô tả:" class="text-muted p-1">
                                            <p>Cộng đồng nghèo chưa có điện lưới ở huyện Tri Tôn và Tịnh Biên
                                                được tiếp cận với các giải pháp năng lượng tái tạo phi tập trung với giá cả hợp lý.</p>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-primary btn-xs" href="{{ url('page-edit-deployment-time') }}" title="Chỉnh sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-danger btn-xs" href="#" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td data-label="STT:" class="p-1"><h6>1</h6></td>
                                        <td data-label="Tháng:" class="p-1">
                                            <b style="text-transform: uppercase;font-weight: bold;">Tháng 11/2020</b>
                                        </td>
                                        <td data-label="Số tiền:" class="p-1">
                                            <b class="text-success">9.000.000 Đ</b>
                                        </td>
                                        <td data-label="Địa điểm:" class="text-muted p-1">
                                            <p>Hậu Giang (Phụng Hiệp và Vị Thủy)</p>
                                        </td>
                                        <td data-label="Đối tác:" class="text-muted p-1">
                                            <p>Trung tâm Phát triển Sáng tạo Xanh (GreenID)</p>
                                        </td>

                                        <td data-label="Mô tả:" class="text-muted p-1">
                                            <p>Cộng đồng nghèo chưa có điện lưới ở huyện Phụng Hiệp và Vị Thủy
                                                được tiếp cận với các giải pháp năng lượng tái tạo phi tập trung với giá cả hợp lý.</p>
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




