<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $data = Brand::get();
        return view('admin.brand.index', compact('data'));
    }

    public function create()
    {
        
        $categories = Category::get();
        return view('admin.brand.create',compact('categories'));
    }

    public function store(BrandRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category_id'=>'required|integer'
        ]);

        $name = $request->name;
        $slug = $request->slug;
        $status = $request->status == true ? '1' : '0';
        $category_id = $request->category_id;
        $brand = new Brand;
        $brand->name = $name;
        $brand->status = $status;
        $brand->slug = $slug;
        $brand->category_id = $category_id;

        $brand->save();

        return redirect('admin/brands')->with('success', 'Brand added successfully');
    }

    public function edit($id)
    {
        $brand = Brand::where('id', '=', $id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category_id'=>'required|integer'
        ]);

        $name = $request->name;
        $slug=$request->slug;
        $status = $request->status == true ? '1' : '0';
        $category_id = $request->category_id;
        Brand::where('id', '=', $id)->update([
            'name'=>$name,
            'slug' => $slug,
            'status'=>$status,
            'category_id'=>$category_id
        ]);

        return redirect('admin/brands')->with('success', 'Brand updated successfully');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect('admin/brands')->with('success', 'Brand deleted successfully');
    }
}
