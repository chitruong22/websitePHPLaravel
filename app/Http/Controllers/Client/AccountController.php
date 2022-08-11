<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Detail_Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index($id){
        $user = User::find($id);
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        return view('/client/account/profile', [
            'categories' => $data,
            'user'=>$user
        ]);
    }
    public function edit($id){
        $user = User::find($id);
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        return view('/client/account/update', [
            'categories' => $data,
            'user'=>$user
        ]);
    }
    public function change($id){
        $user = User::find($id);
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        return view('/client/account/change', [
            'categories' => $data,
            'user'=>$user,
            'id'=>$id
        ]);
    }
    public function changePass(Request $request, $id){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'old_pass' => 'required|min:8',
            'new_pass' => 'required|min:8',
            'c_pass' => 'required|min:8',
        ]);
        $old_pass = $request->input('old_pass');
        $new_pass = $request->input('new_pass');
        $c_pass = $request->input('c_pass');
        $email = $request->input('email');
        $user = User::find($id);
        $result = $user::where('email', '=', $email)->get();
        if(!$result){
            alert()->error('Lỗi!','Vui lòng nhập đúng địa chỉ email của bạn!');
            return redirect('/user/profile/change-pass/'.$id);
        }
        else{
            $user->password = Hash::make($new_pass);
            $user->save();
            $categories = new Category();
            $data = $categories->all(array('name', 'id'));
            alert()->success('Thông báo!','Đổi mật khẩu thành công!');
            return redirect('/user/profile/change-pass/'.$id);

        }
    }
    public function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $user = User::find($id);
        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        $user->save();
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        alert()->success('Cập nhật tài khoản thành công!');
        return view('/client/account/update', [
            'categories' => $data,
            'user'=>$user,
            'id'=>$id
        ]);
    }
    public function history($id){
        $user = User::find($id);
        $history = Bill::where('id_user', '=', $id)->get();
        return view('/client/account/history_orders', [
            'history' => $history,
            'user'=>$user
        ]);
    }
    public function historyDetail($id){
        $user = User::find(Auth::user()->id);
        $history = Bill::where('id_user', '=', Auth::user()->id)->get();
        $history_detail = Detail_Bill::where('id_order', '=', $id)->get();
        return view('/client/account/history_detail', [
            'history' => $history,
            'history_detail' => $history_detail,
            'user'=>$user
        ]);
    }
}
