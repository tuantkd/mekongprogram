@extends('layout.layout')
@section('title','Dự án')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Dự án</li>
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
                                <b><i class="ion ion-clipboard mr-1"></i> DỰ ÁN</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs" href="{{ url('page-add-project-parent') }}">
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
                                        <th scope="col" style="width:20%;">Tên dự án</th>
                                        <th scope="col" style="width:40%;">Mô tả dự án</th>
                                        <th scope="col" style="width:15%;">Khởi tạo</th>
                                        <th scope="col" colspan="2" style="width:10%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="STT:" class="p-1"><h6>1</h6></td>
                                        <td data-label="Mã dự án:" class="text-primary p-1">
                                            <a href="{{ url('page-project-one') }}">
                                                <h6 style="text-transform: uppercase;font-weight: bold;">vn-0054</h6>
                                            </a>
                                        </td>
                                        <td data-label="Tên dự án:" class="text-primary p-1">
                                            <b>Logfram original - Bánh Mỳ</b>
                                        </td>
                                        <td data-label="Mô tả dự án:" class="text-muted p-1">
                                            <p>Tăng cường cơ hội phát triển sinh kế xanh cho người nghèo trên địa bàn tỉnh An Giang
                                                (Tịnh Biên và Tri Tôn) thông qua đẩy mạnh ứng dụng năng lượng tái tạo</p>
                                        </td>
                                        <td data-label="Khởi tạo:" class="p-1">
                                            <b>Phạm Ngọc Nhàn</b>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-primary btn-xs" href="{{ url('page-edit-project-parent') }}" title="Chỉnh sửa">
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




