@extends('layouts.admin')
@section('title', 'Thêm mới sản phẩm | Admin - Graphics Tablet')
@section('content')
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm mới sản phẩm</a></li>
                        </ul>
                        <form action="/admin/products/insert" method="post"  class="product-tab-list tab-pane fade active in" id="description" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="review-content-section">
                                        <label>Hình ảnh</label>
                                        <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                            <img id="blah" src="" style="border: 1px solid #e5e6e7;width: 250px;height: 250px;margin-bottom: 5px"/>
                                            <input type="file" name="image"  onchange="loadFile(event)" />
                                        </div>
                                        <script>
                                            var loadFile = function(event) {
                                                var output = document.getElementById('blah');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                    URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                        </script>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="auto" readonly>
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Giá" name="price">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Giảm giá" name="discount">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Số lượng" name="availability">
                                        </div>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-clone" aria-hidden="true"></i></span>
                                            <textarea class="form-control" rows="2" placeholder="Mô tả ngắn" name="short_description"></textarea>
                                        </div>
                                        <select name="catalog_id" class="form-control pro-edt-select form-control-primary">
                                            <option value="">Chọn loại sản phẩm</option>
                                            @foreach($categories as $cate)
                                                <option value="<?=$cate->id?>">{{ $cate->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                                    <div class="review-content-section">--}}
{{--                                        <label>Thumbnail</label>--}}
{{--                                        <input type="file" name="image_list[]" multiple/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <label>Nổi bật: </label>
                                        <input type="checkbox" value="1" name="outstanding" style="
                                            transform: scale(1.2, 1.2);
                                            margin-left: 5px;
                                            line-height: 6px;"><br>
                                        <label>Kích thước</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Kích thước" name="kich_thuoc">
                                        </div>
                                        <label>Trọng lượng</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Trọng lượng" name="trong_luong">
                                        </div>
                                        <label>Màu sắc</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Màu sắc" name="mau_sac">
                                        </div>
                                        <label>Đã mua</label>
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Độ phân giải" name="do_phan_giai">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea id="summernote2" name="description" ></textarea>
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
