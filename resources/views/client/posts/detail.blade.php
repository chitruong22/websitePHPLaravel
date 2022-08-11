@extends('layouts.master')
@section('title', 'Graphics Tablet - Chi tiết bài viết')

@section('client')
<?php
    $link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="{{URL::asset('img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{ $blog->title }}</h2>
                    <ul>
                        <li>By Michael Scofield</li>
                        <li>{{ $blog->created_at }}</li>
                        <li>8 Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
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
                    @foreach($blogs_other as $other)
                    <div class="blog__sidebar__recent pt-3">
                        <a href="/post/<?=$other->id?>" class="blog__sidebar__recent__item">
                            <div class="blog__sidebar__recent__item__pic">
                                <img src="{{URL::asset('upload/blogs/'.$other->image)}}" alt="" width="150px">
                            </div>
                            <div class="blog__sidebar__recent__item__text">
                                <h6>{{ $other->title }}</h6>
                                <span>{{ $other->created_at }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
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
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{URL::asset('upload/blogs/'.$blog->image)}}">
                    {!! $blog->content !!}
                </div>
                <div class="blog__details__content">
                    <div class="row">
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="blog__details__author">--}}
{{--                                <div class="blog__details__author__pic">--}}
{{--                                    <img src="img/blog/details/details-author.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="blog__details__author__text">--}}
{{--                                    <h6>Michael Scofield</h6>--}}
{{--                                    <span>Admin</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
</section>
<!-- Blog Details Section End -->


@stop
