@extends('layouts.master')
@section('title', 'Graphics Tablet - Kết quả')

@section('client')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Kết quả</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Kết quả</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                        <div class="col-lg-9 col-md-9" style="margin: 0 auto;">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                    <table class="w-100">
                                        <tr style="border-bottom: 1px solid black;">
                                            <th>Sản phẩm</th>
                                            <th>Giá cả</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                        @php $total = 0 @endphp
                                        @php $count = 0 @endphp
                                        @foreach($detail_bill as $details)
                                            @php $total += $details->price*$details->quantity @endphp
                                            @php $count += $details->quantity @endphp
                                        <tr class="tr-border-bottom">
                                            <td><span>{{$details->name}}</span></td>
                                            <td><span>{{ number_format($details->price,3,".",".") }} đ</span></td>
                                            <td style="padding-left: 15px;"><span>{{$details->quantity}}</span></td>
                                            <td><span>{{ number_format(($details->price*$details->quantity),3,".",".") }} đ</span></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <div class="checkout__order__subtotal" style="border-bottom: none;margin-bottom: 0;">Tổng số lượng sản phẩm: <span>{{ $count }}</span></div>
                                    <div class="checkout__order__subtotal">Phí giao hàng: <span>0</span></div>
                                    <div class="checkout__order__total" style="padding-top: 15px;">Tổng tiền đơn hàng<span>{{ number_format($total,3,".",".") }} đ</span></div>
{{--                                    <button type="submit" class="site-btn">ĐẶT HÀNG</button>--}}
                                    <a href="/collection" class="btn btn-success">Tiếp tục mua hàng</a>
                                    @if(!empty(Auth::user()))
                                        <a href="/user/history/<?=Auth::user()->id?>" class="btn btn-danger" style="float: right">Theo dõi đơn hàng</a>
                                    @else
                                        <a href="{{ route('register') }}" class="btn btn-danger" style="float: right">Đăng ký tài khoản để theo dõi đơn hàng</a>
                                    @endif

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@stop
