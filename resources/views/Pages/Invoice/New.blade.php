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

        .chosen-container-single .chosen-single div b {
            background-position: 0 7px!important;
        }
    </style>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Chi tiết đơn hàng {{$idCus}}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div id="listItems" class="list-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select class="form-control prodClass" tabindex="1">
                                                <option value="">---Chọn sản phẩm---</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div id="totalPrice" class="col" style="font-weight: bold;">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col" style="text-align: right;">
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Thanh toán
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <script>
        function formatCurrency(number){
            var n = number.split('').reverse().join("");
            var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
            return  n2.split('').reverse().join('');
        }

        var totalPrice = 0;
        var item = "";
        var arrInvoice = [];
        $('.prodClass').on('change',function() {
            $.get(
                'http://localhost/smaapi/product/find_by_id.php?&id='+$(this).val(),
                {},
                function(data) {
                    totalPrice = parseInt(totalPrice)+parseInt(data.price);
                    item = "<div class='list-group-item' id='item"+data.id+"'>" +
                        "<div class='row'><div class='col-6'>"+data.name+"</div>" +
                        "<div class='col-2'><div class='form-group'><input id='num"+data.id+"' style='border: 1px solid #e7e7e7; width: 5rem; text-align: center;' type='number' value='1' />" +
                        "</div></div><div id='price"+data.id+"' class='col-3' style='color: orange'>"+formatCurrency(data.price)+"đ</div>" +
                        "<div class='col' id='del"+data.id+"' style='text-align: center;'>x</div></div></div>";
                    $('#listItems').append(item);
                    $('#totalPrice').html("Tổng giá trị sản phẩm: <span style='font-weight: bold; color: dodgerblue;'>"+formatCurrency(String(totalPrice))+"đ</span>");
                    arrInvoice.push({
                        id: data.id,
                        amount: 1
                    });
                }
            );
        });
    </script>
@endsection