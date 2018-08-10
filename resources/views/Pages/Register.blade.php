<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S.M.S - Đăng ký</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    S.M.S
                </a>
            </div>
            <div class="login-form">
                <form method="post" action="{{route('postRegister')}}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Họ tên ...">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email ...">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu ...">
                    </div>
                    <div class="form-group">
                        <label>Tên shop</label>
                        <input type="text" name="shopName" class="form-control" placeholder="Tên shop ...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                    <div class="social-login-content">
                        <div class="social-button">
                            {{--<button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Đăng nhập facebook</button>--}}
                            {{--<button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Đăng nhập twitter</button>--}}
                        </div>
                    </div>
                    <div class="register-link m-t-15 text-center">
                        <p>Đã có tài khoản ? <a href="{{route('login')}}"> đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
