@extends('layouts.admin')
@section('title', 'Chỉnh sửa hóa đơn | Admin - Graphics Tablet')
@section('content')
    <div class="single-product-tab-area mg-tb-15">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Chỉnh sửa hóa đơn</a></li>
                            </ul>
                            <form action="/admin/bills/update/<?=$detailBill->id?>" method="post" class="product-tab-list tab-pane fade active in" id="description">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <label>Mã đơn hàng</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$detailBill->id_order?>" readonly>
                                            </div>
                                            <label>Tên khách hàng</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$detailBill->name?>"readonly>
                                            </div>
{{--                                            <div class="input-group mg-b-pro-edt">--}}
{{--                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>--}}
{{--                                                <input type="text" class="form-control" placeholder="Tổng tiền" readonly>--}}
{{--                                            </div>--}}
{{--                                            <div class="input-group mg-b-pro-edt">--}}
{{--                                                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>--}}
{{--                                                <input type="text" class="form-control" placeholder="Phương thức thanh toán" readonly>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
{{--                                            <div class="input-group mg-b-pro-edt">--}}
{{--                                                <span class="input-group-addon"><i class="fa fa-calculator" aria-hidden="true"></i></span>--}}
{{--                                                <input type="text" class="form-control" placeholder="Tổng số lượng" readonly>--}}
{{--                                            </div>--}}
{{--                                            <div class="input-group mg-b-pro-edt">--}}
{{--                                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>--}}
{{--                                                <input type="text" class="form-control" placeholder="Ngày mua hàng" readonly>--}}
{{--                                            </div>--}}
{{--                                            <div class="input-group mg-b-pro-edt">--}}
{{--                                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>--}}
{{--                                                <input type="text" class="form-control" placeholder="Ngày thanh toán">--}}
{{--                                            </div>--}}
                                            <label>Trạng thái thanh toán</label>
                                            <?php
                                                $ps = [];
                                                 $new_ps = [];
                                                $ps = [
                                                    'ps1' => 'Đã thanh toán',
                                                    'ps2' => 'Chưa thanh toán'
                                                ];
                                                if($ps['ps1'] == $detailBill->payment_status){
                                                    $new_ps = $ps;
                                                }else{
                                                    $new_ps = [
                                                        'ps2' => 'Chưa thanh toán',
                                                        'ps1' => 'Đã thanh toán'
                                                    ];
                                                }
                                            ?>
                                            <select name="payment_status" class="form-control pro-edt-select form-control-primary">
                                                @foreach($new_ps as $key=>$cate)
                                                    <option value="<?=$key?>">{{ $cate }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <label>Trạng thái giao hàng</label>
                                            <?php
                                            $ds = [];
                                            $new_ds = [];
                                            $ds = [
                                                'ds1' => 'Chưa giao hàng',
                                                'ds2' => 'Đang giao hàng',
                                                'ds3' => 'Đã giao hàng'
                                            ];
                                            if($ds['ds1'] == $detailBill->delivery_status){
                                                $new_ds = $ds;
                                            }elseif ($ds['ds2'] == $detailBill->delivery_status){
                                                $new_ds = [
                                                    'ds2' => 'Đang giao hàng',
                                                    'ds1' => 'Chưa giao hàng',
                                                    'ds3' => 'Đã giao hàng'
                                                ];
                                            }
                                            else{
                                                $new_ds = [
                                                    'ds3' => 'Đã giao hàng',
                                                    'ds1' => 'Chưa giao hàng',
                                                    'ds2' => 'Đang giao hàng',
                                                ];
                                            }
                                            ?>
                                            <select name="delivery_status" class="form-control pro-edt-select form-control-primary">
                                                @foreach($new_ds as $key=>$cate)
                                                    <option value="<?=$key?>">{{ $cate }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-20">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Lưu
                                            </button>
                                            <button type="button" class="btn btn-warning waves-effect waves-light">Hủy
                                            </button>
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
@stop
