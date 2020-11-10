@extends('layout.layout')
@section('title','Tháng kế hoạch')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tháng kế hoạch</li>
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
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    KẾ HOẠCH THÁNG
                                    <b class="text-info">{{ $view_deployment_times->deployment_month_initialize }}/{{ $view_deployment_times->deployment_year_initialize }}</b>
                                </b>
                            </h3>
                            <div class="card-tools">
                                @if($view_deployment_times->deployment_number_money_operating == null)
                                    @foreach($month_projects as $month_project)
                                        @php($threes = DB::table('project_level_threes')->where('id',$month_project->project_three_id)->get())
                                        @foreach($threes as $three)
                                            @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->get())
                                            @foreach($twos as $two)
                                                @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->get())
                                                @foreach($ones as $one)
                                                    @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->get())
                                                    @foreach($parents as $parent)
                                                        <a class="btn btn-info btn-xs"
                                                        href="{{ url('add-deployment-time-plan/'.$parent->id.'/'.$one->id.'/'.$two->id.'/'.$three->id.'/'.$view_deployment_times->id) }}">
                                                            <i class="fa fa-plus"></i> Thêm bổ sung kế hoạch
                                                        </a>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @else
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        @if (($view_deployment_times->deployment_day_start != null) &&
                                        ($view_deployment_times->deployment_month_start != null) &&
                                        ($view_deployment_times->deployment_year_start != null))
                                        <th scope="col" style="width:9%;">Ngày BĐ</th>
                                        @endif

                                        @if (($view_deployment_times->deployment_day_end != null) &&
                                        ($view_deployment_times->deployment_month_end != null) &&
                                        ($view_deployment_times->deployment_year_end != null))
                                        <th scope="col" style="width:9%;">Ngày KT</th>
                                        @endif

                                        <th scope="col" style="width:11%;">Tiền ban đầu</th>

                                        @if ($view_deployment_times->deployment_number_money_operating != null)
                                        <th scope="col" style="width:11%;">Tiền H.động</th>
                                        @endif

                                        <th scope="col" style="width:11%;">Địa điểm</th>
                                        <th scope="col" style="width:11%;">Đối tác</th>

                                        @if ($view_deployment_times->deployment_method_implementation != null)
                                        <th scope="col" style="width:11%;">PP thực hiện</th>
                                        @endif

                                        <th scope="col" style="width:15%;">Mô tả</th>
                                        <th scope="col" style="width:5%;" colspan="2">Chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if (($view_deployment_times->deployment_day_start != null) &&
                                        ($view_deployment_times->deployment_month_start != null) &&
                                        ($view_deployment_times->deployment_year_start != null))
                                        <td data-label="Ngày bắt đầu:" class="p-1">
                                            <h6 class="text-info">
                                                {{ $view_deployment_times->deployment_day_start }}/{{ $view_deployment_times->deployment_month_start }}/{{ $view_deployment_times->deployment_year_start }}
                                            </h6>
                                        </td>
                                        @endif

                                        @if (($view_deployment_times->deployment_day_end != null) &&
                                        ($view_deployment_times->deployment_month_end != null) &&
                                        ($view_deployment_times->deployment_year_end != null))
                                        <td data-label="Ngày kết thúc:" class="p-1">
                                            <h6 class="text-info">
                                                {{ $view_deployment_times->deployment_day_end }}/{{ $view_deployment_times->deployment_month_end }}/{{ $view_deployment_times->deployment_year_end }}
                                            </h6>
                                        </td>
                                        @endif

                                        <td data-label="Số tiền dự án:" class="p-1">
                                            <h6 class="text-info">
                                                {{ number_format($view_deployment_times->deployment_number_money_initial) }} Đ
                                            </h6>
                                        </td>

                                        @if ($view_deployment_times->deployment_number_money_operating != null)
                                        <td data-label="Số tiền hoạt động:" class="p-1">
                                            <h6 class="text-info">
                                                {{ number_format($view_deployment_times->deployment_number_money_operating) }} Đ
                                            </h6>
                                        </td>
                                        @endif

                                        <td data-label="Địa điểm:" class="text-muted p-1">
                                            <p>{{ $view_deployment_times->deployment_address }}</p>
                                        </td>
                                        <td data-label="Đối tác:" class="text-muted p-1">
                                            <p>{{ $view_deployment_times->deployment_partner }}</p>
                                        </td>

                                        @if ($view_deployment_times->deployment_method_implementation != null)
                                        <td data-label="PP thực hiện:" class="text-muted p-1">
                                            <p>{{ $view_deployment_times->deployment_method_implementation }}</p>
                                        </td>
                                        @endif

                                        <td data-label="Mô tả:" class="text-muted p-1">
                                            <p>{{ $view_deployment_times->deployment_description }}</p>
                                        </td>

                                        <td data-label="Chọn:" class="p-1">
                                            @foreach($month_projects as $month_project)
                                                @php($threes = DB::table('project_level_threes')->where('id',$month_project->project_three_id)->get())
                                                @foreach($threes as $three)
                                                    @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->get())
                                                    @foreach($twos as $two)
                                                        @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->get())
                                                        @foreach($ones as $one)
                                                            @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->get())
                                                            @foreach($parents as $parent)
                                                                <a class="btn btn-info btn-xs"
                                                                href="{{ url('edit-deployment-time-plan/'.$parent->id.'/'.$one->id.'/'.$two->id.'/'.$three->id.'/'.$view_deployment_times->id) }}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        </td>

                                        <td data-label="Chọn:" class="p-1">
                                            <a class="btn btn-warning btn-xs"
                                               href="{{ url('history-deployment-time-plan/'.$view_deployment_times->id) }}" title="Lịch sử">
                                                <i class="fa fa-history"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>




                            <div class="tree">
                                @foreach($month_projects as $month_project)
                                    @php($threes = DB::table('project_level_threes')->where('id',$month_project->project_three_id)->get())
                                    @foreach($threes as $three)
                                        @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->get())
                                        @foreach($twos as $two)
                                            @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->get())
                                            @foreach($ones as $one)
                                                @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->get())
                                                @foreach($parents as $parent)
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('page-deployment-time-plan/'.$parent->id.'/'.$one->id.'/'.$two->id.'/'.$three->id) }}">
                                                                {{ $three->project_three_code }}
                                                            </a>
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ url('page-project-three/'.$parent->id.'/'.$one->id.'/'.$two->id) }}">
                                                                        {{ $two->project_two_code }}
                                                                    </a>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="{{ url('page-project-two/'.$parent->id.'/'.$one->id) }}">
                                                                                {{ $one->project_one_code }}
                                                                            </a>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="{{ url('page-project-one/'.$parent->id) }}">
                                                                                        {{ $parent->project_code }}
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
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

    @if (Session::has('add_project_to_month_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm dự án vào tháng {{ $view_deployment_times->deployment_month_initialize }}'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_plan_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm hoặc cập nhật kế hoạch {{ $view_deployment_times->deployment_month_initialize }}'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('mes_exist_project_to_month'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Dự án đã tồn tại trong tháng'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




