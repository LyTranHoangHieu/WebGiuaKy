
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.header')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Đăng Nhập</b></a>
            </div>
            <div class="card-body">
                @include('admin.alert')
                <form id="loginForm" action="/admin/users/login/store" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu">
                        </div>
                        <div>
                            <input type="checkbox" name="remember" id="remember">
                            <label>
                                Ghi nhớ đăng nhập
                            </label>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                    </div>
                    @csrf
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    @include('admin.footer')
    <script>
        $(function () {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    email: {
                        required: "Vui lòng nhập địa chỉ email",
                        email: "Vui lòng nhập đúng định dạng email",
                    },
                    password: {
                        required: "Vui lòng cung cấp mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 5 ký tự"
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                }
            });
        });
    </script>
</body>
</html>
