@extends('page.manage_profile.profile_user_layout')
@section('tab-content')

    <div class="tab-content p-0">
        <div class="tab-pane active">
            <form class="form-horizontal needs-validation" novalidate
            action="{{ url('update-change-password/'.Auth::id()) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Mật khẩu cũ:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="inputPasswordOld" placeholder="Nhập mật khẩu cũ" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Mật khẩu mới:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="inputPasswordNew" placeholder="Nhập mật khẩu mới" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Xác nhận mật khẩu mới:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="inputPasswordNewComfirm" placeholder="Nhập xác nhận mật khẩu mới" required>
                    </div>
                </div>

                <div class="form-group row text-right">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-success">Thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>

    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    {{--Thông báo box--}}
    @if (Session::has('old_pass_fail'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Mật khẩu cũ không đúng !'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

    {{--Thông báo box--}}
    @if (Session::has('change_password_user_fail'))
        <script type="text/javascript">
            Swal.fire({
                position: 'center'
                , icon: 'error'
                , title: 'Xác nhận mật khẩu sai !'
                , showConfirmButton: false
                , timer: 2000
            });
        </script>
    @endif
    {{--Thông báo box--}}

@endsection
