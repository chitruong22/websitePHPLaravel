<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $categories = new Category();
        $data = $categories->all(array('name', 'id'));
        return view('client/contact', [
            'categories' => $data
        ]);
    }
}
