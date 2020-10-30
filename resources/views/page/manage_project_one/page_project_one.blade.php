@extends('layout.layout')
@section('title','Dự án cấp một')
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
                        <li class="breadcrumb-item active">VN-0054</li>
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
                                <b style="text-transform: uppercase;" class="text-primary">VN-0054</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('page-add-project-one') }}">
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
                                        <td data-label="Mã dự án:" class="text-info p-1">
                                            <a href="{{ url('page-project-two') }}">
                                                <h6 style="text-transform: uppercase;font-weight: bold;color: #00008b;">1.1</h6>
                                            </a>
                                        </td>
                                        <td data-label="Tên hoạt động:" class="p-1">
                                            <b style="color: #00008b;">
                                                Năng lực quản lý và thực hiện dự án hiệu quả của các đối tác địa phương
                                            </b>
                                        </td>
                                        <td data-label="Tổng tiền:" class="p-1">
                                            <b style="color:#2e8b57;">19.000.000 đ</b>
                                        </td>
                                        <td data-label="Kết quả cần đạt:" class="text-muted p-1">
                                            <p>Các đề xuất dự án được thống nhất và phê duyệt
                                                Kế hoạch năm được thống nhất và phê duyêt kịp thời
                                                Các khó khăn vướng mắc trong quá trình thực hiện dự án liên quan đến cấp tỉnh, huyện xẫ được tháo gỡ trong các cuộc họp giao ban định k ỳ.
                                                Các hoạt  được thực hiện theo Kế hoạch.</p>
                                        </td>
                                        <td data-label="Chỉ số cần đạt:" class="text-muted p-1">
                                            <p>Biên bản họp định kỳ với BQL các cấp.
                                                Báo cáo giam sát chương trình hàng năm</p>
                                        </td>

                                        <td data-label="Ghi chú:" class="text-muted p-1">
                                            <p>Chính sách về NLBV của đói tác địa phương không thay đổi hoặc thay đổi theo chiều
                                                hướng ngày càng hỗ trợ phát triển LNBV</p>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-primary btn-xs" href="{{ url('page-edit-project-one') }}" title="Chỉnh sửa">
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




