<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create',compact('categories', 'brands'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_id'=>'required',
            'name' => 'required',
            'slug' => 'required',
            'brand' => 'required',
            'small_description'=> 'required',
            'description'=> 'required',
            'original_price'=> 'required',
            'selling_price'=> 'required',
           'quantity' => 'required',
          'meta_title' =>'required',
          'meta_keyword' =>'required',
         'meta_description' =>'required',
        ]);
        $category_id = $request->category_id;
        $name = $request->name;
        $slug = $request->slug;
        $brand=$request->brand;
        $small_description=$request->small_description;
        $description=$request->description;
        $original_price=$request->original_price;
        $selling_price=$request->selling_price;
        $quantity=$request->quantity;
        $trending=$request->trending == true ? '1' : '0';
        $status=$request->status == true ? '1' : '0';
        $meta_title=$request->meta_title;
        $meta_keyword=$request->meta_keyword;
        $meta_description=$request->meta_description;

        $product = new Product;
        $product->category_id=$category_id;
        $product->name=$name;
        $product->slug=$slug;
        $product->brand=$brand;
        $product->small_description=$small_description;
        $product->description=$description;
        $product->original_price=$original_price;
        $product->selling_price=$selling_price;
        $product->quantity=$quantity;
        $product->trending=$trending;
        $product->status=$status;
        $product->meta_title=$meta_title;
        $product->meta_keyword=$meta_keyword;
        $product->meta_description=$meta_description;
        $product->save();
        return redirect('admin/products')->with('success', 'Product added successfully');
    }
}
