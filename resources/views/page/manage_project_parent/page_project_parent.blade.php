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
                                <b><i class="ion ion-clipboard mr-1"></i>CÂY DỰ ÁN BAN ĐẦU</b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="tree">
                                <ul>
                                    <li>
                                        <a href="#">Parent</a>
                                        <ul>
                                            <li>
                                                <a href="#">Child</a>
                                                <ul>
                                                    <li>
                                                        <a href="#">Grand Child</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Child</a>
                                                <ul>
                                                    <li><a href="#">Grand Child</a></li>
                                                    <li>
                                                        <a href="#">Grand Child</a>
                                                        <ul>
                                                            <li>
                                                                <a href="#">Great Grand Child</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Great Grand Child</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Great Grand Child</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Grand Child</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->



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
                                        <th scope="col" style="width:35%;">Mô tả dự án</th>
                                        <th scope="col" style="width:15%;">Khởi tạo</th>
                                        <th scope="col" colspan="4" style="width:15%;">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (Auth::user()->role_id == 1)
                                            {{--TẤT CẢ DỰ ÁN--}}
                                            @forelse($show_project_parents as $key => $show_project_parent)
                                                <tr>
                                                <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                                <td data-label="Mã dự án:" class="text-primary p-1">
                                                    <a href="{{ url('page-project-one/'.$show_project_parent->id) }}">
                                                        <h6 style="text-transform: uppercase;font-weight: bold;">{{ $show_project_parent->project_code }}</h6>
                                                    </a>
                                                </td>
                                                <td data-label="Tên dự án:" class="text-primary p-1">
                                                    <a href="{{ url('page-project-one/'.$show_project_parent->id) }}">
                                                        <b>{{ $show_project_parent->project_name }}</b>
                                                    </a>
                                                </td>
                                                <td data-label="Mô tả dự án:" class="text-muted p-1">
                                                    <p>{{ $show_project_parent->project_description }}</p>
                                                </td>
                                                <td data-label="Khởi tạo:" class="p-1">
                                                    @php($get_project_users = DB::table('project_and_users')->where('project_parent_id',$show_project_parent->id)->get())
                                                    @foreach($get_project_users as $get_project_user)
                                                        @php($users = DB::table('users')->where('id',$get_project_user->user_id)->get())
                                                        @foreach($users as $user)
                                                            <b>{{ $user->fullname }}</b> <br>
                                                        @endforeach
                                                    @endforeach
                                                </td>

                                                @if (Auth::user()->role_id ==1)
                                                <td data-label="Tùy chọn:" class="p-1">
                                                    <a class="btn btn-success btn-xs"
                                                       href="{{ url('division-user/'.$show_project_parent->id) }}" title="Phân công">
                                                        <i class="fa fa-user-plus"></i>
                                                    </a>
                                                </td>
                                                @endif

                                                <td data-label="Tùy chọn:" class="p-1">
                                                    <a class="btn btn-primary btn-xs"
                                                    href="{{ url('page-edit-project-parent/'.$show_project_parent->id) }}" title="Chỉnh sửa">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td data-label="Chọn:" class="p-1">
                                                    <a class="btn btn-danger btn-xs"
                                                    href="{{ url('delete-project-parent/'.$show_project_parent->id) }}" title="Xóa"
                                                    onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                                <td data-label="Chọn:" class="p-1">
                                                    <a class="btn btn-warning btn-xs"
                                                       href="{{ url('history-project-parent/'.$show_project_parent->id) }}" title="Lịch sử">
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
                                            {{--TẤT CẢ DỰ ÁN--}}



                                        @else


                                            {{--DỰ ÁN CỦA NGƯỜI DÙNG--}}
                                            @forelse($show_project_parents as $key => $show_project_parent)
                                                @php($get_project_users = DB::table('project_and_users')
                                                ->where([['user_id','=',Auth::id()], ['project_parent_id','=',$show_project_parent->id]])->get())
                                                @foreach($get_project_users as $get_project_user)
                                                <tr>
                                                    <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                                    <td data-label="Mã dự án:" class="text-primary p-1">
                                                        <a href="{{ url('page-project-one/'.$show_project_parent->id) }}">
                                                            <h6 style="text-transform: uppercase;font-weight: bold;">{{ $show_project_parent->project_code }}</h6>
                                                        </a>
                                                    </td>
                                                    <td data-label="Tên dự án:" class="text-primary p-1">
                                                        <a href="{{ url('page-project-one/'.$show_project_parent->id) }}">
                                                        <b>{{ $show_project_parent->project_name }}</b>
                                                        </a>
                                                    </td>
                                                    <td data-label="Mô tả dự án:" class="text-muted p-1">
                                                        <p>{{ $show_project_parent->project_description }}</p>
                                                    </td>
                                                    <td data-label="Khởi tạo:" class="p-1">
                                                        @php($users = DB::table('users')->where('id',$get_project_user->user_id)->get())
                                                        @foreach($users as $user)
                                                            <b>{{ $user->fullname }}</b> <br>
                                                        @endforeach
                                                    </td>

                                                    @if (Auth::user()->role_id ==1)
                                                        <td data-label="Tùy chọn:" class="p-1">
                                                            <a class="btn btn-success btn-xs"
                                                            href="{{ url('division-user/'.$show_project_parent->id) }}" title="Phân công">
                                                                <i class="fa fa-user-plus"></i>
                                                            </a>
                                                        </td>
                                                    @endif

                                                    <td data-label="Tùy chọn:" class="p-1">
                                                        <a class="btn btn-primary btn-xs"
                                                        href="{{ url('page-edit-project-parent/'.$show_project_parent->id) }}" title="Chỉnh sửa">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td data-label="Chọn:" class="p-1">
                                                        <a class="btn btn-danger btn-xs"
                                                        href="{{ url('delete-project-parent/'.$show_project_parent->id) }}" title="Xóa" onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                    <td data-label="Chọn:" class="p-1">
                                                        <a class="btn btn-warning btn-xs"
                                                        href="{{ url('history-project-parent/'.$show_project_parent->id) }}" title="Lịch sử">
                                                            <i class="fa fa-history"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @empty
                                                <tr>
                                                    <td colspan="9">
                                                        <b class="text-danger">Không có dữ liệu</b>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            {{--DỰ ÁN CỦA NGƯỜI DÙNG--}}
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {{--pagination--}}
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $show_project_parents->links() }}
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

    {{--Thông báo box--}}
    @if (Session::has('add_project_parent_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã thêm dự án'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('add_division_user_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã phân công dự án'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('update_project_parent_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã cập nhật dự án'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('delete_project_parent_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa dự án'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
{{--======================================================--}}




