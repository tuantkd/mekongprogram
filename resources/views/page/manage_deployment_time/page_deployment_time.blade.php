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
                        <li class="breadcrumb-item">
                            <a href="{{ url('page-project-one/'.$project_parent_id->id) }}">
                                {{ $project_parent_id->project_code }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('page-project-two/'.$project_parent_id->id.'/'.$project_one_id->id) }}">
                                {{ $project_one_id->project_one_code }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('page-project-three/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$project_two_id->id) }}">
                                {{ $project_two_id->project_two_code }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $project_three_id->project_three_code }}</li>
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
                                <b style="text-transform: uppercase;color:#2e8b57;">{{ $project_three_id->project_three_code }}</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs"
                                href="{{ url('page-add-deployment-time/'.$project_parent_id->id.'/'.$project_one_id->id.'/'
                                .$project_two_id->id.'/'.$project_three_id->id) }}">
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
                                        <th scope="col" style="width:15%;">Số tiền ban đầu</th>
                                        <th scope="col" style="width:20%;">Địa điểm</th>
                                        <th scope="col" style="width:15%;">Đối tác</th>
                                        <th scope="col" style="width:20%;">Mô tả</th>
                                        <th scope="col" colspan="3" style="width:15%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($project_three_deployment_time as $data)
                                        @php($show_deployment_times = DB::table('deployment_times')
                                        ->where('id',$data->deployment_time_id)->latest()->get())
                                        @foreach($show_deployment_times as $key => $show_deployment_time)
                                        <tr>
                                            <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                            <td data-label="Tháng:" class="p-1">
                                                <a href="{{ url('page-month-project/'.$show_deployment_time->id) }}">
                                                <h6 style="text-transform: uppercase;font-weight: bold;">
                                                    Tháng {{ $show_deployment_time->deployment_month_initialize }}
                                                </h6>
                                                </a>
                                            </td>
                                            <td data-label="Số tiền dự án:" class="p-1">
                                                <b class="text-success">{{ number_format($show_deployment_time->deployment_number_money_initial) }} Đ</b>
                                            </td>
                                            <td data-label="Địa điểm:" class="text-muted p-1">
                                                <p>{{ $show_deployment_time->deployment_address }}</p>
                                            </td>
                                            <td data-label="Đối tác:" class="text-muted p-1">
                                                <p>{{ $show_deployment_time->deployment_partner }}</p>
                                            </td>

                                            <td data-label="Mô tả:" class="text-muted p-1">
                                                <p>{{ $show_deployment_time->deployment_description }}</p>
                                            </td>
                                            <td data-label="Tùy chọn:" class="p-1">
                                                <a class="btn btn-primary btn-xs"
                                                href="{{ url('page-edit-deployment-time/'.$project_parent_id->id.'/'.$project_one_id->id.'/'
                                                .$project_two_id->id.'/'.$project_three_id->id.'/'.$show_deployment_time->id) }}" title="Chỉnh sửa">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td data-label="Tùy chọn:" class="p-1">
                                                <a class="btn btn-danger btn-xs"
                                                href="{{ url('delete-deployment-time/'.$show_deployment_time->id) }}" title="Xóa"
                                                onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>

                                            <td data-label="Chọn:" class="p-1">
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ url('history-deployment-time/'.$project_parent_id->id.'/'.$project_one_id->id.'/'
                                                    .$project_two_id->id.'/'.$project_three_id->id.'/'.$show_deployment_time->id) }}" title="Lịch sử">
                                                    <i class="fa fa-history"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td data-label="Thông báo" colspan="8" class="text-danger">
                                                <b>Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{--pagination--}}
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $project_three_deployment_time->links() }}
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

    @if (Session::has('add_deployment_time_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm thời gian triển khai'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_deployment_time_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa thời gian triển khai'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_deployment_time_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã cập nhật thời gian triển khai'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




