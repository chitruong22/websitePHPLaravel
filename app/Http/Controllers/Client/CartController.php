<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Detail_Bill;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CartController extends Controller
{
    public function index()
    {
        $cart = '';
        if(Auth::user()){
            $cart = Cart::where('id_user', '=', Auth::user()->id)->get();
        }
        return view('client/cart/cart', [
            'cart' => $cart
        ]);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $price = $product->price;
        if($product->discount > 0){
            $price = $price - (($price * $product->discount) / 100);
        }
        if(!empty(Auth::user())){
            $all = Cart::where('id_user', '=', Auth::user()->id)->get();
            $quantity = 1;
            $new = 0;
            if(count($all) == 0){
                Cart::create(array('id_product'=>$id, 'name'=>$product->name, 'quantity'=>$quantity, 'image'=>$product->image,
                    'price'=>$price, 'id_user'=>Auth::user()->id));
            } else{
                foreach ($all as $item){
                    if($item->id_product == $id){
                        $item->quantity = $item->quantity + 1;
                        $item->save();
                        $new = 1;
                    }
                }
                if($new == 0){
                    Cart::create(array('id_product'=>$id, 'name'=>$product->name, 'quantity'=>$quantity,
                        'image'=>$product->image,
                        'price'=>$price,
                        'id_user'=>Auth::user()->id));
                }
            }
        }


        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        alert()->success('Thông báo!','Thêm sản phẩm vào giỏ hàng thành công!');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
            }
            if(!empty(Auth::user())){
                $all = Cart::where('id_user', '=', Auth::user()->id)->get();
                foreach ($all as $item){
                    if($item->id_product == $request->id){
                        $item->quantity = $request->quantity;
                        $item->save();
                    }
                }
            }
            alert()->success('Thông báo!','Cập nhật giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            if(!empty(Auth::user())){
                $all = Cart::where('id_user', '=', Auth::user()->id)->get();
                foreach ($all as $item){
                    if($item->id_product == $request->id){
                        $cart = new Cart();
                        $cart->withTrashed()->where('id_product', $request->id)->forceDelete();
                    }
                }
            }
            alert()->success('Thông báo!','Xóa sản phẩm thành công!');
        }
    }

    public function checkout()
    {
        $user = '';
        if(!empty(Auth::user())){
            $user = User::where('id', '=', Auth::user()->id)->get();
        }
        $categories = new Category();
        $cate = $categories->all(array('name', 'id'));
        $cart = '';
        if(Auth::user()){
            $cart = Cart::where('id_user', '=', Auth::user()->id)->get();
        }
        return view('client/cart/checkout', [
            'user' => $user,
            'cart' => $cart
        ]);
    }
    public function addWishlist($id)
    {
        $all = Wishlist::where('id_user', '=', Auth::user()->id)->get();
        foreach ($all as $item){
            if($item->id_product == $id){
                return redirect()->back()->with('status',"Sản phẩm đã có trong wishlist của bạn!");
            }else{
                session()->put('countW', session('countW') + 1);
                Wishlist::create(array('id_product'=>$id, 'id_user'=>Auth::user()->id));
                alert()->success('Thông báo!','Thêm sản phẩm vào wishlist thành công!');
                return redirect()->back();
            }
        }
    }
    public function wishlist(){
        if(Auth::user()){
            $categories = new Category();
            $cate = $categories->all(array('name', 'id'));
            $list = Wishlist::where('id_user', '=', Auth::user()->id)->get();
            $wishlist = [];
            foreach ($list as $item){
                $wishlist[$item->id] = Product::find($item->id_product);
            }
            return view('client/wishlist', [
                'categories' => $cate,
                'wishlist'=>$wishlist
            ]);

        }else{
            alert()->error('Thông báo!','Vui lòng đăng nhập để sử dụng tính năng này!');
            return redirect()->back();
        }
    }
    public function wishlistRemove($id){
        session()->put('countW', session('countW') - 1);
        $wishlist = new Wishlist();
        $wishlist->withTrashed()->where('id', '=', $id)->forceDelete();
        alert()->success('Thông báo!','Xóa sản phẩm trong wishlist thành công!');
        return redirect()->back();
    }
    public function payment(Request $request){
        $order = session()->get('order', []);
        $order = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "phone" => $request->input('phone'),
            "address" => $request->input('address'),
            "note" => $request->input('note'),
            "count" => $request->input('count'),
            "total" => $request->input('total'),
        ];
        session()->put('order', $order);

        if($request->input('order') == 1){
            $order = session()->get('order');
            $name = $order['name'];
            $email = $order['email'];
            $phone = $order['phone'];
            $address = $order['address'];
            $note = $order['note'];
            $count = $order['count'];
            $payment_status = 'Chưa thanh toán';
            $delivery_status = 'Chưa giao hàng';
            $price_to_pay = $order['total'];
            $bill = new Bill();
            $max_bill = $bill->max('id');
            $id_order = 'DH'.date("Y").($max_bill+1);
            $id_user = '';
            if(!empty(Auth::user())) {
                $id_user = Auth::user()->id;
            }
                $bill_ID =
                    Bill::create(array(
                            'id_order'=>$id_order,
                            'name'=>$name,
                            'email'=>$email,
                            'phone'=>$phone,
                            'address'=>$address,
                            'note'=>$note,
                            'count'=>$count,
                            'total'=>$price_to_pay,
                            'payment_status'=>$payment_status,
                            'delivery_status'=>$delivery_status,
                            'id_user'=>$id_user,
                        )
                    );
            if ($bill_ID) {
                $cart = session()->get('cart', []);
                $detail_bill = new Detail_Bill();
                foreach ($cart as $item) {
                    Detail_Bill::create(array(
                            'product_name' => $item['name'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                            'image' => $item['image'],
                            'id_order' => $id_order
                        )
                    );
                }
                foreach (session()->get('cart') as $key => $item) {
                    unset($cart[$key]);
                    session()->put('cart', $cart);
                }
                if(!empty(Auth::user())) {
                    $delete_cart = Cart::where('id_user', '=', Auth::user()->id)->get();
                    foreach ($delete_cart as $item) {
                        $cart = new Cart();
                        $cart->withTrashed()->where('id_product', $item->id_product)->forceDelete();
                    }
                }
                $categories = new Category();
                $data = $categories->all(array('name', 'id'));
                $data_detail_bill = Detail_Bill::where('id_order', '=', $id_order)->get();
                $data_bill = Bill::where('id_order', '=', $id_order)->get();
                Mail::to($request->input('email'))->send(new OrderMail($data_bill, $data_detail_bill));
                alert()->success('Thông báo!','Đặt hàng thành công!');
                return view('/client/cart/result', [
                    'detail_bill' => $data_detail_bill,
                    'bill' => $data_bill
                ]);
            }
        }else{

            $total_price = $request->input('total');
            $price_to_pay = $total_price * 10;
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

            // config.php
            $vnp_TmnCode = "ZVYN925E"; //Mã website tại VNPAY
            $vnp_HashSecret = "TJAPLVJKGQGEAKISHNHFBREVGCWMLWCW"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/return";


            // end config.php

            $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $total_price * 100000;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            // var_dump($vnp_Url);
            return redirect($vnp_Url);
        }

    }
    public function return(){
        $order = session()->get('order');
        $name = $order['name'];
        $email = $order['email'];
        $phone = $order['phone'];
        $address = $order['address'];
        $note = $order['note'];
        $count = $order['count'];
        $payment_status = 'Đã thanh toán';
        $delivery_status = 'Chưa giao hàng';
        $price_to_pay = $order['total'];
        $discount_price = 0;
        $payments = 'online';
        $status = 'pending';
        $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
        if ($vnp_ResponseCode == 00) {
            $bill = new Bill();
            $max_bill = $bill->max('id');
            $id_order = 'DH'.date("Y").($max_bill+1);
            $id_user = '';
            if(!empty(Auth::user())) {
                $id_user = Auth::user()->id;
            }
            $bill_ID =
                Bill::create(array(
                        'id_order'=>$id_order,
                        'name'=>$name,
                        'email'=>$email,
                        'phone'=>$phone,
                        'address'=>$address,
                        'note'=>$note,
                        'count'=>$count,
                        'total'=>$price_to_pay,
                        'payment_status'=>$payment_status,
                        'delivery_status'=>$delivery_status,
                        'id_user'=>$id_user,
                    )
                );
            // var_dump($insert_bill);
            if ($bill_ID) {
                $cart = session()->get('cart', []);
                $detail_bill = new Detail_Bill();

                foreach ($cart as $item) {
                    Detail_Bill::create(array(
                            'product_name'=>$item['name'],
                            'quantity'=>$item['quantity'],
                            'price'=>$item['price'],
                            'image'=>$item['image'],
                            'id_order'=>$id_order
                        )
                    );
                }
                foreach(session()->get('cart') as $key=>$item) {
                    unset($cart[$key]);
                    session()->put('cart', $cart);
                }
                if(!empty(Auth::user())){
                    $delete_cart = Cart::where('id_user', '=', Auth::user()->id)->get();
                    foreach ($delete_cart as $item){
                        $cart = new Cart();
                        $cart->withTrashed()->where('id_product', $item->id_product)->forceDelete();
                    }
                }
                $categories = new Category();
                $data = $categories->all(array('name', 'id'));
                $data_detail_bill = Detail_Bill::where('id_order', '=', $id_order)->get();
                $data_bill = Bill::where('id_order', '=', $id_order)->get();
                $data_detail_bill = Detail_Bill::where('id_order', '=', $id_order)->get();
                $data_bill = Bill::where('id_order', '=', $id_order)->get();
                Mail::to($email)->send(new OrderMail($data_bill, $data_detail_bill));
                alert()->success('Thông báo!','Đặt hàng và thanh toán thành công!');
                return view('/client/cart/result', [
                    'detail_bill'=>$data_detail_bill,
                    'bill' => $data_bill,
                    'categories' => $data,
//                    'message'=>'Đặt hàng và thanh toán thành công!'
                ]);
            } else {
                $categories = new Category();
                $data = $categories->all(array('name', 'id'));
                alert()->success('Thông báo!','Đặt hàng và thanh toán thất bại!');
                return redirect('/cart');
//                return view('/client/cart/cart', [
//                    'categories' => $data,
//                    'message'=>'Đặt hàng và thanh toán thất bại!'
//                ]);
            }
        }
        else {
            $categories = new Category();
            $data = $categories->all(array('name', 'id'));
            alert()->success('Thông báo!','Đặt hàng và thanh toán thất bại!');
            return redirect('/cart');
//            return view('/client/cart/cart', [
//                'categories' => $data,
//                'message'=>'Thanh toán thất bại!'
//            ]);
        }
    }
}
