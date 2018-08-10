@extends('Index')

@section('title', 'Nhân viên')

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
                            <strong class="card-title">Thêm mới nhân viên</strong>
                        </div>
                        <form method="post" action="{{route('postEmployee')}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class='form-group row'>
                                                    <label for='email' class='col-sm-2 col-form-label'>Email</label>
                                                    <div class='col-sm-10'>
                                                        <input required type='email' name="email" class='form-control' id='email' placeholder='Email...'>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='password' class='col-sm-2 col-form-label'>Mật khẩu</label>
                                                    <div class='col-sm-10'>
                                                        <input required type='password' name="password" class='form-control' id='password' placeholder='Mật khẩu...'>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='name' class='col-sm-2 col-form-label'>Họ tên</label>
                                                    <div class='col-sm-10'>
                                                        <input type='text' name="name" class='form-control' id='name' placeholder='Họ tên...'>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='gender' class='col-sm-2 col-form-label'>Giới tính</label>
                                                    <div class='col-sm-10'>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="0">Nam</option>
                                                            <option value="1">Nữ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='phone' class='col-sm-2 col-form-label'>Số điện thoại</label>
                                                    <div class='col-sm-10'>
                                                        <input type='number' name="phone" class='form-control' id='phone' placeholder='Số điện thoại...'/>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='picture' class='col-sm-2 col-form-label'>Ảnh đại diện</label>
                                                    <div class='col-sm-10'>
                                                        <input type='file' name="picture" class='form-control' id='picture'>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='address' class='col-sm-2 col-form-label'>Địa chỉ</label>
                                                    <div class='col-sm-10'>
                                                        <textarea
                                                                class="form-control"
                                                                name="address"
                                                                id="address"
                                                                cols="30"
                                                                rows="5"
                                                                placeholder="Địa chỉ..."
                                                        >

                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col" style="text-align: right;">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">
                                                Thêm mới
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection