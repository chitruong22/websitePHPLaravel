@extends('layouts.master')
@section('title', 'Graphics Tablet - Chi tiết sản phẩm')

@section('client')
    <?php
    $link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{URL::asset('img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $product->name }}</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <a href="/collection">Bộ sưu tập</a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                             src="{{URL::asset('/upload/products/'.$product->image)}}" alt="">
                    </div>
{{--                    <div class="product__details__pic__slider owl-carousel">--}}
{{--                        <img data-imgbigurl="img/product/details/product-details-2.jpg"--}}
{{--                             src="img/product/details/thumb-1.jpg" alt="">--}}
{{--                        <img data-imgbigurl="img/product/details/product-details-3.jpg"--}}
{{--                             src="img/product/details/thumb-2.jpg" alt="">--}}
{{--                        <img data-imgbigurl="img/product/details/product-details-5.jpg"--}}
{{--                             src="img/product/details/thumb-3.jpg" alt="">--}}
{{--                        <img data-imgbigurl="img/product/details/product-details-4.jpg"--}}
{{--                             src="img/product/details/thumb-4.jpg" alt="">--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $product->name }}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>

                    @if($product->discount)
                        <?php
                        $discount_price = $product->price - ($product->price * ($product->discount/100));
                        ?>
                        <span class="product__details__price">{{ number_format($discount_price,3,".",".") }} ₫</span>
                        <span class="pl-3" style="text-decoration: line-through;color: #b2b2b2;font-size: 20px">{{ number_format($product->price,3,".",".") }} ₫</span>
                    @else
                        <span class="product__details__price">{{ number_format($product->price,3,".",".") }} ₫</span>
                    @endif

                    <p>{{ $product->short_description }}</p>
{{--                    <div class="product__details__quantity">--}}
{{--                        <div class="quantity">--}}
{{--                            <div class="pro-qty">--}}
{{--                                <input type="text" value="1">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <a href="/add-to-cart/<?=$product->id?>" class="primary-btn">THÊM VÀO GIỎ HÀNG</a>
                    @if(Auth::user())
                        <a href="/wishlist/<?=$product->id?>" class="heart-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    @else
                        <a href="/wishlist" class="heart-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    @endif

                    <ul>
                        <li><b>Trạng thái: </b> <span><?php if($product->availability == 0){echo 'Hết hàng';} else{echo 'Còn hàng';}?></span></li>
{{--                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>--}}
                        <li><b>Thể loại: </b> <span>{{ $cateName->name }}</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                               aria-selected="false">Thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                               aria-selected="false">Bình luận <span></span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6 class="pl-3">Mô tả sản phẩm</h6>
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <?php
                                    if($product->information){
                                    $info = explode("|", $product->information)
                                ?>
                                <table class="table">
                                    <tr>
                                        <td>Kích thước: <?=$info[0]?></td>
                                    </tr>
                                    <tr>
                                        <td>Trọng lượng: <?=$info[1]?></td>
                                    </tr>
                                    <tr>
                                        <td>Màu sắc: <?=$info[2]?></td>
                                    </tr>
                                    <tr>
                                        <td>Độ phân giải: <?=$info[3]?></td>
                                    </tr>
                                </table>
                                <?php }?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
{{--                                <h6 class="pl-4">Bình luận sản phẩm</h6>--}}
{{--                                <div class="contact-form pt-0">--}}
{{--                                    <div class="container">--}}
{{--                                        <form action="#">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-lg-6 col-md-6">--}}
{{--                                                    <input type="text" placeholder="Tên">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-6 col-md-6">--}}
{{--                                                    <input type="text" placeholder="Email">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-12 text-center">--}}
{{--                                                    <textarea placeholder="Nội dung"></textarea>--}}
{{--                                                    <button type="submit" class="site-btn">Gửi bình luận</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-lg-12">
                                    <div class="fb-like" data-href="<?=$link?>"
                                         data-width="" data-layout="standard"
                                         data-action="like" data-size="small"
                                         data-share="true"></div>
                                    <div class="fb-comments"
                                         data-href="<?=$link?>"
                                         data-width="100%" data-numposts="50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($related as $rel)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{URL::asset('/upload/products/'.$rel->image)}}">
                        <ul class="product__item__pic__hover">
                            @if(Auth::user())
                                <li><a href="/wishlist/<?=$rel->id?>"><i class="fa fa-heart"></i></a></li>
                            @else
                                <li><a href="/wishlist"><i class="fa fa-heart"></i></a></li>
                            @endif
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="/add-to-cart/<?=$rel->id?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="/product/<?=$rel->id?>">{{ $rel->name }}</a></h6>
                        @if($rel->discount)
                            <?php
                                $discount_price = $rel->price - ($rel->price * ($rel->discount/100));
                            ?>
                                <h5 class="product__item__price">{{ number_format($discount_price,3,".",".") }} ₫<span class="pl-2" style="text-decoration: line-through;color: #b2b2b2;font-weight: normal;">{{ number_format($rel->price,3,".",".") }} ₫</span></h5>
                        @else
                            <h5>{{ number_format($rel->price,3,".",".") }} ₫</h5>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->

@stop

