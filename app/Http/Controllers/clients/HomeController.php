<?php

namespace App\Http\Controllers\clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $products = Product::select('*')
        ->where('discount_price','>',0)
        ->get();
        return view('clients.home.index',compact('products'));
    }
}
