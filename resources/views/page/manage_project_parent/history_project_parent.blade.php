@extends('layout.layout')
@section('title','Lịch sử chỉnh sửa')
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
                        <li class="breadcrumb-item active">Lịch sử chỉnh sửa</li>
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
                                <b><i class="ion ion-clipboard mr-1"></i> LỊCH SỬ CHỈNH SỬA</b>
                            </h3>
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
                                        <th scope="col" style="width:30%;">Mô tả dự án</th>
                                        <th scope="col" style="width:15%;">Sửa bởi</th>
                                        <th scope="col" style="width:15%;">Ngày sửa</th>
                                        @if (Auth::user()->role_id == 1)
                                        <th scope="col" style="width:5%;">Chọn</th>
                                        @else
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($history_parents as $key => $history_parent)
                                            <tr>
                                                <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                                <td data-label="Mã dự án:" class="text-primary p-1">
                                                    <h6 style="text-transform: uppercase;font-weight: bold;">{{ $history_parent->project_code }}</h6>
                                                </td>
                                                <td data-label="Tên dự án:" class="text-primary p-1">
                                                    <b class="text-danger">{{ $history_parent->project_name }}</b>
                                                </td>
                                                <td data-label="Mô tả dự án:" class="text-muted p-1">
                                                    <p class="text-danger">{{ $history_parent->project_description }}</p>
                                                </td>
                                                <td data-label="Sửa bởi:" class="p-1">
                                                    @php($users = DB::table('users')->where('id',$history_parent->user_id)->get())
                                                    @foreach($users as $user)
                                                        <b>{{ $user->fullname }}</b> <br>
                                                    @endforeach
                                                </td>

                                                <td data-label="Ngày sửa:" class="p-1">
                                                    {{ date('d/m/Y H:i:s', strtotime($history_parent->created_at)) }}
                                                </td>

                                                @if (Auth::user()->role_id ==1)
                                                <td data-label="Chọn:" class="p-1">
                                                    <a class="btn btn-danger btn-xs"
                                                       href="{{ url('delete-history-project-parent/'.$history_parent->id) }}" title="Xóa"
                                                       onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                                @endif
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

                            {{--pagination--}}
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $history_parents->links() }}
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

    @if (Session::has('delete_history_project_parent_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã xóa lịch sử chỉnh sửa'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
{{--======================================================--}}




