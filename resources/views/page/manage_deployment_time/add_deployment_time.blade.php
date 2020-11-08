@extends('layout.layout')
@section('title','Thêm thời gian triển khai')
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
                        <li class="breadcrumb-item">
                            <a href="{{ url('page-deployment-time/'.$project_parent_id->id.'/'
                            .$project_one_id->id.'/'.$project_two_id->id.'/'.$project_three_id->id) }}">
                                {{ $project_three_id->project_three_code }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Thêm thời gian triển khai</li>
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
                <section class="col-lg-12">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                    THÊM THỜI GIAN TRIỂN KHAI
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('post-add-deployment-time/'.$project_parent_id->id.'/'
                            .$project_one_id->id.'/'.$project_two_id->id.'/'.$project_three_id->id) }}"
                            id="AddDeployment" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 col-lg-2">
                                        <label for="">Tháng khởi tạo</label>
                                        <select name="inputMonthInitialize" class="form-control">
                                            <option value="">- - Tháng - -</option>
                                            <option value="1">Tháng 1</option>
                                            <option value="2">Tháng 2</option>
                                            <option value="3">Tháng 3</option>
                                            <option value="4">Tháng 4</option>
                                            <option value="5">Tháng 5</option>
                                            <option value="6">Tháng 6</option>
                                            <option value="7">Tháng 7</option>
                                            <option value="8">Tháng 8</option>
                                            <option value="9">Tháng 9</option>
                                            <option value="10">Tháng 10</option>
                                            <option value="11">Tháng 11</option>
                                            <option value="12">Tháng 12</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label for="">Năm khởi tạo</label>
                                        <select name="inputYearInitialize" class="form-control">
                                            <option value="">- - Năm - -</option>
                                            <?php
                                                for($i = 2018 ; $i <= date('Y'); $i++){
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <label for="">Số tiền dự án</label>
                                        <input name="inputNumberMoneyInitial" type="number" class="form-control"
                                               placeholder="Số tiền dự án">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Đối tác</label>
                                        <textarea name="inputPartner" rows="3" class="form-control"
                                        placeholder="Nhập đối tác"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Địa điểm</label>
                                        <textarea name="inputAddress" rows="3" class="form-control" placeholder="Nhập địa điểm"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Mô tả</label>
                                        <textarea name="inputDiscribe" rows="3" class="form-control" placeholder="Nhập mô tả"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-12">
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
        $( "#AddDeployment" ).validate({
            rules: {
                inputDateInitialize: {
                    required: true
                },
                inputNumberMoneyInitial: {
                    required: true
                },
                inputPartner: {
                    required: true
                },
                inputAddress: {
                    required: true
                }
            },
            messages: {
                inputDateInitialize: "Chọn ngày khởi tạo",
                inputNumberMoneyInitial: "Chưa nhập số tiền",
                inputPartner: "Chưa nhập đối tác",
                inputAddress: "Chưa nhập địa điểm",
                inputDiscribe: "Chưa nhập mô tả"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>


    @if (Session::has('mes_exist_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Tháng năm đã tồn tại!'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif


@endsection
{{--======================================================--}}




