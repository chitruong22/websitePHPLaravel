<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $bill = new Bill();
        $count_order = $bill->count();
        $products = new Product();
        $count_products = $products->count();
        $turnover = 0;
        $bills = $bill->all();
        foreach ($bills as $item){
            $turnover += $item->total;
        }
        $users = new User();
        $count_users = $users->count();
        return view('admin/dashboard',
            [
                'count_order' => $count_order,
                'count_products'=>$count_products,
                'turnover'=>$turnover,
                'count_users'=>$count_users
            ]
        );
    }
}
