@extends('layouts.master')
@section('title', 'Graphics Tablet - Checkout')

@section('client')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Checkout</span>
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
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code--}}
{{--                    </h6>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="checkout__form">
                <h4>Chi tiết thanh toán</h4>


                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        @if(Auth::user())
                            <div class="card">
                                <div class="card-header title-order" id="headingTwo" >
                                    <h3 class="mb-0 ">
                                        <button class="btn collapsed  text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            THÔNG TIN ĐẶT HÀNG
                                        </button>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="/order" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Tên<span>*</span></p>
                                                    <input type="text" name="name" value="<?=$user[0]->name?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Email<span>*</span></p>
                                                    <input type="text" name="email" value="<?=$user[0]->email?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout__input">
                                            <p>Số điện thoại<span>*</span></p>
                                            <input type="text" name="phone" value="<?=$user[0]->phone?>">
                                        </div>
                                        <div class="checkout__input">
                                            <p>Địa chỉ giao hàng<span>*</span></p>
                                            {{--                                <input type="text" placeholder="Địa chỉ đường" class="checkout__input__add">--}}
                                            <input type="text" placeholder="Địa chỉ nhà" name="address" value="<?=$user[0]->address?>">
                                        </div>
                                        <div class="checkout__input">
                                            <p>Ghi chú đơn hàng<span>*</span></p>
                                            <input type="text"
                                                   placeholder="Ghi chú về đơn đặt hàng của bạn" name="note">
                                        </div>
                                        <div class="checkout__input">
                                            <p>Phương thức thanh toán <span>*</span></p>
                                            @php $total = 0 @endphp
                                            @php $count = 0 @endphp
                                            @if($cart)
                                                @foreach($cart as $id => $item)
                                                    @php $total += $item->price * $item->quantity @endphp
                                                    @php $count += $item->quantity @endphp
                                                @endforeach
                                            @elseif(!$cart && session('cart') )
                                            @foreach(session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                @php $count += $details['quantity'] @endphp
                                            @endforeach
                                            @endif
                                            <input type="hidden" value="<?=$total?>" name="total">
                                            <input type="hidden" value="<?=$count?>" name="count">
                                            <div id="accordion3">
                                                <div class="col-12">
                                                    <div class="text-left">
                                                        <button type="button" class="btn d-block pl-0 pb-0" data-toggle="collapse" data-target="#payment1" aria-expanded="true" aria-controls="payment1">
                                                            <label class="btn active pl-0" data-toggle="collapse" data-target="#payment1" href="#collapseExample" aria-expanded="false">
                                                                <input type="radio" name="options" id="option2" autocomplete="off" checked style="height: 20px;width: auto">
                                                                <span style="position: absolute;line-height: 20px;">Thanh toán sau khi nhận hàng</span>
                                                            </label>
                                                        </button>
                                                        <button type="button" class="btn pt-0 pb-0 pl-0" data-toggle="collapse" data-target="#payment2" aria-expanded="false" aria-controls="payment2">
                                                            <label class="btn active pl-0" data-toggle="collapse" data-target="#payment2" href="#collapseExample" aria-expanded="false">
                                                                <input type="radio" name="options" id="option2" autocomplete="off" style="height: 20px; width: auto">
                                                                <span style="position: absolute;line-height: 20px;">Thanh toán bằng VNPAY</span>
                                                            </label>
                                                        </button>
                                                    </div>
                                                    <div id="payment1" class="collapse mt-3 show" aria-labelledby="heading1" data-parent="#accordion3">
                                                        <div>
                                                            <button type="submit" class="site-btn" name="order" value="1">ĐẶT HÀNG</button>
                                                        </div>
                                                    </div>
                                                    <div id="payment2" class="collapse mt-3 mb-4" aria-labelledby="heading2" data-parent="#accordion3">
                                                        <div>
                                                            <button type="submit" class="site-btn" name="order-and-payment" value="1">ĐẶT HÀNG VÀ THANH TOÁN</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0 text-white">
                                        <button class="btn text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            ĐĂNG NHẬP ĐỂ MUA HÀNG
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div id="accordion2">
                                        <div class="col-9 m-auto">
                                            <div class="text-left" style="border-bottom: 1px solid #e1e1e1;">
                                                <button class="btn d-block pb-0" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                    <label class="btn active" data-toggle="collapse" data-target="#collapseExample" href="#collapseExample" aria-expanded="false">
                                                        <input type="radio" name="options" id="option2" autocomplete="off" checked> Bạn đã có tải khoản <span>Đăng nhập</span>
                                                    </label>
                                                </button>
                                                <button class="btn pt-0 pb-0" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                    <label class="btn active" data-toggle="collapse" data-target="#collapseExample" href="#collapseExample" aria-expanded="false">
                                                        <input type="radio" name="options" id="option2" autocomplete="off"> Bạn chưa có tài khoản? <span>Đăng ký</span>
                                                    </label>
                                                </button>
                                            </div>
                                            <div id="collapse1" class="collapse mt-2 show" aria-labelledby="heading1" data-parent="#accordion2">
                                                    <div class="card-body">
                                                        <form method="POST" action="{{ route('login') }}">
                                                            @csrf

                                                            <div class="checkout__input">
                                                                <label for="email" class="control-label">{{ __('Username/Email') }}</label>
                                                                <input id="email" type="text" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="checkout__input">
                                                                <label for="password" class="control-label">{{ __('Mật khẩu') }}</label>
                                                                <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success btn-block loginbtn">
                                                                    {{ __('Đăng nhập') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <div id="collapse2" class="collapse mt-2 mb-4" aria-labelledby="collapse2" data-parent="#accordion2">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <label for="name" class="control-label">{{ __('Họ và tên') }}</label>
                                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <label for="name" class="control-label">{{ __('Username') }}</label>
                                                                <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <label for="email" class="control-label">{{ __('Email') }}</label>
                                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="checkout__input">
                                                                <label for="name" class="control-label">{{ __('Số điện thoại') }}</label>
                                                                <input id="name" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="control-label">{{ __('Địa chỉ') }}</label>
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="control-label">{{ __('Mật khẩu') }}</label>

                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                                        @enderror
                                                    </div>
                                                    <input type="hidden" name="role" value="0">
                                                    <input type="hidden" name="avatar" value="avatar.png">
                                                    <div class="form-group">
                                                        <label for="password-confirm" class="control-label">{{ __('Xác nhận mật khẩu') }}</label>
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-success loginbtn" style="width: 100%;">{{ __('Đăng ký') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h3 class="mb-0 ">
                                        <button class="btn collapsed text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            MUA HÀNG KHÔNG CẦN TÀI KHOẢN
                                        </button>
                                    </h3>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="/order" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Tên<span>*</span></p>
                                                <input type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Email<span>*</span></p>
                                                <input type="text" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Địa chỉ giao hàng<span>*</span></p>
                                        {{--                                <input type="text" placeholder="Địa chỉ đường" class="checkout__input__add">--}}
                                        <input type="text" placeholder="Địa chỉ nhà" name="address">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Ghi chú đơn hàng<span>*</span></p>
                                        <input type="text"
                                               placeholder="Ghi chú về đơn đặt hàng của bạn,
                                       ví dụ: những lưu ý đặc biệt khi giao hàng." name="note">
                                    </div>
                                            <div class="checkout__input">
                                                <p>Phương thức thanh toán <span>*</span></p>
                                                @php $total = 0 @endphp
                                                @php $count = 0 @endphp
                                                @if($cart)
                                                    @foreach($cart as $id => $details)
                                                        @php $total += $details->price * $details->quantity @endphp
                                                        @php $count += $details->quantity @endphp
                                                    @endforeach
                                                @elseif(!$cart && session('cart') )
                                                    @foreach(session('cart') as $id => $details)
                                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                                        @php $count += $details['quantity'] @endphp
                                                    @endforeach
                                                @endif
                                                <input type="hidden" value="<?=$total?>" name="total">
                                                <input type="hidden" value="<?=$count?>" name="count">
                                                <div id="accordion3">
                                                    <div class="col-12">
                                                        <div class="text-left">
                                                            <button type="button" class="btn d-block pl-0 pb-0" data-toggle="collapse" data-target="#payment1" aria-expanded="true" aria-controls="payment1">
                                                                <label class="btn active pl-0" data-toggle="collapse" data-target="#payment1" href="#collapseExample" aria-expanded="false">
                                                                    <input type="radio" name="options" id="option2" autocomplete="off" checked style="height: 20px;width: auto">
                                                                    <span style="position: absolute;line-height: 20px;">Thanh toán sau khi nhận hàng</span>
                                                                </label>
                                                            </button>
                                                            <button type="button" class="btn pt-0 pb-0 pl-0" data-toggle="collapse" data-target="#payment2" aria-expanded="false" aria-controls="payment2">
                                                                <label class="btn active pl-0" data-toggle="collapse" data-target="#payment2" href="#collapseExample" aria-expanded="false">
                                                                    <input type="radio" name="options" id="option2" autocomplete="off" style="height: 20px; width: auto">
                                                                    <span style="position: absolute;line-height: 20px;">Thanh toán bằng VNPAY</span>
                                                                </label>
                                                            </button>
                                                        </div>
                                                        <div id="payment1" class="collapse mt-3 show" aria-labelledby="heading1" data-parent="#accordion3">
                                                            <div>
                                                                <button type="submit" class="site-btn" name="order" value="1">ĐẶT HÀNG</button>
                                                            </div>
                                                        </div>
                                                        <div id="payment2" class="collapse mt-3 mb-4" aria-labelledby="heading2" data-parent="#accordion3">
                                                            <div>
                                                                <button type="submit" class="site-btn" name="order-and-payment" value="1">ĐẶT HÀNG VÀ THANH TOÁN</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            @php $total = 0 @endphp
                            @php $count = 0 @endphp

                            @if($cart)
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul>
                                    @foreach($cart as $id => $item)
                                        @php $total += $item->price * $item->quantity @endphp
                                        @php $count += $item->quantity @endphp
                                        <li><span>{!! \Illuminate\Support\Str::limit($item->name, $limit = 20, $end = '...')!!}</span>
                                            <span>{{ number_format($item->price,3,".",".") }} đ</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Phí giao hàng <span>0</span></div>
                                <div class="checkout__order__total">Tổng <span>{{ number_format($total,3,".",".") }} đ</span></div>
                            @elseif(!$cart && session('cart') )
                            <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                            <ul>
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    @php $count += $details['quantity'] @endphp

                                <li><span>{!! \Illuminate\Support\Str::limit($details['name'], $limit = 20, $end = '...')!!}</span> <span>{{ number_format($details['price'],3,".",".") }} đ</span></li>
                                @endforeach

                            </ul>
                            <div class="checkout__order__subtotal">Phí giao hàng <span>0</span></div>
                            <div class="checkout__order__total">Tổng <span>{{ number_format($total,3,".",".") }} đ</span></div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@stop
