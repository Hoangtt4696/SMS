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
                            <strong class="card-title">Thay đổi sản phẩm</strong>
                        </div>
                        <form method="post" action="{{route('postEditProduct', $product->id)}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class='form-group row'>
                                                    <label for='name' class='col-sm-2 col-form-label'>Tên sản phẩm</label>
                                                    <div class='col-sm-10'>
                                                        <input type='text' value="{{$product->name}}" name="name" class='form-control' id='name' placeholder='Tên thể loại...'>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='productType' class='col-sm-2 col-form-label'>Loại sản phẩm</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="productType" name="productType">
                                                            <option value="">--- Chọn loại sản phẩm ---</option>
                                                            @foreach($productTypes as $productType)
                                                                <option {{$productType->id == $product->product_type_id ? 'selected' : ''}} value="{{$productType->id}}">{{$productType->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='picture' class='col-sm-2 col-form-label'>Hình ảnh</label>
                                                    <div class='col-sm-10'>
                                                        <input type='file' name="picture" class='form-control' id='picture' placeholder='Chọn hình...'/>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='price' class='col-sm-2 col-form-label'>Giá</label>
                                                    <div class='col-sm-10'>
                                                        <input type='number' value="{{$product->price}}" name="price" class='form-control' id='price' placeholder='Giá...'/>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='author' class='col-sm-2 col-form-label'>Nhà sản xuất</label>
                                                    <div class='col-sm-10'>
                                                        <input type='text' value="{{$product->author}}" name="author" class='form-control' id='author' placeholder='Nhà sản xuất...'/>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='publishYear' class='col-sm-2 col-form-label'>Năm sản xuất</label>
                                                    <div class='col-sm-10'>
                                                        <input type='number' value="{{$product->publish_year}}" name="publishYear" class='form-control' id='publishYear' placeholder='Năm sản xuất...'/>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='amount' class='col-sm-2 col-form-label'>Số lượng</label>
                                                    <div class='col-sm-10'>
                                                        <input type='number' value="{{$product->amount}}" name="amount" class='form-control' id='amount' placeholder='Số lượng...'/>
                                                    </div>
                                                </div>
                                                <div class='form-group row'>
                                                    <label for='description' class='col-sm-2 col-form-label'>Mô tả</label>
                                                    <div class='col-sm-10'>
                                                        <textarea name="description" class='form-control' id='description'>{{$product->description}}</textarea>
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
                                                Lưu
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