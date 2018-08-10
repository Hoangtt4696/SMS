@extends('Index')

@section('title', 'Thể loại sản phẩm')

@section('content')
    <style>
        #bootstrap-data-table tr td:nth-child(2) {
            text-align: center !important;
        }
    </style>
    <div class="content mt-3">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titleAjax" id="largeModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body dash">
                    </div>
                    <div class="modal-footer footerAjax">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Hủy</button>
                        <button type='button' id='editData' class='btn btn-primary' data-dismiss='modal'>Lưu</button>
                    </div>
                </div>
            </div>
        </div>

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
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thể loại sản phẩm</strong>
                            <button class="btn btn-success" style="float: right; border-radius: .4rem"><a style="color: #fff" href="{{route('newProductType')}}">Thêm mới</a></button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productTypes as $productType)
                                    <tr id="tr{{$productType->id}}">
                                        <td>{{$productType->name}}</td>
                                        <td><img onerror="imgError(this);" style="width: 5rem; height: 5rem;" src="{{$productType->picture}}" alt=""></td>
                                        <td>
                                            <button
                                                    class="btn btn-secondary"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    data-whatever="{{$productType->id}}"
                                                    name="{{$productType->picture}}"
                                                    id="{{$productType->id}}"
                                            >
                                                Sửa
                                            </button>
                                            <button
                                                    data-toggle="modal"
                                                    data-target="#delConfirm"
                                                    data-whatever="{{$productType->id}}"
                                                    class="btn btn-danger delete"
                                                    name="{{$productType->name}}"
                                                    id="del{{$productType->id}}"
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
                url: 'http://localhost/smaapi/product_type/delete.php?id='+id,
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

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var imgSrc = $('#'+recipient).attr('name');
            var modal = $(this);
            var titleAjax = '';
            var msgBody = '';
            $.get(
                "http://localhost/smaapi/product_type/find_by_id.php?id=" + recipient,
                recipient,
                function (data) {
                    titleAjax = data.name;
                    msgBody = "<div class='row'>" +
                        "<div class='col'>" +
                        "<form><div class='form-group row'>" +
                        "<label for='name' class='col-sm-2 col-form-label'>Tên thể loại</label>" +
                        "<div class='col-sm-10'>" +
                        "<input type='text' class='form-control' id='name' placeholder='Tên thể loại...' value='" + data.name + "'>" +
                        "</div></div><div class='form-group row'>" +
                        "<label for='picture' class='col-sm-2 col-form-label'>Hình ảnh</label><div class='col-sm-5'>" +
                        "<input onchange='readURL(this);' style='width: 105px' type='file' class='form-control' id='picture' placeholder='Chọn hình...'/>" +
                        "</div><div class='col-sm-5'><img onerror='imgError(this);' id='imgDisplay' src='"+data.picture+"' /></div></div>" +
                        "</form></div>";
                    modal.find('.titleAjax').html(titleAjax);
                    modal.find('.dash').html(msgBody);
                    modal.find('.footerAjax').html();
                    $('#editData').attr({'name':recipient, 'imgSrc':imgSrc});
                }
            );
        });

        $('#editData').on('click', function () {
            var id = $(this).attr('name');
            var name = $('#name').val();
            var imgSrc = $(this).attr('imgSrc');
            var picture = $('#picture')[0].files[0];
            var form = new FormData();
            form.append('id', id);
            form.append('name', name);
            form.append('picture', picture);
            $.ajax({
                type: "POST",
                url: "product-type/edit/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    var ob = JSON.parse(data);
                    var picture = ob.picture_name !== '' ? 'uploads/'+ob.picture_name : imgSrc;
                    var msg = "<tr id='tr"+id+"'><td>"+ob.name+"</td><td>" +
                        "<img onerror='imgError(this);' style='width: 5rem; height: 5rem;' src='"+picture+"' alt=''></td>" +
                        "<td><button name='"+name+"' class='btn btn-secondary' data-toggle='modal' data-target='#exampleModal' data-whatever='"+id+"' id='"+id+"'>Sửa</button>&nbsp;" +
                        "<button data-toggle='modal' data-target='#delConfirm' class='btn btn-danger delete' data-whatever='"+id+"' id='del"+id+"' name='"+name+"'>Xóa</button></td>" +
                        "</tr>";
                    $('#tr'+id).replaceWith(msg);
                    $('#exampleModal').modal('hide');
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@endsection
