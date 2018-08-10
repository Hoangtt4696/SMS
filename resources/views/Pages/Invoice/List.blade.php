@extends('Index')

@section('title', 'Sản phẩm')

@section('content')
    <style>
        #bootstrap-data-table tr td:last-child {
            text-align: center!important;
        }

        #bootstrap-data-table img {
            width: 5rem;
            height: 5rem;
        }
    </style>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Hóa đơn</strong>
                            <button class="btn btn-success" style="float: right; border-radius: .4rem"><a style="color: #fff" href="">Thêm mới</a></button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Người tạo</th>
                                    <th>Tổng tiền</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$invoice->employee_name}}</td>
                                        <td>{{number_format($invoice->price)}}</td>
                                        <td>
                                            <button class="btn btn-secondary">Sửa</button>
                                            <button class="btn btn-danger">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection