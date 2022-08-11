<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Detail_Bill;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    public function index(){
        $blogs = new Bill();
        $data = $blogs->all();
        return view('admin/bills/bills', ['bills' => $data]);
    }
    public function add(){
        return view('admin/bills/add');
    }
    public function detail(){
        return view('admin/bills/detail');
    }
    public function edit($id){
        $detail_bill = Bill::find($id);
        return view('admin/bills/edit', ['detailBill' => $detail_bill]);
    }
    public function update(Request $request,$id){
        $payment_status = $request->input('payment_status');
        if($payment_status == 'ps1'){
            $payment_status ='Đã thanh toán';
        }else{
            $payment_status ='Chưa thanh toán';
        }
        $delivery_status = $request->input('delivery_status');
        if($delivery_status == 'ds1'){
            $delivery_status ='Chưa giao hàng';
        }elseif ($delivery_status == 'ds2'){
            $delivery_status ='Đang giao hàng';
        }else{
            $delivery_status ='Đã giao hàng';
        }

        $detail_bill = Bill::find($id);
        $detail_bill->payment_status = $payment_status;
        $detail_bill->delivery_status = $delivery_status;
        $detail_bill->save();
<<<<<<< HEAD
        toast('Cập nhật thành công!','success');
        return redirect('admin/bills/edit/'.$id);
=======
        return redirect('admin/bills/edit/'.$id)->with('status',"Cập nhật thành công!");
>>>>>>> 414c611... initial commit
    }
    public function delete(Request $request){
        if($request->destroy == 1){
            $bill = new Bill();
            $detail_bill = new Detail_Bill();
            $bill->withTrashed()->where('id_order', $request->id)->forceDelete();
            $detail_bill->withTrashed()->where('id_order', $request->id)->forceDelete();
        }else{
            $bill = Bill::where('id_order', $request->id);
            $detail_bill = Detail_Bill::where('id_order', $request->id);
            $bill->delete();
            $detail_bill->delete();
        }
<<<<<<< HEAD
        toast('Xóa thành công!','success');
        return redirect('/admin/bills');
=======
        return redirect('/admin/bills')->with('status',"Xóa thành công!");
>>>>>>> 414c611... initial commit
    }
}
