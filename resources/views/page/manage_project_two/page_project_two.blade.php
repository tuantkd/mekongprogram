@extends('layout.layout')
@section('title','Dự án cấp hai')
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
                        <li class="breadcrumb-item active">{{ $project_one_id->project_one_code }}</li>
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
                                <b style="text-transform: uppercase;color: #00008b;">{{ $project_one_id->project_one_code }}</b>
                            </h3>
                            <div class="card-tools">
                                <a class="btn btn-primary btn-xs"
                                href="{{ url('page-add-project-two/'.$project_parent_id->id.'/'.$project_one_id->id) }}">
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
                                        <th scope="col" style="width:12%;">Mã hoạt động</th>
                                        <th scope="col" style="width:15%;">Tên hoạt động</th>
                                        <th scope="col" style="width:10%;">Tổng tiền</th>
                                        <th scope="col" style="width:15%;">Kết quả cần đạt</th>
                                        <th scope="col" style="width:15%;">Chỉ số cần đạt</th>
                                        <th scope="col" style="width:15%;">Ghi chú</th>
                                        <th scope="col" colspan="2" style="width:8%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_project_twos as $key => $show_project_two)
                                    <tr>
                                        <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mã hoạt động:" class="p-1">
                                            <a href="{{ url('page-project-three') }}">
                                                <h6 style="text-transform: uppercase;font-weight: bold;color:#00bfff;">{{ $show_project_two->project_two_code }}</h6>
                                            </a>
                                        </td>
                                        <td data-label="Tên hoạt động:" class="p-1">
                                            <b style="color:#00bfff;">{{ $show_project_two->project_two_name_operation }}</b>
                                        </td>
                                        <td data-label="Tổng tiền:" class="p-1">
                                            <b style="color:#2e8b57;">1.000 đ</b>
                                        </td>
                                        <td data-label="Kết quả cần đạt:" class="text-muted p-1">
                                            <p>{{ $show_project_two->project_two_result_need_reach }}</p>
                                        </td>
                                        <td data-label="Chỉ số cần đạt:" class="text-muted p-1">
                                            <p>{{ $show_project_two->project_two_index_need_reach }}</p>
                                        </td>

                                        <td data-label="Ghi chú:" class="text-muted p-1">
                                            <p>{{ $show_project_two->project_two_note }}</p>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-primary btn-xs" href="{{ url('page-edit-project-two') }}" title="Chỉnh sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td data-label="Tùy chọn:" class="p-1">
                                            <a class="btn btn-danger btn-xs" href="#" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9">
                                            <b class="text-danger">Không có dữ liệu</b>
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
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>

    @if (Session::has('add_project_two_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm dự án cấp 2'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




