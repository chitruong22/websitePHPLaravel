<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(){
        $blogs = new Blog();
        $data = $blogs->all();
        return view('admin/blogs/blogs', ['blogs' => $data]);
    }
    public function create(){
        return view('admin/blogs/add');
    }
    public function insert(Request $request){
        if (request()->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $uploadedImage = $request->file('image');
            $destinationPath = public_path('upload/blogs/');
            $uploadedImage->move($destinationPath, $imageName);
        }
        else {
            $imageName = '';
        }
        $title = $request->input('title');
        $content = $request->input('content');
        Blog::create(array('image'=>$imageName, 'title'=>$title, 'content'=>$content));
        toast('Thêm thành công!','success');
        return redirect('/admin/blogs/create');
    }
    public function edit($id){
        $blog = Blog::find($id);
        return view('admin/blogs/edit',['blog'=>$blog]);
    }
    public function update(Request $request, $id){
        if (request()->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $uploadedImage = $request->file('image');
            $destinationPath = public_path('upload/');
            $uploadedImage->move($destinationPath, $imageName);
        }
        else {
            $imageName = $request->input('old_image');
        }
        $title = $request->input('title');
        $content = $request->input('content');
        $blog = Blog::find($id);
        $blog->image = $imageName;
        $blog->title = $title;
        $blog->content = $content;
        $blog->save();
        toast('Cập nhật thành công!','success');
        return redirect('/admin/blogs/edit/'.$id);
    }
    public function delete(Request $request){
        if($request->destroy == 1){
            $blog = new Blog();
            $blog->withTrashed()->where('id', $request->id)->forceDelete();
        }else{
            $blog = Blog::find($request->id);
            $blog->delete();
        }
        toast('Xóa thành công!','success');
        return redirect('/admin/blogs');
    }
}
