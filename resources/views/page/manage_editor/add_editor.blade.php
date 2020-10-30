@extends('layout.layout')
@section('title','Thêm điều phối viên')
{{--======================================================--}}


{{--======================================================--}}
@section('content-header')
    <div class="content-header">
        <div class="container-fluid p-0">
            <div class="row mb-2">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('page-editor') }}">Điều phối viên</a></li>
                        <li class="breadcrumb-item active">Thêm điều phối viên</li>
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
        .profile-picture-upload {
            display: inline;
        }

        .imagePreview {
            vertical-align: middle;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            margin-right: 8px;
            -webkit-box-shadow: 0px 3px 10px 2px rgba(0,0,0,0.35);
            -moz-box-shadow: 0px 3px 10px 2px rgba(0,0,0,0.35);
            box-shadow: 0px 3px 10px 2px rgba(0,0,0,0.35);
        }

        .hidden {
            position: absolute;
            width: 0px;
            height: 0px;
            left: -999999px;
        }

        .action-button {
            border: 1px solid black;
            background: none;
            padding: 8px;
            cursor: pointer;
            outline: 0;
            border-radius: 6px;

        &.mode-upload {
             color: #004085;
             border-color: #b8daff;
             background-color: #cce5ff;
         }

        &.mode-remove {
             color: #721c24;
             border: 1px solid #f5c6cb;
             background-color: #f8d7da;
         }
        }
    </style>

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
                                    THÊM ĐIỀU PHỐI VIÊN
                                </b>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <form action="{{ url('post-page-add-editor') }}" id="AddAdmin" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Tên tài khoản</label>
                                        <input type="text" name="inputUsername" class="form-control" placeholder="Nhập tên tài khoản">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Mật khẩu</label>
                                        <input type="password" name="inputPassword" class="form-control" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="inputFullname" class="form-control" placeholder="Nhập tên tài khoản">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Giới tính</label><br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="inputSex" value="Nam">Nam
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="inputSex" value="Nữ">Nữ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Ngày sinh</label>
                                        <input type="date" name="inputBirthday" class="form-control" placeholder="Nhập chọn ngày sinh">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Điện thoại</label>
                                        <input type="number" name="inputPhone" class="form-control" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Email</label>
                                        <input type="email" name="inputEmail" class="form-control" placeholder="Nhập địa chỉ email">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Địa chỉ</label>
                                        <textarea name="inputAddress" class="form-control" rows="3" placeholder="Nhập địa chỉ cư trú"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-6">
                                        <label for="">Điện thoại</label>
                                        <input type="number" name="inputPhone" class="form-control" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="">Ảnh đại diện &ensp;</label><br>
                                        <div class="profile-picture-upload">
                                            <img src="" alt="Profile picture preview" class="imagePreview">
                                            <button class="action-button mode-upload btn-xs text-success" type="button">
                                                <i class="fa fa-camera"></i> Chọn ảnh
                                            </button>
                                            <input type="file" class="hidden" name="fileInput"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Thêm</button>
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
                inputFullname: {
                    required: true
                },
                inputUsername: {
                    required: true
                },
                inputPassword: {
                    required: true
                }
            },
            messages: {
                inputFullname: "Chưa nhập họ và tên",
                inputUsername: "Chưa nhập tên tài khoản",
                inputPassword: "Chưa nhập mật khẩu"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    </script>


    <script>
        let picturePreview = document.querySelector(".imagePreview");
        let actionButton = document.querySelector(".action-button");
        let fileInput = document.querySelector("input[name='fileInput']");
        let fileReader = new FileReader();

        const DEFAULT_IMAGE_SRC = "https://www.drupal.org/files/profile_default.png";

        actionButton.addEventListener("click", () => {
            if ( picturePreview.src !== DEFAULT_IMAGE_SRC ) {
                resetImage();
            } else {
                fileInput.click();
            }
        });

        fileInput.addEventListener("change", () => {
            refreshImagePreview();
        });

        function resetImage() {
            setActionButtonMode("upload");
            picturePreview.src = DEFAULT_IMAGE_SRC;
            fileInput.value = "";
        }

        function setActionButtonMode(mode) {
            let modes = {
                "upload": function() {
                    actionButton.innerText = "Chọn ảnh";
                    actionButton.classList.remove("mode-remove");
                    actionButton.classList.add("mode-upload");
                },
                "remove": function() {
                    actionButton.innerText = "Xóa ảnh";
                    actionButton.classList.remove("mode-upload");
                    actionButton.classList.add("mode-remove");
                }
            }
            return (modes[mode]) ? modes[mode]() : console.error("unknown mode");
        }

        function refreshImagePreview() {
            if ( picturePreview.src !== DEFAULT_IMAGE_SRC ) {
                picturePreview.src = DEFAULT_IMAGE_SRC;
            } else {
                if ( fileInput.files && fileInput.files.length > 0 ){
                    fileReader.readAsDataURL(fileInput.files[0]);
                    fileReader.onload = (e) => {
                        picturePreview.src = e.target.result;
                        setActionButtonMode("remove");
                    }
                }
            }
        }
        refreshImagePreview();
    </script>

@endsection
{{--======================================================--}}




