@extends('layout.layout')
@section('title','Chỉnh sửa dự án')
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
                        <li class="breadcrumb-item active">Chỉnh sửa dự án</li>
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
                <div class="col-lg-3"></div>
                <section class="col-lg-6 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    CHỈNH SỬA DỰ ÁN
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="" id="AddAdmin" method="POST">
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Mã dự án</label>
                                        <input type="text" name="inputCodeProject" class="form-control" placeholder="Nhập mã dự án">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Tên dự án</label>
                                        <input type="text" name="inputNameProject" class="form-control" placeholder="Nhập tên dự án">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-12">
                                        <label for="">Mô tả dự án</label>
                                        <textarea name="inputDiscribeProject" rows="5" class="form-control" placeholder="Nhập mô tả dự án"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <div class="col-lg-3"></div>
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
        $( "#AddAdmin" ).validate({
            rules: {
                inputCodeProject: {
                    required: true
                },
                inputNameProject: {
                    required: true
                },
                inputDiscribeProject: {
                    required: true
                }
            },
            messages: {
                inputCodeProject: "Chưa nhập mã dự án",
                inputNameProject: "Chưa nhập tên dự án",
                inputDiscribeProject: "Chưa nhập mô tả dự án"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>


@endsection
{{--======================================================--}}




