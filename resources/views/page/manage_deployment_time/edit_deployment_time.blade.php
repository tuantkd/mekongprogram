@extends('layout.layout')
@section('title','Chỉnh sửa thời gian triển khai')
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
                        <li class="breadcrumb-item"><a href="{{ url('page-project-one') }}">VN-0054</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-project-two') }}">1.1</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-project-three') }}">1.1.1</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-deployment-time') }}">1.1.1.1</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa thời gian triển khai</li>
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
                <section class="col-lg-10 offset-lg-1">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    CHỈNH SỬA THỜI GIAN TRIỂN KHAI
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="" id="AddDeployment" method="POST">
                                <div class="form-group row">
                                    <div class="col-12 col-lg-2">
                                        <label for="">Tháng triển khai</label>
                                        <select class="form-control" name="inputMonthDeployment">
                                            <option value="">- - Chọn - -</option>
                                            <option value="Tháng 1">Tháng 1</option>
                                            <option value="Tháng 2">Tháng 2</option>
                                            <option value="Tháng 3">Tháng 3</option>
                                            <option value="Tháng 4">Tháng 4</option>
                                            <option value="Tháng 5">Tháng 5</option>
                                            <option value="Tháng 6">Tháng 6</option>
                                            <option value="Tháng 7">Tháng 7</option>
                                            <option value="Tháng 8">Tháng 8</option>
                                            <option value="Tháng 9">Tháng 9</option>
                                            <option value="Tháng 10">Tháng 10</option>
                                            <option value="Tháng 11">Tháng 11</option>
                                            <option value="Tháng 12">Tháng 12</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <label for="">Số tiền</label>
                                        <input name="inputNumberMoney" type="number" class="form-control" placeholder="Nhập số tiền">
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <label for="">Đối tác</label>
                                        <textarea name="inputPartner" rows="2" class="form-control" placeholder="Nhập đối tác"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-5">
                                        <label for="">Địa điểm</label>
                                        <textarea name="inputAddress" rows="3" class="form-control" placeholder="Nhập địa điểm"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <label for="">Mô tả</label>
                                        <textarea name="inputDiscribe" rows="3" class="form-control" placeholder="Nhập mô tả"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-12">
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
        $( "#AddDeployment" ).validate({
            rules: {
                inputMonthDeployment: {
                    required: true
                },
                inputNumberMoney: {
                    required: true
                },
                inputPartner: {
                    required: true
                },
                inputAddress: {
                    required: true
                },
                inputDiscribe: {
                    required: true
                }
            },
            messages: {
                inputMonthDeployment: "Chưa chọn tháng",
                inputNumberMoney: "Chưa nhập số tiền",
                inputPartner: "Chưa nhập đối tác",
                inputAddress: "Chưa nhập địa điểm",
                inputDiscribe: "Chưa nhập mô tả"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>


@endsection
{{--======================================================--}}




