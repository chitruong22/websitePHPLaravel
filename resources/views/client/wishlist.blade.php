@extends('layouts.master')
@section('title', 'Graphics Tablet - Wishlist')

@section('client')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{URL::asset('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $key => $details)
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs">
                                                <img src="{{URL::asset('/upload/products/'.$details['image'])}}" height="100" class="img-responsive"/>
                                            </div>
                                            <h4 class="nomargin" style="line-height: 100px;">{{ $details['name'] }}</h4>
                                        </div>
                                    </td>
                                    <td>{{ number_format($details['price'],3,".",".") }} ₫</td>
                                    <td>
                                        <a href="/add-to-cart/<?=$details->id?>" class="btn btn-success">THÊM VÀO GIỎ HÀNG</a>
                                    </td>
                                    <td class="actions" data-th="">
                                        <a href="wishlist-remove/<?=$key?>" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

@stop
