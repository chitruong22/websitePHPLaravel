@extends('layouts.admin')
@section('title', 'Thêm mới bài viết | Admin - Graphics Tablet')
@section('content')
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm mới bài viết</a></li>
                        </ul>
                        <form class="product-tab-list tab-pane fade active in" id="description" action = "/admin/blogs/insert" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="input-group mg-b-pro-edt">
                                            <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" placeholder="Tên bài viết" name="title">
                                        </div>
                                        <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <textarea id="summernote2" name="content" ></textarea>
{{--                                                <textarea id="editor" name="content">--}}

{{--                                                </textarea>--}}
{{--                                                <script>--}}
{{--                                                    ClassicEditor--}}
{{--                                                        .create( document.querySelector( '#editor' ) )--}}
{{--                                                        .catch( error => {--}}
{{--                                                            console.error( error );--}}
{{--                                                        } );--}}
{{--                                                </script>--}}
{{--                                                <textarea id="summernote2" name="content" ></textarea>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                            <label>Hình ảnh</label>
                                            <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                                <img id="blah" src="" style="border: 1px solid #e5e6e7;width: 100%;height: 200px;margin-bottom: 5px"/>
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
