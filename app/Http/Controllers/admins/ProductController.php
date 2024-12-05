<?php

namespace App\Http\Controllers\admins;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::select('products.*','categories.name AS category_name')
        ->join('categories','categories.id','products.category_id')
        ->get();
        return view('admins.products.index',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        return view('admins.products.create',compact('categories'));
    }

    public function store(CreateProductRequest $request){
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images/products');
        }

        $data = [
            'category_id' => $request->category_id,
            'code' => $request->code,
            'name' => $request->name,
            'image' => $path_image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
        ];
        Product::create($data);
        return redirect('admin/san-pham/danh-sach')->with('message', 'Thêm mới thành công');
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admins.products.edit',compact('categories','product'));
    }

    public function update(UpdateProductRequest $request, $id){

        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images/products');
            // Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::delete($product->image);
            }
        }

        $data = [
            'category_id' => $request->category_id,
            'code' => $request->code,
            'name' => $request->name,
            'image' => $path_image ?? $product->image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'discount_price' => $request->discount_price,
        ];
        Product::where('id',$request->id)
        ->update($data);
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }

    public function destroy($id){
        $product = Product::find($id);
        // Xóa poster
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::where('id', $id)
        ->delete();
        return redirect('/admin/san-pham/danh-sach');
    }
}
