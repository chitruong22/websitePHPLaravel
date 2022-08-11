@extends('layouts.admin')
@section('title', 'Chỉnh sửa loại sản phẩm | Admin - Graphics Tablet')
@section('content')
    <div class="single-product-tab-area mg-tb-15">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Chỉnh sửa loại sản phẩm</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <form class="product-tab-list tab-pane fade active in" id="description" action = "/admin/categories/update/<?=$category->id?>" method = "post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-qrcode" aria-hidden="true"></i>
                                                </span>
                                                    <input type="text" class="form-control" value="<?=$category->id?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                                    <input type="text" class="form-control" value="<?=$category->name?>" name="name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Lưu</button>
                                                <button type="button" class="btn btn-warning waves-effect waves-light">Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
