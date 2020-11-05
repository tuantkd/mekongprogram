@extends('layout.layout')
@section('title','Thêm dự án cấp ba')
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
                        <li class="breadcrumb-item active">Thêm dự án cấp ba</li>
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
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    THÊM DỰ ÁN CẤP BA
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('post-add-project-three/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$project_two_id->id) }}"
                            id="AddProjectLevelThree" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 col-lg-2">
                                        <label for="">Mã hoạt động</label>
                                        <input type="text" name="inputCodeProjectThree" class="form-control" placeholder="Nhập mã hoạt động">
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Tên hoạt động</label>
                                        <textarea name="inputNameOperation" rows="3"
                                                  class="form-control" placeholder="Nhập tên hoạt động"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Chỉ số cần đạt</label>
                                        <textarea name="inputIndexReach" rows="3"
                                                  class="form-control" placeholder="Nhập chỉ số cần đạt"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-2"></div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Kết quả cần đạt</label>
                                        <textarea name="inputResultReach" rows="3"
                                                  class="form-control" placeholder="Nhập kết quả cần đạt"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Ghi chú</label>
                                        <textarea name="inputNote" rows="3"
                                                  class="form-control" placeholder="Nhập ghi chú"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-10 offset-lg-2">
                                        <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                                    </div>
                                </div>
                            </form>
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


    <script>
        jQuery.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $( "#AddProjectLevelThree" ).validate({
            rules: {
                inputCodeProjectThree: {
                    required: true
                },
                inputNameOperation: {
                    required: true
                },
                inputIndexReach: {
                    required: true
                },
                inputResultReach: {
                    required: true
                }
            },
            messages: {
                inputCodeProjectThree: "Nhập mã hoạt động",
                inputNameOperation: "Chưa nhập tên hoạt động",
                inputIndexReach: "Chưa nhập chỉ số cần đạt",
                inputResultReach: "Chưa nhập kết quả cần đạt"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>


    {{--Thông báo box--}}
    @if (Session::has('mes_error_three_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Mã hoạt động đã tồn tại'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

    @if (Session::has('mes_required_three_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Bắt buộc phải có ký tự mã trước!'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}


@endsection
{{--======================================================--}}




