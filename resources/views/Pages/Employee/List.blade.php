@extends('Index')

@section('title', 'Sản phẩm')

@section('content')
    <style>
        #bootstrap-data-table tr td:last-child {
            text-align: center !important;
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
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
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
                </div>
            </div>
        </div>

        <div class="modal fade" id="delConfirm" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titleAjax" id="largeModalLabel">Xóa nhân viên</h5>
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
                            <strong class="card-title">Sản phẩm</strong>
                            <button class="btn btn-success" style="float: right; border-radius: .4rem"><a style="color: #FFF;" href="{{route('newEmployee')}}">Thêm mới</a></button>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(is_array($employees))
                                    @foreach($employees as $employee)
                                        <tr id="tr{{$employee->id}}">
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->gender === '1' ? 'Nữ' : 'Nam'}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>
                                                <button
                                                        type="button"
                                                        class="btn btn-primary mb-1"
                                                        data-toggle="modal"
                                                        data-target="#largeModal"
                                                        data-whatever="{{$employee->id}}"
                                                >
                                                    Chi tiết
                                                </button>
                                                <button class="btn btn-secondary">
                                                    <a style="color: #FFF;" href="{{route('editEmployee', $employee->id)}}">Sửa</a>
                                                </button>
                                                <button
                                                        data-toggle="modal"
                                                        data-target="#delConfirm"
                                                        data-whatever="{{$employee->id}}"
                                                        class="btn btn-danger delete"
                                                        name="{{$employee->name}}"
                                                        id="del{{$employee->id}}"
                                                >
                                                    Xóa
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <script>
        $('#largeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var shopID = '{{session('shopID')}}';
            var modal = $(this);
            var titleAjax = '';
            var msgBody = '';
            $.get(
                "http://localhost/smaapi/employee/index2.php?id=" + recipient+"&shop_id="+shopID,
                {},
                function (data) {
                    titleAjax = data.name;
                    msgBody = "<div class='row'><div class='col-8'>" +
                        "<p><span class='fontBold'>Email:</span> "+data.email+"</p>" +
                        "<p><span class='fontBold'>Giới tính:</span> "+(data.gender === '1' ? 'Name' : 'Nữ')+"</p>" +
                        "<p><span class='fontBold'>Số điện thoại:</span> "+data.phone+"</p>" +
                        "<p><span class='fontBold'>Địa chỉ:</span> "+data.address+"</p>" +
                        "</div><div class='col'>" +
                        "<img src='"+data.picture+"' style='width: 9rem; height: 9rem; -webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;'></div>" +
                        "</div>";
                    modal.find('.titleAjax').html(titleAjax);
                    modal.find('.dash').html(msgBody);
                }
            );
        });

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
                url: 'http://localhost/smaapi/employee/delete.php?id='+id,
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
    </script>

@endsection