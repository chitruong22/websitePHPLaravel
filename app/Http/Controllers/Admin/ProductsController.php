<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = new Product();
        $data = $products->all();
        return view('admin/products/products', ['products' => $data]);
    }
    public function add(){
        $category = new Category();
        $cat = $category->all();
        return view('admin/products/add', ['categories'=>$cat]);
    }
    public function insert(Request $request){
        if (request()->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $uploadedImage = $request->file('image');
            $destinationPath = public_path('upload/products/');
            $uploadedImage->move($destinationPath, $imageName);
        }
        else {
            $imageName = '';
        }
        $name = $request->input('name');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $availability = $request->input('availability');
        $short_description = $request->input('short_description');
        $catalog_id = $request->input('catalog_id');
        $description = $request->input('description');
        $image_list	= '';
        $view = 0;
        $outstanding = 0;
        if($request->input('outstanding')){
            $outstanding = $request->input('outstanding');
        }
//
        $kich_thuoc = $request->input('kich_thuoc');
        $trong_luong = $request->input('trong_luong');
        $mau_sac = $request->input('mau_sac');
        $do_phan_giai = $request->input('do_phan_giai');
        $information = $kich_thuoc.'|'.$trong_luong.'|'.$mau_sac.'|'.$do_phan_giai;
        Product::create(array('image'=>$imageName, 'name'=>$name, 'price'=>$price,
        'discount'=>$discount, 'availability'=>$availability, 'short_description'=>$short_description,
            'catalog_id'=>$catalog_id, 'description'=>$description, 'information'=>$information,
            'image_list'=>$image_list, 'view'=>$view, 'outstanding'=>$outstanding));
        toast('Thêm thành công!','success');
        return redirect('/admin/products/add');
    }
    public function edit($id){
        $category = new Category();
        $cat = $category->all();
        $product = Product::find($id);
        return view('admin/products/edit',['product'=>$product, 'categories'=>$cat]);
    }
    public function update(Request $request, $id){

        if (request()->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $uploadedImage = $request->file('image');
            $destinationPath = public_path('upload/products/');
            $uploadedImage->move($destinationPath, $imageName);
        }
        else {
            $imageName = $request->input('old_image');
        }
        $name = $request->input('name');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $availability = $request->input('availability');
        $short_description = $request->input('short_description');
        $catalog_id = $request->input('catalog_id');
        $description = $request->input('description');
        $image_list	= '';
        $view = 0;
        $outstanding = 0;
        if($request->input('outstanding')){
            $outstanding = $request->input('outstanding');
        }
//
        $kich_thuoc = $request->input('kich_thuoc');
        $trong_luong = $request->input('trong_luong');
        $mau_sac = $request->input('mau_sac');
        $do_phan_giai = $request->input('do_phan_giai');
        $information = $kich_thuoc.'|'.$trong_luong.'|'.$mau_sac.'|'.$do_phan_giai;

        $product = Product::find($id);
        $product->name = $name;
        $product->price = $price;
        $product->discount = $discount;
        $product->image = $imageName;
        $product->image_list = $image_list;
        $product->short_description = $short_description;
        $product->description = $description;
        $product->availability = $availability;
        $product->information = $information;
        $product->view = $view;
        $product->outstanding = $outstanding;
        $product->catalog_id = $catalog_id;
        $product->save();
        toast('Cập nhật thành công!','success');
        return redirect('/admin/products/edit/'.$id);
    }
    public function delete(Request $request){
        if($request->destroy == 1){
            $product = new Product();
            $product->withTrashed()->where('id', $request->id)->forceDelete();
        }else{
            $product = Product::find($request->id);
            $product->delete();
        }
        toast('Xóa thành công!','success');
        return redirect('/admin/products');
    }
}
