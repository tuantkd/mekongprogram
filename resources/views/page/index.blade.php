@extends('layout.layout')
@section('title','Trang chủ')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Dự án</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Dự án cấp 1</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53</h3>
                            <p>Dự án cấp 2</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Dự án cấp 3</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header p-2">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    THỜI GIAN TRIỂN KHAI MỚI
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tháng/Năm</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Địa điểm</th>
                                        <th scope="col">Đối tác</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col" colspan="2">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@forelse($user_admins as $key => $user_admin)--}}
                                    <tr>
                                        <td data-label="STT">{{--{{ ++$key }}--}}1</td>
                                        <td data-label="Tháng triển khai" class="text-muted">
                                            <b style="text-transform: uppercase;">THÁNG 9/2020</b>
                                        </td>
                                        <td data-label="Số tiền">
                                            8.000.000 VND
                                        </td>
                                        <td data-label="Địa điểm">
                                            Tri Tôn - An Giang
                                        </td>
                                        <td data-label="Đối tác">
                                            Green ID
                                            {{--{{ date('d/m/Y', strtotime($user_admin->birthday)) }}--}}
                                        </td>
                                        <td data-label="Ghi chú" class="text-success">
                                            Nghiên cứu thí điểm mô hình dual - use tại huyện Tri Tôn
                                        </td>

                                        <td data-label="Tùy chọn">
                                            <a class="btn btn-primary btn-xs" href="#" role="button" title="Chỉnh sửa">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </td>

                                        <td data-label="Tùy chọn">
                                            <a class="btn btn-danger btn-xs" href="#" role="button" title="Xóa">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{--@empty
                                        <tr>
                                            <td data-label="Thông báo" colspan="7" class="text-danger">
                                                <b>Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse--}}
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




