@extends('layout.layout')
@section('title','Thời gian triển khai kế hoạch')
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

    <style>
        @media screen and (max-width: 600px) {
            .mobile-hidden{
                display: none;
            }
        }
        /*Now the CSS Created by R.S*/
        * {margin: 0; padding: 0;}
        .tree ul {
            padding-top: 20px; position: relative;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        .tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        /*We will use ::before and ::after to draw the connectors*/
        .tree li::before, .tree li::after{
            content: '';
            position: absolute; top: 0; right: 50%;
            border-top: 1px solid #ccc;
            width: 50%; height: 20px;
        }
        .tree li::after{
            right: auto; left: 50%;
            border-left: 1px solid #ccc;
        }
        /*We need to remove left-right connectors from elements without
        any siblings*/
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }
        /*Remove space from the top of single children*/
        .tree li:only-child{ padding-top: 0;}

        /*Remove left connector from first child and
        right connector from last child*/
        .tree li:first-child::before, .tree li:last-child::after{
            border: 0 none;
        }
        /*Adding back the vertical connector to the last nodes*/
        .tree li:last-child::before{
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        /*Time to add downward connectors from parents*/
        .tree ul ul::before{
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 1px solid #ccc;
            width: 0; height: 20px;
        }

        .tree li a{
            border: 1px solid #ccc;
            padding: 5px 10px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;

            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }
        /*Time for some hover effects*/
        /*We will apply the hover effect the the lineage of the element also*/
        .tree li a:hover, .tree li a:hover+ul li a {
            background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
        }
        /*Connector styles on hover*/
        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before{
            border-color:  #94a0b4;
        }
    </style>

    <section class="content">
        <div class="container-fluid p-0">

            <!-- Tree project -->
            {{--<div class="row mobile-hidden">
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b><i class="ion ion-clipboard mr-1"></i>CÂY DỰ ÁN KẾ HOẠCH</b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            @php($project_parents = DB::table('project_parents')->latest()->take(5)->get())
                            @if (Auth::user()->role_id == 1)
                                --}}{{--==================================================================--}}{{--
                                --}}{{--QUẢN TRỊ XEM HẾT--}}{{--
                                <div class="tree">
                                    <ul>
                                        @foreach($project_parents as $project_parent)
                                            <li>
                                                <a href="{{ url('page-project-one/'.$project_parent->id) }}">
                                                    {{ $project_parent->project_code }}
                                                </a>
                                                <ul>
                                                    @php($project_ones = DB::table('project_level_ones')->where('project_parent_id',$project_parent->id)->get())
                                                    @foreach($project_ones as $project_one)
                                                        <li>
                                                            <a href="{{ url('page-project-two/'.$project_parent->id.'/'.$project_one->id) }}">
                                                                {{ $project_one->project_one_code }}
                                                            </a>
                                                            <ul>
                                                                @php($project_twos = DB::table('project_level_twos')->where('project_one_id',$project_one->id)->get())
                                                                @foreach($project_twos as $project_two)
                                                                    <li>
                                                                        <a href="{{ url('page-project-three/'.$project_parent->id.'/'.$project_one->id.'/'.$project_two->id) }}">
                                                                            {{ $project_two->project_two_code }}
                                                                        </a>
                                                                        <ul>
                                                                            @php($project_threes = DB::table('project_level_threes')->where('project_two_id',$project_two->id)->get())
                                                                            @foreach($project_threes as $project_three)
                                                                                <li>
                                                                                    <a href="{{ url('page-deployment-time-plan/'.$project_parent->id.'/'.$project_one->id.'/'.$project_two->id.'/'.$project_three->id) }}">
                                                                                        {{ $project_three->project_three_code }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                --}}{{--QUẢN TRỊ XEM HẾT--}}{{--
                                --}}{{--==================================================================--}}{{--
                            @else
                                --}}{{--==================================================================--}}{{--
                                --}}{{--NGƯỜI DÙNG GIAO QUYỀN MỚI ĐƯỢC XEM--}}{{--
                                <div class="tree">
                                    <ul>
                                        @foreach($project_parents as $parent)
                                            @php($project_users = DB::table('project_and_users')->where([['user_id','=',Auth::id()], ['project_parent_id','=',$parent->id]])->get())
                                            @foreach($project_users as $project_user)
                                                <li>
                                                    <a href="{{ url('page-project-one/'.$parent->id) }}">
                                                        {{ $parent->project_code }}
                                                    </a>
                                                    <ul>
                                                        @php($project_ones = DB::table('project_level_ones')->where('project_parent_id',$parent->id)->get())
                                                        @foreach($project_ones as $project_one)
                                                            <li>
                                                                <a href="{{ url('page-project-two/'.$parent->id.'/'.$project_one->id) }}">
                                                                    {{ $project_one->project_one_code }}
                                                                </a>
                                                                <ul>
                                                                    @php($project_twos = DB::table('project_level_twos')->where('project_one_id',$project_one->id)->get())
                                                                    @foreach($project_twos as $project_two)
                                                                        <li>
                                                                            <a href="{{ url('page-project-three/'.$parent->id.'/'.$project_one->id.'/'.$project_two->id) }}">
                                                                                {{ $project_two->project_two_code }}
                                                                            </a>
                                                                            <ul>
                                                                                @php($project_threes = DB::table('project_level_threes')->where('project_two_id',$project_two->id)->get())
                                                                                @foreach($project_threes as $project_three)
                                                                                    <li>
                                                                                        <a href="{{ url('page-deployment-time/'.$parent->id.'/'
                                                                                    .$project_one->id.'/'.$project_two->id.'/'.$project_three->id) }}">
                                                                                            {{ $project_three->project_three_code }}
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                                --}}{{--NGƯỜI DÙNG GIAO QUYỀN MỚI ĐƯỢC XEM--}}{{--
                                --}}{{--==================================================================--}}{{--
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>--}}
            <!-- /End Tree project -->


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
                                    <i class="fa fa-plus"></i> Thêm bổ sung kế hoạch
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
                                        <th scope="col" style="width:10%;">Tháng/Năm</th>
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
                                                <td data-label="Tháng/Năm:" class="p-1">
                                                    <a href="{{ url('page-month-project/'.$show_deployment_time->id) }}">
                                                        <b style="text-transform: uppercase;font-weight: bold;">
                                                            Tháng
                                                            {{ $show_deployment_time->deployment_month_initialize }}/{{ $show_deployment_time->deployment_year_initialize }}
                                                        </b>
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




