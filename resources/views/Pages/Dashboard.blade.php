<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS - Selling Management System</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <!-- Favicons
        ================================================== -->
    {{--<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">--}}
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
        ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#page-top">S.M.S</a> </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#page-top" class="page-scroll">Trang chủ</a></li>
                <li><a href="#services" class="page-scroll">Giới thiệu</a></li>
                <li><a href="#portfolio" class="page-scroll">Phí dịch vụ</a></li>
                <li><a href="#team" class="page-scroll">Thông tin</a></li>
                <!-- <li><a href="#contact" class="page-scroll">Chăm sóc khách hàng</a></li> -->
                <li><a href="#contact" class="page-scroll">Đăng ký</a></li>
                <li><a href="#about" class="page-scroll">Đăng nhập</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header id="header">
    <div class="intro text-center">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="intro-text">
                        <h1>HỆ THỐNG QUẢN LÝ BÁN HÀNG</h1>
                        <h1><span class="brand">S.M.S</span></h1>
                        <p>Đơn giản, dễ dùng, tiết kiệm chi phí và phù hợp với nhiều ngành hàng khác nhau.</p>
                        <a href="#contact" class="btn btn-default btn-lg page-scroll">ĐĂNG KÝ DÙNG THỬ MIỄN PHÍ</a> </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Services Section -->
<div id="services" class="text-center">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 section-title">
            <h2>S.M.S là gì?</h2>
            <p>
                <p>S.M.S là viết tắt của Selling Management System</p>
                <p>Hệ thống quản lý bán hàng số 1 tại Việt Nam.</p>
            </p>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-6"> <i class="fa fa-desktop"></i>
                <h4>Web Site</h4>
                <p>Trung tâm quản lý bán hàng.</p>
            </div>
            <div class="col-xs-6 col-md-6"> <i class="fa fa-gears"></i>
                <h4>Ứng dụng mobile</h4>
                <p>Quản lý việc bán hàng mọi lúc mọi nơi với những thao tác đơn giản.</p>
            </div>
        </div>
        <a href="#contact" class="btn btn-default btn-lg page-scroll">ĐĂNG KÝ DÙNG THỬ MIỄN PHÍ</a>
    </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 section-title text-center">
        </div>
        <a href="#contact" class="btn btn-default btn-lg page-scroll">ĐĂNG KÝ DÙNG THỬ MIỄN PHÍ</a>
    </div>
</div>
<div id="contact" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title">
                <h2>Đăng ký</h2>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Họ và tên" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="email" id="txtemail" class="form-control" placeholder="Email" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="email" id="txtphone" class="form-control" placeholder="Số điện thoại" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="email" id="txtshopname" class="form-control" placeholder="Tên cửa hàng" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="email" id="txtusername" class="form-control" placeholder="Tên đăng nhập" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="email" id="txtpassword" class="form-control" placeholder="Mật khẩu" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div id="success"></div>
                    <button type="submit" class="btn btn-default">Đăng ký ngay</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Section -->
<div id="about" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title">
                <h2>Đăng nhập</h2>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="text-center col-md-8">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Tên đăng nhập" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="password" id="email" class="form-control" placeholder="Mật khẩu" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="success"></div>
                        <a href="main_page.php"><button type="submit" class="btn btn-default">Đăng nhập</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Team Section -->
<div id="team" class="text-center">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 section-title">
            <h2>Thông tin nhà sản xuất</h2>
            <p>Đại Học Công Nghệ Thành Phố Hồ Chí Minh</p>
            <p>Khoa Công Nghệ Thông Tin</p>
            <p>-- Khóa 14 --</p>
        </div>
        <div id="row">
            <div class="col-md-4 col-sm-6 team">
                <div class="thumbnail"> <img src="/images/team/05.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Hoàng Quốc Thịnh</h3>
                        <p>Mobile Developer</p>
                        <p>14DTHC05</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 team">
                <div class="thumbnail"> <img src="/images/team/06.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Trần Thế Hoàng</h3>
                        <p>Web Developer</p>
                        <p>14DTHC04</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 team">
                <div class="thumbnail"> <img src="/images/team/07.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Nguyễn Đình Thuận</h3>
                        <p>Web Designer</p>
                        <p>14DTHC05</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="container text-center">
        <div class="fnav">
            <p>Hutech University - Faculty of Information Technology</p>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>