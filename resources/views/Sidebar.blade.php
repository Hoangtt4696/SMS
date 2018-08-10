<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">S.M.S</a>
            <a class="navbar-brand hidden" href="./"><img src="/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('home')}}"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ </a>
                </li>
                <h3 class="menu-title">Quản lý</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Sản phẩm</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-bars"></i><a href="{{route('listProduct')}}">Tất cả sản phẩm</a></li>
                        <li><i class="fa fa-bars"></i><a href="{{route('listProductType')}}">Danh mục sản phẩm</a></li>
                    </ul>
                </li>
                @if(session('role') === '1')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Nhân viên</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('listEmployee')}}">Quản lý nhân viên</a></li>
                        </ul>
                    </li>
                @endif
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Đơn hàng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('newCustomer')}}">Tạo đơn hàng</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('listOrder')}}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Khách hàng</a>
                    <ul class="sub-menu children dropdown-menu">
                    </ul>
                </li>
                @if(session('role') === '1')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Thống kê</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('statisticProduct')}}">Sản phẩm</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{route('statisticRevenue')}}">Doanh thu</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->