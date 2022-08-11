@extends('layouts.admin')
@section('title', 'Chỉnh sửa sản phẩm | Admin - Graphics Tablet')
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
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Chỉnh sửa sản phẩm
                                    </a>
                                </li>
                            </ul>
                            <form class="product-tab-list tab-pane fade active in" id="description" action="/admin/products/update/<?=$product->id?>" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="review-content-section">
                                            <label>Hình ảnh</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <div class="input-group mg-b-pro-edt" style="width: 280px; height: 280px;">
                                                    <img id="blah" src="{{URL::asset('/upload/products/'.$product->image)}}" style="border: 1px solid #e5e6e7;width: 100%;margin-bottom: 5px"/>
                                                    <input type="file" name="image"  onchange="loadFile(event)" />
                                                    <input type="hidden" name="old_image" value="<?=$product->image?>" />
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
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$product->id?>" readonly>
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$product->name?>" name="name">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$product->price?>" name="price">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  value="<?=$product->discount?>" name="discount">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-puzzle-piece" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$product->availability?>" name="availability">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-clone" aria-hidden="true"></i></span>
                                                <textarea class="form-control" rows="2" name="short_description"><?=$product->short_description?></textarea>
                                            </div>
                                            <?php
                                                $arr = [];
                                                foreach ($categories as $cat){
                                                    $arr[$cat->id] = $cat->name;
                                                }
                                                unset($arr[$product->catalog_id]);
                                                $arr_cat = [];
                                                foreach ($categories as $cat){
                                                    if($cat->id == $product->catalog_id){
                                                        $arr_cat[$product->catalog_id] = $cat->name;
                                                    }
                                                }
                                                foreach ($arr as $key=>$item){
                                                    $arr_cat[$key] = $item;
                                                }
                                            ?>
                                            <select name="catalog_id" class="form-control pro-edt-select form-control-primary">
                                                @foreach($arr_cat as $key=>$cate)
                                                    <option value="<?=$key?>">{{ $cate }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <?php
                                            $info = explode("|", $product->information)
                                        ?>
                                        <div class="review-content-section">
                                            <label>Nổi bật: </label>
                                            <input type="checkbox" <?php echo ($product->outstanding==1) ? 'checked="checked"':'';?> value="1" name="outstanding" style="
                                            transform: scale(1.2, 1.2);
                                            margin-left: 5px;
                                            line-height: 6px;"><br>
                                            <label>Kích thước</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$info[0]?>" name="kich_thuoc">
                                            </div>
                                            <label>Trọng lượng</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$info[1]?>" name="trong_luong">
                                            </div>
                                            <label>Màu sắc</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$info[2]?>" name="mau_sac">
                                            </div>
                                            <label>Độ phân giải</label>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" value="<?=$info[3]?>" name="do_phan_giai">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea id="summernote2" name="description" ><?=$product->description?></textarea>
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
