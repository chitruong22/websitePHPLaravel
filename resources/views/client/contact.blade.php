@extends('layouts.master')
@section('title', 'Graphics Tablet - Liên hệ')

@section('client')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{URL::asset('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Liên hệ</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Trang chủ</a>
                            <span>Liên hệ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <h4>Số điện thoại</h4>
                        <p>+84-888-222-999</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <h4>Địa chỉ</h4>
                        <p>Hưng Lợi, Ninh Kiều, Cần Thơ</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <h4>Thời gian</h4>
                        <p>8:00 am to 22:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <h4>Email</h4>
                        <p>graphicstablet@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8788739320867!2d105.7551225146157!3d10.026853092832743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088476bb00027%3A0xd3c02747d1cbc8c6!2zMjg4IMSQxrDhu51uZyBOZ3V54buFbiBWxINuIExpbmgsIEjGsG5nIEzhu6NpLCBOaW5oIEtp4buBdSwgQ-G6p24gVGjGoSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1628306670469!5m2!1svi!2s"
                height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="map-inside">
{{--            <i class="fa fa-map-marker" aria-hidden="true"></i>--}}
            <div class="inside-widget">
                <h4>Graphics Tablet</h4>
                <ul>
                    <li>Số điện thoại: +84-888-222-999</li>
                    <li>Địa chỉ: Số 288 Đường Nguyễn Văn Linh, Hưng Lợi, Ninh Kiều, Cần Thơ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Form liên hệ</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Họ và tên">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Nội dung"></textarea>
                        <button type="submit" class="site-btn">GỬI</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@stop
