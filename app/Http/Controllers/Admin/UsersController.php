<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = new User();
        $data = $users->all();
        return view('admin/users/users', ['users' => $data]);
    }
    public function add(){
        return view('admin/users/add');
    }
    public function insert(Request $request){
        if (request()->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $uploadedImage = $request->file('image');
            $destinationPath = public_path('upload/users/');
            $uploadedImage->move($destinationPath, $imageName);
        }
        else {
            $imageName = '';
        }
        $username = $request->input('username');
        $name = $request->input('name');
        $email = $request->input('email');
//        $phone = $request->input('phone');
//        $address = $request->input('address');
        $password = $request->input('password');
        $role = $request->input('role');
        User::create(array('avatar'=>$imageName, 'name'=>$name, 'username'=>$username, 'email'=>$email, 'password'=>$password, 'role'=>$role));
        toast('Thêm thành công!','success');
        return redirect('/admin/users/add');
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin/users/edit',['user'=>$user]);
    }
    public function update(Request $request, $id){
        if (request()->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $uploadedImage = $request->file('image');
            $destinationPath = public_path('upload/users/');
            $uploadedImage->move($destinationPath, $imageName);
        }
        else {
            $imageName = $request->input('old_image');
        }
        $name = $request->input('name');
        $role = $request->input('role');
        $user = User::find($id);
        $user->avatar = $imageName;
        $user->name = $name;
        $user->role = $role;
        $user->save();
        toast('Cập nhật thành công!','success');
        return redirect('/admin/users/edit/'.$id);
    }
    public function delete(Request $request){
        if($request->destroy == 1){
            $user = new User();
            $user->withTrashed()->where('id', $request->id)->forceDelete();
        }else{
            $user = User::find($request->id);
            $user->delete();
        }
        toast('Xóa thành công!','success');
        return redirect('/admin/users');
    }
}
