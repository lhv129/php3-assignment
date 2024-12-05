<?php

namespace App\Http\Controllers\clients;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($category = null)
    {
        if ($category) {
            $products = $this->QueryProducts()->get();
        } else {
            $products = Product::all();
        }
        return view('clients.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::select('products.*', 'categories.name AS category_name')
            ->join('categories', 'categories.id', 'products.category_id')
            ->where('products.id', $id)
            ->first();
        return view('clients.products.details', compact('product'));
    }

    public function QueryProducts()
    {
        $query = Product::select('id', 'name', 'image', 'discount_price', 'unit_price','category_id');
        return $query;
    }
}
