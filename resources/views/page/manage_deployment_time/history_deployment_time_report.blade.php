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
                        <li class="breadcrumb-item">
                            <a href="{{ url('page-month-project-report/'.$deployment_time_id->id) }}">
                                Tháng báo cáo
                            </a>
                        </li>
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
                                        <th scope="col" style="width:10%;">Tiền thực tế</th>
                                        <th scope="col" style="width:20%;">Chỉ số đạt được</th>
                                        <th scope="col" style="width:20%;">Kế quả đạt được</th>
                                        <th scope="col" style="width:15%;">Sửa bởi</th>
                                        <th scope="col" style="width:15%;">Ngày sửa</th>
                                        @if (Auth::user()->role_id == 1)
                                            <th scope="col" style="width:5%;">Chọn</th>
                                        @else
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($history_deployment_time_reports as $key => $deployment_time)
                                        <tr>
                                            <td data-label="STT:" class="p-1"><b>{{ ++$key }}</b></td>
                                            <td data-label="Số tiền thực tế:" class="text-primary p-1">
                                                <b class="text-danger">
                                                    {{ number_format($deployment_time->deployment_number_money_real) }} Đ
                                                </b>
                                            </td>
                                            <td data-label="Chỉ số đạt được:" class="text-muted p-1">
                                                <p class="text-danger">{{ $deployment_time->deployment_index_achieved }}</p>
                                            </td>
                                            <td data-label="Kết quả đạt được:" class="text-muted p-1">
                                                <p class="text-danger">{{ $deployment_time->deployment_result_achieved }}</p>
                                            </td>
                                            <td data-label="Sửa bởi:" class="p-1">
                                                @php($users = DB::table('users')->where('id',$deployment_time->user_id)->get())
                                                @foreach($users as $user)
                                                    <b>{{ $user->fullname }}</b>
                                                @endforeach
                                            </td>
                                            <td data-label="Ngày sửa:" class="p-1">
                                                {{ date('d/m/Y H:i:s', strtotime($deployment_time->created_at)) }}
                                            </td>

                                            @if (Auth::user()->role_id ==1)
                                                <td data-label="Chọn:" class="p-1">
                                                    <a class="btn btn-danger btn-xs"
                                                       href="{{ url('delete-history-deployment-time-report/'.$deployment_time->id) }}" title="Xóa"
                                                       onclick="return confirm('Bạn có chắc chắn xóa ?');">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                <b class="text-danger">Không có dữ liệu</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{--pagination--}}
                            <ul class="pagination justify-content-center pagination-sm">
                                {{ $history_deployment_time_reports->links() }}
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

    @if (Session::has('delete_history_deployment_time_report_session'))
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




