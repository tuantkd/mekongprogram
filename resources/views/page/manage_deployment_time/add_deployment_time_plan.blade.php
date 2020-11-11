@extends('layout.layout')
@section('title','Thêm kế hoạch')
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
                            <a href="{{ url('page-month-project-plan/'.$add_deployment_time_plan->id) }}">
                                Tháng kế hoạch
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Thêm kế hoạch</li>
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
                <section class="col-lg-8 offset-lg-2">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <b>
                                    <i class="ion ion-clipboard mr-1"></i>
                                     THÊM KẾ HOẠCH
                                    <b class="text-info">{{ $add_deployment_time_plan->deployment_month_initialize }}/{{ $add_deployment_time_plan->deployment_year_initialize }}</b>
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('update-deployment-time-plan/'.$add_deployment_time_plan->id) }}" id="EditDeployment" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-12 col-lg-3">
                                        <label for="">Ngày bắt đầu:</label>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <select name="inputDayInitializeStart" class="form-control">
                                            <option value="">- - Chọn Ngày - -</option>
                                            <option value="1">Ngày 1</option>
                                            <option value="2">Ngày 2</option>
                                            <option value="3">Ngày 3</option>
                                            <option value="4">Ngày 4</option>
                                            <option value="5">Ngày 5</option>
                                            <option value="6">Ngày 6</option>
                                            <option value="7">Ngày 7</option>
                                            <option value="8">Ngày 8</option>
                                            <option value="9">Ngày 9</option>
                                            <option value="10">Ngày 10</option>
                                            <option value="11">Ngày 11</option>
                                            <option value="12">Ngày 12</option>
                                            <option value="13">Ngày 13</option>
                                            <option value="14">Ngày 14</option>
                                            <option value="15">Ngày 15</option>
                                            <option value="16">Ngày 16</option>
                                            <option value="17">Ngày 17</option>
                                            <option value="18">Ngày 18</option>
                                            <option value="19">Ngày 19</option>
                                            <option value="20">Ngày 20</option>
                                            <option value="21">Ngày 21</option>
                                            <option value="22">Ngày 22</option>
                                            <option value="23">Ngày 23</option>
                                            <option value="24">Ngày 24</option>
                                            <option value="25">Ngày 25</option>
                                            <option value="26">Ngày 26</option>
                                            <option value="27">Ngày 27</option>
                                            <option value="28">Ngày 28</option>
                                            <option value="29">Ngày 29</option>
                                            <option value="30">Ngày 30</option>
                                            <option value="31">Ngày 31</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <select name="inputMonthInitializeStart" class="form-control">
                                            <option value="">- - Chọn Tháng - -</option>
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
                                    <div class="col-12 col-lg-3">
                                        <select name="inputYearInitializeStart" class="form-control">
                                            <option value="">- - Chọn Năm - -</option>
                                            <?php
                                            for($i = 2018 ; $i <= date('Y'); $i++){
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-3">
                                        <label for="">Ngày kết thúc:</label>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <select name="inputDayInitializeEnd" class="form-control">
                                            <option value="">- - Chọn Ngày - -</option>
                                            <option value="1">Ngày 1</option>
                                            <option value="2">Ngày 2</option>
                                            <option value="3">Ngày 3</option>
                                            <option value="4">Ngày 4</option>
                                            <option value="5">Ngày 5</option>
                                            <option value="6">Ngày 6</option>
                                            <option value="7">Ngày 7</option>
                                            <option value="8">Ngày 8</option>
                                            <option value="9">Ngày 9</option>
                                            <option value="10">Ngày 10</option>
                                            <option value="11">Ngày 11</option>
                                            <option value="12">Ngày 12</option>
                                            <option value="13">Ngày 13</option>
                                            <option value="14">Ngày 14</option>
                                            <option value="15">Ngày 15</option>
                                            <option value="16">Ngày 16</option>
                                            <option value="17">Ngày 17</option>
                                            <option value="18">Ngày 18</option>
                                            <option value="19">Ngày 19</option>
                                            <option value="20">Ngày 20</option>
                                            <option value="21">Ngày 21</option>
                                            <option value="22">Ngày 22</option>
                                            <option value="23">Ngày 23</option>
                                            <option value="24">Ngày 24</option>
                                            <option value="25">Ngày 25</option>
                                            <option value="26">Ngày 26</option>
                                            <option value="27">Ngày 27</option>
                                            <option value="28">Ngày 28</option>
                                            <option value="29">Ngày 29</option>
                                            <option value="30">Ngày 30</option>
                                            <option value="31">Ngày 31</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <select name="inputMonthInitializeEnd" class="form-control">
                                            <option value="">- - Chọn Tháng - -</option>
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
                                    <div class="col-12 col-lg-3">
                                        <select name="inputYearInitializeEnd" class="form-control">
                                            <option value="">- - Chọn Năm - -</option>
                                            <?php
                                            for($i = 2018 ; $i <= date('Y'); $i++){
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-lg-3">
                                        <label for="">Số tiền hoạt động:</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <input type="number" name="inputMoneyOperating" class="form-control" placeholder="Nhập số tiền hoạt động">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-3">
                                        <label for="">P.Pháp thực hiện:</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <textarea name="inputMethodImplementation" rows="3"
                                                  class="form-control" placeholder="Nhập phương pháp thực hiện"></textarea>
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
        $( "#EditDeployment" ).validate({
            rules: {
                inputDayInitializeStart: {
                    required: true
                },
                inputMonthInitializeStart: {
                    required: true
                },
                inputYearInitializeStart: {
                    required: true
                },

                inputDayInitializeEnd: {
                    required: true
                },
                inputMonthInitializeEnd: {
                    required: true
                },
                inputYearInitializeEnd: {
                    required: true
                },

                inputMoneyOperating: {
                    required: true
                },
                inputMethodImplementation: {
                    required: true
                }
            },
            messages: {
                inputDayInitializeStart: "Chưa chọn ngày",
                inputMonthInitializeStart: "Chưa chọn tháng",
                inputYearInitializeStart: "Chưa chọn năm",

                inputDayInitializeEnd: "Chưa chọn ngày",
                inputMonthInitializeEnd: "Chưa chọn tháng",
                inputYearInitializeEnd: "Chưa chọn năm",

                inputMoneyOperating: "Chưa nhập số tiền hoạt động",
                inputMethodImplementation: "Chưa nhập phương pháp thực hiện"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>

    @if (Session::has('mes_error_month_year_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Tháng/Năm bắt đầu và kết thúc không hợp lệ!'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif

@endsection
{{--======================================================--}}




