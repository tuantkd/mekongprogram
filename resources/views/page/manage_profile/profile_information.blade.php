@extends('page.manage_profile.profile_user_layout')
@section('tab-content')

    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);
        .button-wrapper {
            position: relative;
            width: 150px;
            text-align: center;
        }

        .button-wrapper span.label {
            position: relative;
            z-index: 0;
            display: inline-block;
            width: 100%;
            background: #00bfff;
            cursor: pointer;
            color: #fff;
            padding: 8px 0;
            text-transform:uppercase;
            font-size:12px;
            border-radius:5px;
        }

        #upload {
            display: inline-block;
            position: absolute;
            z-index: 1;
            height: 50px;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
            border-radius:5px;
        }
    </style>

    <div class="tab-content p-0">
        <div class="tab-pane active">
            <form class="form-horizontal" action="{{ url('update-profile-user/'.Auth::id()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Họ và tên:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="inputFullname" value="{{ $profile_user->fullname }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Tài khoản:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="inputUsername" value="{{ $profile_user->username }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Giới tính:</label>
                    <div class="col-sm-9">
                        @if($profile_user->sex == null)
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
                        @elseif($profile_user->sex == 'Nữ')
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Nam" disabled>Nam
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Nữ" checked>Nữ
                                </label>
                            </div>
                        @elseif($profile_user->sex == 'Nam')
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Nam" checked>Nam
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="inputSex" value="Nữ" disabled>Nữ
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Ngày sinh:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="{{ $profile_user->birthday }}" name="inputBirthday">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Điện thoại:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="inputPhone" value="{{ $profile_user->phone }}" placeholder="Cập nhật số điện thoại">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="inputEmail" value="{{ $profile_user->email }}" placeholder="Cập nhật email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="inputAddress" value="{{ $profile_user->address }}" placeholder="Cập nhật số địa chỉ">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Ảnh đại diện:</label>
                    <div class="col-sm-9">
                        <div class="button-wrapper">
                            <span class="label">
                                <i class="fa fa-camera"></i> Thay đổi ảnh
                            </span>
                            <input type="file" name="inputFileAvatar" id="upload" class="upload-box" onchange="return fileValidation()">
                        </div>
                        <!-- Image preview -->
                        <div id="imagePreview"></div>
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>

    <script>
        function fileValidation(){
            var fileInput = document.getElementById('upload');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('Vui lòng tải lên tệp có phần mở rộng .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="margin-top:5px;border-radius:50%;max-width:100%;height:100px;"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>

    {{--Thông báo box--}}
    @if (Session::has('update_profile_session'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'success'
                , title: 'Đã cập nhật thông tin'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
