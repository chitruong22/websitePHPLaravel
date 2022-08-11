@extends('layouts.admin')
@section('title', 'Chỉnh sửa đơn hàng | Admin - Graphics Tablet')
@section('content')
    <div class="single-product-tab-area mg-tb-15">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active">
                                    <a href="#description">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                        Chỉnh sửa đơn hàng
                                    </a>
                                </li>
                            </ul>
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="ID" readonly>
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="Tên khách hàng" readonly>
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="Tổng tiền" readonly>
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="Địa chỉ giao hàng" readonly>
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="Phương thức thanh toán" readonly>
                                            </div>
                                            <select name="select" class="form-control pro-edt-select form-control-primary">
                                                <option value="opt">Trạng thái</option>
                                                <option value="opt1">Đang xử lý</option>
                                                <option value="opt2">Tiếp nhận đơn hàng</option>
                                                <option value="opt3">Đang giao hàng</option>
                                                <option value="opt4">Đã giao hàng</option>
                                                <option value="opt5">Hủy đơn hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-10">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                            <button type="button" class="btn btn-primary waves-effect waves-light m-r-10">Lưu
                                            </button>
                                            <button type="button" class="btn btn-warning waves-effect waves-light">Hủy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
