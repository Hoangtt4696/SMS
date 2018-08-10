@extends('Index')

@section('title', 'Thể loại Sản phẩm')

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
                            <strong class="card-title">Thêm mới thể loại</strong>
                        </div>
                        <form method="post" action="{{route('newProductType_post')}}" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class='form-group row'>
                                                <label for='name' class='col-sm-2 col-form-label'>Tên thể loại</label>
                                                <div class='col-sm-10'>
                                                    <input type='text' name="name" class='form-control' id='name' placeholder='Tên thể loại...'>
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label for='picture' class='col-sm-2 col-form-label'>Hình ảnh</label>
                                                <div class='col-sm-10'>
                                                    <input type='file' name="picture" class='form-control' id='picture' placeholder='Chọn hình...'/>
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