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
            <div class="row mobile-hidden">
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b><i class="ion ion-clipboard mr-1"></i>CÂY DỰ ÁN BAN ĐẦU</b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            @php($project_parents = DB::table('project_parents')->latest()->take(5)->get())
                            @if (Auth::user()->role_id == 1)
                                {{--==================================================================--}}
                                {{--QUẢN TRỊ XEM HẾT--}}
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
                                                                                    <a href="{{ url('page-deployment-time/'.$project_parent->id.'/'
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
                                    </ul>
                                </div>
                                {{--QUẢN TRỊ XEM HẾT--}}
                                {{--==================================================================--}}
                            @else
                                {{--==================================================================--}}
                                {{--NGƯỜI DÙNG GIAO QUYỀN MỚI ĐƯỢC XEM--}}
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
                                {{--NGƯỜI DÙNG GIAO QUYỀN MỚI ĐƯỢC XEM--}}
                                {{--==================================================================--}}
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /End Tree project -->


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
                                        <th scope="col" colspan="3" style="width:8%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_project_twos as $key => $show_project_two)
                                    <tr>
                                        <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                        <td data-label="Mã hoạt động:" class="p-1">
                                        <a href="{{ url('page-project-three/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$show_project_two->id) }}">
                                            <h6 style="text-transform: uppercase;font-weight: bold;color:#00bfff;">
                                                {{ $show_project_two->project_two_code }}
                                            </h6>
                                        </a>
                                        </td>
                                        <td data-label="Tên hoạt động:" class="p-1">
                                        <a href="{{ url('page-project-three/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$show_project_two->id) }}">
                                            <b style="color:#00bfff;">
                                                {{ $show_project_two->project_two_name_operation }}
                                            </b>
                                        </a>
                                        </td>
                                        <td data-label="Tổng tiền:" class="p-1">
                                            <?php $total_money_initial = 0; ?>
                                            @php($project_level_threes = DB::table('project_level_threes')->where('project_two_id',$show_project_two->id)->get())
                                            @foreach($project_level_threes as $project_level_three)
                                                @php($project_deployments = DB::table('project_three_and_deployment_times')->where('project_three_id',$project_level_three->id)->get())
                                                @foreach($project_deployments as $project_deployment)
                                                    @php($deployment_times = DB::table('deployment_times')->where('id',$project_deployment->deployment_time_id)->sum('deployment_number_money_initial'))
                                                    <?php $total_money_initial = $total_money_initial + $deployment_times; ?>
                                                @endforeach
                                            @endforeach
                                            <b style="color:#2e8b57;">
                                                <?php echo number_format($total_money_initial); ?>đ
                                            </b>
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

                                        <td data-label="Chọn:" class="p-1">
                                            <a class="btn btn-primary btn-xs"
                                            href="{{ url('page-edit-project-two/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$show_project_two->id) }}" title="Chỉnh sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>

                                        <td data-label="Chọn:" class="p-1">
                                            <a class="btn btn-danger btn-xs"
                                               href="{{ url('delete-project-two/'.$show_project_two->id) }}" title="Xóa"
                                               onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>

                                        <td data-label="Chọn:" class="p-1">
                                            <a class="btn btn-warning btn-xs"
                                               href="{{ url('history-project-two/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$show_project_two->id) }}" title="Lịch sử">
                                                <i class="fa fa-history"></i>
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

    @if (Session::has('delete_project_two_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa dự án cấp 2'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




