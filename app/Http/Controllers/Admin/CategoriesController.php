<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index(){
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        return view('admin/categories/categories', ['categories' => $data]);
    }
    public function create(){
        return view('admin/categories/add');
    }
    public function insert(Request $request){
        $name = $request->input('name');
        Category::create(array('name'=>$name));
        toast('Thêm thành công!','success');
        return redirect('/admin/categories/create');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin/categories/edit',['category'=>$category]);
    }
    public function update(Request $request, $id){
        $data = $request->input('name');
        $category = Category::find($id);
        $category->name = $data;
        $category->save();
        toast('Cập nhật thành công!','success');
        return redirect('/admin/categories/edit/'.$id);
    }
    public function delete(Request $request){
        if($request->destroy == 1){
            $category = new Category();
            $category->withTrashed()->where('id', $request->id)->forceDelete();
        }else{
            $category = Category::find($request->id);
            $category->delete();
        }
        toast('Xóa thành công!','success');
        return redirect('/admin/categories');
    }
}
