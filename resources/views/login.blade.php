<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập | Quản lý Đoàn viên | Trường Đại học Nha Trang</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <x-includes.css></x-includes.css>
    <x-includes.js></x-includes.js>
    <link href="{{ asset('css/bg.css') }}" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="margin: 5% auto; margin-left: 58%;">
        <div class="login-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo-doan.webp') }}" alt="" style="display: block;width: 80px;margin: 5px auto;"><b>QUẢN LÝ ĐOÀN VIÊN</b></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">
                - Đăng nhập vào hệ thống -
            </p>
            <form onsubmit="App.TaiKhoan.DangNhap();return false;" id="frmDangNhap">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <div id="ajaxLoadingBar"></div>
                    <div id="errDangNhap" class="text-danger" style="display: none;"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block btn-flat">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn btn-primary btn-block btn-flat" href="/oauth/google"><img
                            src="https://img.icons8.com/color/16/000000/google-logo.png"> Đăng nhập bằng Google</a>
                </div>
                <br>
            </form>
        </div>
    </div>
</body>

</html>
