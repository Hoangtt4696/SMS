@extends('Index')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="content mt-3">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">DOANH THU</div>
                            <div class="stat-digit">63 triệu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-bar-chart-alt text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">KHÁCH HÀNG</div>
                            <div class="stat-digit">1,100</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-shopping-cart text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">ĐƠN HÀNG</div>
                            <div class="stat-digit">3,014</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">NHÂN VIÊN</div>
                            <div class="stat-digit">132</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Doanh thu theo tháng </h4>
                    <canvas id="sales-chart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
@endsection