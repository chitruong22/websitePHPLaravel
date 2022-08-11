@extends('layouts.admin')
@section('title', 'Thêm mới người dùng | Admin - Graphics Tablet')
@section('content')
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm mới người dùng</a></li>
                        </ul>
                        <form class="product-tab-list tab-pane fade active in" id="description" action = "/admin/users/insert" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="review-content-section">
                                        <label>Avatar</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <div class="input-group mg-b-pro-edt" style="width: 280px; height: 280px;">
                                                <img id="blah" src="" style="border: 1px solid #e5e6e7;width: 100%;margin-bottom: 5px"/>
                                                <input type="file" name="image"  onchange="loadFile(event)" />
                                            </div>
                                            <script>
                                                var loadFile = function(event) {
                                                    var output = document.getElementById('blah');
                                                    output.src = URL.createObjectURL(event.target.files[0]);
                                                    output.onload = function() {
                                                        URL.revokeObjectURL(output.src)
                                                    }
                                                };
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="review-content-section">
                                        <label>Thông tin</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="auto" readonly>
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Tên người dùng">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="email" placeholder="Email">
                                        </div>
{{--                                        <div class="input-group mg-b-pro-edt">--}}
{{--                                            <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>--}}
{{--                                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">--}}
{{--                                        </div>--}}
{{--                                        <div class="input-group mg-b-pro-edt">--}}
{{--                                            <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>--}}
{{--                                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ">--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="review-content-section">
                                        <label>Mật khẩu</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Xác nhận mật khẩu">
                                        </div>

                                        <label>Vai trò</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <div class="i-checks pull-left">
                                                <label>
                                                    <input type="radio" value="0" name="role" checked> <i></i> Khách hàng
                                                </label>
                                                <label>
                                                    <input type="radio" value="1" name="role"> <i></i> Người quản trị
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
