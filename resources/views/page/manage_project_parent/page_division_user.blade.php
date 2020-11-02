@extends('layout.layout')
@section('title','Phân công dự án')
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
                        <li class="breadcrumb-item active">Phân công dự án</li>
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
                <section class="col-lg-6">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    PHÂN CÔNG DỰ ÁN
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">

                            <form action="{{ url('post-division-user/'.$project_parent_id->id) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-5">
                                        <label for="">Dự án</label>
                                        <input type="text" name="inputCodeProject" value="{{ $project_parent_id->project_code }}"
                                        class="form-control" disabled>
                                    </div>

                                    <div class="col-7">
                                        <label for="">Người dùng</label>
                                        <select name="inputUserId" class="form-control">
                                            <option value="">- - Chọn - -</option>

                                            @php($get_users = DB::table('users')->where('role_id',2)->get())
                                            @foreach($get_users as $get_user)
                                            <option value="{{ $get_user->id }}">{{ $get_user->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Phân công</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <section class="col-lg-6">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    NGƯỜI DÙNG DỰ ÁN
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
                                        <th scope="col">Mã dự án</th>
                                        <th scope="col">Tên người dùng</th>
                                        <th scope="col">Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($show_division_users as $key => $show_division_user)
                                        <tr>
                                            <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                            <td data-label="Mã dự án:" class="text-primary p-1">
                                                <h6 style="text-transform: uppercase;font-weight: bold;">
                                                    @php($project_parents = DB::table('project_parents')->where('id',$show_division_user->project_parent_id)->get())
                                                    @foreach($project_parents as $project_parent)
                                                    {{ $project_parent->project_code }}
                                                    @endforeach
                                                </h6>
                                            </td>
                                            <td data-label="Tên dự án:" class="text-primary p-1">
                                                @php($users = DB::table('users')->where('id',$show_division_user->user_id)->get())
                                                @foreach($users as $user)
                                                    <h6>{{ $user->fullname }}</h6>
                                                @endforeach
                                            </td>
                                            <td data-label="Chọn:" class="p-1">
                                                <a class="btn btn-danger btn-xs"
                                                href="{{ url('delete-division-user/'.$show_division_user->id) }}" title="Xóa"
                                                onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
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


    @if (Session::has('mes_error'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Người dùng đã phân công !'
                , showConfirmButton: false
                , timer: 3000
            });
        </script>
    @endif

    @if (Session::has('delete_division_user_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa phân công !'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




