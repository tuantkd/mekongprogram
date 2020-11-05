@extends('layout.layout')
@section('title','Chỉnh sửa dự án cấp hai')
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
                        <li class="breadcrumb-item active">Chỉnh sửa dự án cấp hai</li>
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
                                    CHỈNH SỬA DỰ ÁN CẤP HAI
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('update-project-two/'.$project_parent_id->id.'/'.$project_one_id->id.'/'.$edit_project_two->id) }}"
                            id="EditProjectLevelTwo" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-lg-2">
                                        <label for="">Mã hoạt động</label>
                                        <input type="text" name="inputCodeProject" class="form-control" disabled
                                        value="{{ $edit_project_two->project_two_code }}">
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Tên hoạt động</label>
                                        <textarea name="inputNameOperation" rows="3"
                                        class="form-control" placeholder="Nhập tên hoạt động">{{ $edit_project_two->project_two_name_operation }}</textarea>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Chỉ số cần đạt</label>
                                        <textarea name="inputIndexReach" rows="3"
                                        class="form-control" placeholder="Nhập chỉ số cần đạt">{{ $edit_project_two->project_two_index_need_reach }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-2"></div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Kết quả cần đạt</label>
                                        <textarea name="inputResultReach" rows="3"
                                        class="form-control" placeholder="Nhập kết quả cần đạt">{{ $edit_project_two->project_two_result_need_reach }}</textarea>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <label for="">Ghi chú</label>
                                        <textarea name="inputNote" rows="3"
                                        class="form-control" placeholder="Nhập ghi chú">{{ $edit_project_two->project_two_note }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-10 offset-lg-2">
                                        <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
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
        $( "#EditProjectLevelTwo" ).validate({
            rules: {
                inputNameOperation: {
                    required: true
                },
                inputIndexReach: {
                    required: true
                },
                inputResultReach: {
                    required: true
                },
                inputNote: {
                    required: true
                }
            },
            messages: {
                inputNameOperation: "Chưa nhập tên hoạt động",
                inputIndexReach: "Chưa nhập chỉ số cần đạt",
                inputResultReach: "Chưa nhập kết quả cần đạt",
                inputNote: "Chưa nhập ghi chú"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>


@endsection
{{--======================================================--}}




