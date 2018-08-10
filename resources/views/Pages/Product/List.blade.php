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

        #largeModalLabel {
            color: #00aced;
            font-weight: bold;
        }

        .fontBold {
            font-weight: bold;
        }
    </style>
    <div class="content mt-3">
        <div class="modal fade" id="delConfirm" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titleAjax" id="largeModalLabel">Xóa sản phẩm</h5>
                    </div>
                    <div class="modal-body dashDel">
                    </div>
                    <div class="modal-footer footerAjax">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Hủy</button>
                        <button type='button' id='delData' class='btn btn-primary' data-dismiss='modal'>Xóa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body dash">
                    </div>
                </div>
            </div>
        </div>

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sản phẩm</strong>
                            <button class="btn btn-success" style="float: right; border-radius: .4rem"><a style="color: #fff" href="{{route('newProduct')}}">Thêm mới</a></button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên sách</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr id="tr{{$product->id}}">
                                    <td>{{$product->name}}</td>
                                    <td>{{number_format($product->price)}}đ</td>
                                    <td><img src="{{$product->picture}}"></td>
                                    <td>
                                        <button
                                                type="button"
                                                class="btn btn-primary mb-1"
                                                data-toggle="modal"
                                                data-target="#largeModal"
                                                data-whatever="{{$product->id}}"
                                        >
                                            Chi tiết
                                        </button>
                                        <button class="btn btn-secondary"><a style="color: #fff" href="{{route('editProduct', $product->id)}}">Sửa</a></button>
                                        <button
                                                data-toggle="modal"
                                                data-target="#delConfirm"
                                                data-whatever="{{$product->id}}"
                                                class="btn btn-danger delete"
                                                name="{{$product->name}}"
                                                id="del{{$product->id}}"
                                        >
                                            Xóa
                                        </button>
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
    <script>
        $('#delConfirm').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('whatever');
            var name = $('#del'+id).attr('name');
            var modal = $(this);
            modal.find('.dashDel').html('Bạn có chắc muốn xóa '+name+ ' không ?');
            $('#delData').attr({'name':id});
        });

        $('#delData').on('click', function () {
            var id = $(this).attr('name');
            var form = new FormData();
            form.append('id', id);
            $.ajax({
                type: "POST",
                url: 'http://localhost/smaapi/product/delete.php?id='+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    $('#delData').modal('hide');
                    $('#tr'+id).replaceWith();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

        $('#largeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('whatever');
            var modal = $(this);
            $.get(
                'http://localhost/smaapi/product/find_by_id.php?&id='+id,
                {},
                function(data) {
                    console.log(data);
                    var msg = "<div class='row'><div class='col-8'><p>" +
                        "<span class='fontBold'>Giá:</span><span style='color: orange'>"+parseInt(data.price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+"đ</span></p><p>" +
                        "<p><span class='fontBold'>Tác giả:</span> "+data.author+"</p>" +
                        "<p><span class='fontBold'>Năm xuất bản:</span> "+data.publish_year+"</p><p><span class='fontBold'>Số lượng hàng:</span> "+data.amount+"</p>" +
                        "<p><span class='fontBold'>Mô tả:</span> "+data.description+"</p></div><div class='col'>" +
                        "<img src='"+data.picture+"' style='width: 10rem; height: 15rem'></div>" +
                        "</div>";
                    modal.find('.dash').html(msg);
                    modal.find('#largeModalLabel').html(data.name);
                }
            );
        });
    </script>
@endsection