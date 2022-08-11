@extends('layouts.master')
@section('title', 'Graphics Tablet - Bài viết')

@section('client')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bài viết</h2>
                    <div class="breadcrumb__option">
                        <a href="/">Trang chủ</a>
                        <span>Bài viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Tìm kiếm...">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Bài viết mới</h4>
                        <div class="blog__sidebar__recent">
                            @foreach($blogs_new as $item)
                            <a href="/post/{{ $item->id }}" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{URL::asset('/upload/blogs/'.$item->image)}}" alt="" width="135px">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>{{ $item->title }}</h6>
                                    <span>{{ $item->created_at }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tags</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Intuos</a>
                            <a href="#">Intuos Pro</a>
                            <a href="#">Cintiq & One</a>
                            <a href="#">Cintiq Pro</a>
                            <a href="#">MobileStudio Pro</a>
                            <a href="#">SmartPads</a>
                        </div>
                    </div>
                </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{URL::asset('/upload/blogs/'.$blog->image)}}" alt="" class="img-object-fit">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ $blog->created_at}}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="/post/{{ $blog->id }}">{{ $blog->title }}</a></h5>
                                <div>
                                    {!! Illuminate\Support\Str::limit($blog->content, 100, $end='...') !!}
                                </div>
                                <a href="/post/{{ $blog->id }}" class="blog__btn">ĐỌC TIẾP <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


@stop
