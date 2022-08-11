@extends('layouts.admin')
@section('title', 'Chỉnh sửa bài viết | Admin - Graphics Tablet')
@section('content')
    <div class="single-product-tab-area mg-tb-15">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Chỉnh sửa bài viết</a></li>
                            </ul>
                            <form class="product-tab-list tab-pane fade active in" id="description" action = "/admin/blogs/update/<?=$blog->id?>" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="title" value="<?=$blog->title?>">
                                            </div>
                                            <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                                <div class="form-group">
                                                    <label>Nội dung</label>
{{--                                                    <textarea id="editor" name="content">{{$blog->content}}</textarea>--}}
{{--                                                    <script>--}}
{{--                                                        InlineEditor--}}
{{--                                                            .create( document.querySelector( '#editor' ) )--}}
{{--                                                            .catch( error => {--}}
{{--                                                                console.error( error );--}}
{{--                                                            } );--}}
{{--                                                    </script>--}}
                                                    <textarea id="summernote2" name="content">{{$blog->content}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <label>Hình ảnh</label>
                                                <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                                    <img id="blah" src="{{URL::asset('/upload/blogs/'.$blog->image)}}" style="border: 1px solid #e5e6e7;width: 100%;height: 200px;margin-bottom: 5px"/>
                                                    <input type="file" name="image"  onchange="loadFile(event)" />
                                                    <input type="hidden" name="old_image" value="<?=$blog->image?>" />
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
