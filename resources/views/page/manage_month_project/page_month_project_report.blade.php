@extends('layout.layout')
@section('title','Tháng báo cáo')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tháng báo cáo</li>
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
                                    BÁO CÁO THÁNG
                                    <b class="text-success">{{ $view_deployment_times->deployment_month_initialize }}/{{ $view_deployment_times->deployment_year_initialize }}</b>
                                </b>
                            </h3>
                            <div class="card-tools">
                                @if($view_deployment_times->deployment_number_money_real == null && $view_deployment_times->deployment_number_money_operating != null)
                                    <a class="btn btn-success btn-xs"
                                       href="{{ url('add-deployment-time-report/'.$view_deployment_times->id) }}">
                                        <i class="fa fa-plus"></i> Thêm bổ sung báo cáo
                                    </a>
                                @else
                                @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <tr>
                                        <td style="width: 15%;" class="text-right"><b>Ngày bắt đầu:</b></td>
                                        <td style="width: 85%;">
                                            <h6>
                                            {{ $view_deployment_times->deployment_day_start }}/{{ $view_deployment_times->deployment_month_start }}/{{ $view_deployment_times->deployment_year_start }}
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>Ngày kết thúc:</b></td>
                                        <td>
                                            <h6>
                                                {{ $view_deployment_times->deployment_day_end }}/{{ $view_deployment_times->deployment_month_end }}/{{ $view_deployment_times->deployment_year_end }}
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>Số tiền dự án ban đầu:</b></td>
                                        <td>
                                            <span class="bg-success font-weight-bold p-1" style="border-radius: 10px;">
                                                {{ number_format($view_deployment_times->deployment_number_money_initial) }} Đ
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>Số tiền hoạt động:</b></td>
                                        <td>
                                            <span class="bg-success font-weight-bold p-1" style="border-radius: 10px;">
                                                {{ number_format($view_deployment_times->deployment_number_money_operating) }} Đ
                                            </span>
                                        </td>
                                    </tr>

                                    @if ($view_deployment_times->deployment_number_money_real != null)
                                        <tr>
                                            <td class="text-right"><b>Số tiền thực tế:</b></td>
                                            <td>
                                            <span class="bg-success font-weight-bold p-1" style="border-radius: 10px;">
                                                {{ number_format($view_deployment_times->deployment_number_money_real) }} Đ
                                            </span>
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td class="text-right"><b>Địa điểm:</b></td>
                                        <td class="text-justify">
                                            {{ $view_deployment_times->deployment_address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>Đối tác:</b></td>
                                        <td class="text-justify">
                                            {{ $view_deployment_times->deployment_partner }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>Phương pháp thực hiện:</b></td>
                                        <td class="text-justify">
                                            {{ $view_deployment_times->deployment_method_implementation }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><b>Mô tả:</b></td>
                                        <td class="text-justify">
                                            {{ $view_deployment_times->deployment_description }}
                                        </td>
                                    </tr>

                                    @if ($view_deployment_times->deployment_index_achieved != null)
                                    <tr>
                                        <td class="text-right"><b>Chỉ số đạt được:</b></td>
                                        <td class="text-justify">
                                            {{ $view_deployment_times->deployment_index_achieved }}
                                        </td>
                                    </tr>
                                    @endif

                                    @if ($view_deployment_times->deployment_result_achieved != null)
                                    <tr>
                                        <td class="text-right"><b>Kết quả đạt được:</b></td>
                                        <td class="text-justify">
                                            {{ $view_deployment_times->deployment_result_achieved }}
                                        </td>
                                    </tr>
                                    @endif

                                    <tr>
                                        <td class="text-right"><b>Tùy chọn:</b></td>
                                        <td class="text-justify">
                                            <a class="btn btn-info btn-xs"
                                               href="{{ url('edit-deployment-time-report/'.$view_deployment_times->id) }}">
                                                <i class="fa fa-edit"></i> Chỉnh sửa
                                            </a>
                                            &ensp;
                                            @php($three_and_deployments = DB::table('project_three_and_deployment_times')->where('deployment_time_id',$view_deployment_times->id)->get())
                                            @foreach($three_and_deployments as $three_and_deployment)
                                                @if($loop->first)
                                                    @php($threes = DB::table('project_level_threes')->where('id',$three_and_deployment->project_three_id)->get())
                                                    @foreach($threes as $three)
                                                        @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->get())
                                                        @foreach($twos as $two)
                                                            @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->get())
                                                            @foreach($ones as $one)
                                                                @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->get())
                                                                @foreach($parents as $parent)
                                                                    <a class="btn btn-warning btn-xs"
                                                                       href="{{ url('history-deployment-time-report/'.$view_deployment_times->id) }}" title="Lịch sử">
                                                                        <i class="fa fa-history"></i> Lịch sử chỉnh sửa
                                                                    </a>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{--TREE--}}
                                @php($three_and_deployments = DB::table('project_three_and_deployment_times')->where('deployment_time_id',$view_deployment_times->id)->get())
                                @foreach($three_and_deployments as $three_and_deployment)
                                    @if($loop->first)
                                        @php($threes = DB::table('project_level_threes')->where('id',$three_and_deployment->project_three_id)->get())
                                        @foreach($threes as $three)
                                            @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->get())
                                            @foreach($twos as $two)
                                                @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->get())
                                                @foreach($ones as $one)
                                                    @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->get())
                                                    @foreach($parents as $parent)
                                                        @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->first())
                                                        @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->first())
                                                        @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->first())
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endforeach

                                <div class="tree">
                                    <ul>
                                        <li>
                                            <a href="{{ url('page-project-one/'.$parent->id) }}">
                                                {{ $parent->project_code }}
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="{{ url('page-project-two/'.$parent->id.'/'.$one->id) }}">
                                                        {{ $one->project_one_code }}
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ url('page-project-three/'.$parent->id.'/'.$one->id.'/'.$two->id) }}">
                                                                {{ $two->project_two_code }}
                                                            </a>
                                                            <ul>
                                                                @foreach($month_projects as $month_project)
                                                                    @php($threes = DB::table('project_level_threes')->where('id',$month_project->project_three_id)->get())
                                                                    @foreach($threes as $three_tree)
                                                                        <li>
                                                                            <a href="{{ url('page-deployment-time/'.$parent->id.'/'.$one->id.'/'.$two->id.'/'.$three_tree->id) }}">
                                                                                {{ $three_tree->project_three_code }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            {{--TREE--}}
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            {{--<a class="btn btn-success btn-sm"
                               href="{{ url('download-report/'.$view_deployment_times->id) }}">
                                <i class="fa fa-download"></i> Download file
                            </a>--}}
                            &ensp;
                            <a class="btn btn-warning btn-sm"
                               href="{{ url('review-deployment-time-report/'.$view_deployment_times->id) }}" title="Lịch sử">
                                <i class="fa fa-eye"></i> Review
                            </a>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>

    @if (Session::has('update_report_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm hoặc cập nhật báo cáo tháng {{ $view_deployment_times->deployment_month_initialize }}'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




