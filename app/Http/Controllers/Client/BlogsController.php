<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(){
        $blogs = new Blog();
        $list_blogs = $blogs->all();
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        $blogs_new = Blog::orderBy('created_at', 'DESC')->take(3)->get();
        return view('client/posts/posts',
            [
                'categories' => $data,
                'blogs' => $list_blogs,
                'blogs_new'=>$blogs_new
            ]);
    }
    public function showItem($id){
        $categories = new Category();
        $cate = $categories->all(array('name', 'id'));
        $blog = Blog::find($id);
        $blogs_other = Blog::orderBy('created_at', 'DESC')->take(3)->get();
        return view('client/posts/detail',
            [
                'categories'=>$cate,
                'blog'=>$blog,
                'blogs_other'=>$blogs_other
            ]);
    }
}
