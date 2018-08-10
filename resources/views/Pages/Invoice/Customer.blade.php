@extends('Index')

@section('title', 'Thể loại sản phẩm')

@section('content')
    <style>
        #bootstrap-data-table tr td:nth-child(2) {
            text-align: center!important;
        }

        .chosen-single {
            padding: 4px 0 0 14px!important;
            height: 38px!important;
            -webkit-box-shadow: none!important;
            -moz-box-shadow: none!important;
            box-shadow: none!important;
            background: none!important;
            border-color: #DFDFDF!important;
            -webkit-border-radius: 5px!important;
            -moz-border-radius: 5px!important;
            border-radius: 5px!important;
         }
    </style>
    <div class="content mt-3">
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Khách hàng mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form action="" method="post" class="">
                                    <div class="form-group">
                                        <label for="customerEmail" class=" form-control-label">Email</label>
                                        <input type="email" id="customerEmail" name="customerEmail" placeholder="Email.." class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="" method="post" class="">
                                    <div class="form-group">
                                        <label for="customerName" class=" form-control-label">Họ tên</label>
                                        <input type="text" id="customerName" name="customerName" placeholder="Họ tên.." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="customerAge" class=" form-control-label">Tuổi</label>
                                        <input type="number" id="customerAge" name="customerAge" placeholder="Tuổi.." class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <form action="" method="post" class="">
                                    <div class="form-group">
                                        <label for="customerGender" class=" form-control-label">Giới tính</label>
                                        <select name="customerGender" id="customerGender" class="form-control">
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="customerPhone" class=" form-control-label">Số điện thoại</label>
                                        <input type="text" id="customerPhone" name="customerPhone" placeholder="Số điện thoại.." class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer footerAjax">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Hủy</button>
                        <button type='button' id='newCus' class='btn btn-primary' data-dismiss='modal'>Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Thông tin khách hàng</strong>
                            <button style="float: right" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                                Tạo mới
                            </button>
                        </div>
                        <form action="{{route('postCustomer')}}" method="post" class="">
                            {!! csrf_field() !!}
                        <div class="card-body card-block">
                            <div class="form-group">
                                <select class="form-control" id="cusChosen" name="idCustomer">
                                    <option value="">--- Chọn khách hàng ---</option>
                                    @foreach($invoices as $invoice)
                                        <option value="{{$invoice->id}}">{{$invoice->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Tiếp tục
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <script>
        $('#newCus').on('click', function () {
            var cusName = $('#customerName').val();
            var cusPhone = $('#customerPhone').val();
            var cusGender = $('#customerGender').val();
            var cusAge = $('#customerAge').val();
            var cusEmail = $('#customerEmail').val();
            var form = new FormData();
            form.append('customer_name', cusName);
            form.append('customer_phone', cusPhone);
            form.append('customer_gender', cusGender);
            form.append('customer_age', cusAge);
            form.append('customer_email', cusEmail);
            $.ajax({
                type: "POST",
                url: 'http://localhost/smaapi/customer/create.php',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#cusChosen').append("<option value='"+data+"'>"+cusName+"</option>");
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@endsection