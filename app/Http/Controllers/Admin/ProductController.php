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
            'category_id'=> 'required | integer',
            'name' => 'required | string',
            'slug' => 'required | string | max:255',
            'brand' => 'required | string | max:255',
            'small_description' => 'required | string',
            'description' => 'required | string',
            'original_price' => 'required | integer',
            'selling_price' => 'required | integer',
            'quantity' => 'required | integer',
            'meta_title' => 'required | string | max:255',
            'meta_keyword' => 'required | string',
            'meta_descripton' => 'required | string',
        ]);

        $category_id = $request->category_id;
        $name = $request->name;
        $slug = $request->slug;
        $brand = $request->brand;
        $small_description = $request->small_description;
        $description = $request->description;
        $original_price = $request->original_price;
        $selling_price = $request->selling_price;
        $quantity = $request->quantity;
        $meta_title = $request->meta_title;
        $meta_keyword = $request->meta_keyword;
        $meta_description = $request->meta_description;
        $status = $request->status == true ? '1' : '0';
        $trending = $request->trending == true ? '1' : '0';

        $product = new Product;
        $product->category_id = $category_id;
        $product->name = $name;
        $product->slug = $slug;
        $product->brand = $brand;
        $product->status = $status;
        $product->small_description = $small_description;
        $product->description = $description;
        $product->original_price = $original_price;
        $product->selling_price = $selling_price;
        $product->quantity = $quantity;
        $product->meta_title = $meta_title;
        $product->meta_keyword = $meta_keyword;
        $product->meta_description = $meta_description;
        $product->trending = $trending;

        

        $product->save();

        return redirect('admin/products')->with('success', 'Brand added successfully');
        // $validatedData = $request->validated();

        // $category = Category::findOrFail($validatedData['category_id']);

        // $product =  $category->products()->create([
        //     'category_id'=> $validatedData['category_id'],
        //     'name'=> $validatedData['name'],
        //     'slug'=> Str::slug($validatedData['slug']),
        //     'brand'=> $validatedData['brand'],
        //     'small_description'=> $validatedData['small_description'],
        //     'description'=> $validatedData['description'],
        //     'original_price'=> $validatedData['original_price'],
        //     'selling_price'=> $validatedData['selling_price'],
        //     'quantity'=> $validatedData['quantity'],
        //     'trending'=> $request->trending == true ? '1' : '0',
        //     'status'=> $request->status == true ? '1' : '0',
        //     'meta_title'=> $validatedData['meta_title'],
        //     'meta_keyword'=> $validatedData['meta_keyword'],
        //     'meta_description'=> $validatedData['meta_description'],
            
        // ]);

        // return $product->id;
    }
}
