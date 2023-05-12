<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:800',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'status' => 'nullable',
        ]);

        $validatedData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';

        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sldr')->with('message', 'Slider Added');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            $destination = $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        } else {
            // If no new image is uploaded, use the existing image
            $validatedData['image'] = $slider->image;
        }
    
        $validatedData['status'] = $request->status == true ? '1' : '0';
    
        $slider->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);
    
        return redirect('admin/sldr')->with('message', 'Slider Updated Successfully');
    }
    
    
    

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect('admin/sldr')->with('message', 'Slider Deleted');
    }
}



        // $request->validate([
        //     'title' => 'required  ',
        //     'description' => 'required',
        // ]);

        // $title = $request->title;
        // $description = $request->description;
        // $status=$request->status == true ? '1' : '0';

        // $product = new Slider;
        // $product->title=$title;
        // $product->description=$description;
        // $product->slug=$slug;
        // $product->brand=$brand;
        // $product->small_description=$small_description;
        // $product->description=$description;
        // $product->original_price=$original_price;
        // $product->selling_price=$selling_price;
        // $product->quantity=$quantity;
        // $product->trending=$trending;
        // $product->status=$status;