<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\ProductImage;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index() {
        return view('admin.slider.index');
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(Request $request){ 
        $request->validate([
            'title' => 'required  ',
            'description' => 'required',
        ]);

        $title = $request->title;
        $description = $request->description;
        $status=$request->status == true ? '1' : '0';

        $slider = new Slider;
        $slider->title=$title;
        $slider->description=$description;
        $slider->status=$status;
        $slider->save();


        // $validatedData = $request->validated();

        if($request->hasFile('image')) {
            $uploadPath = 'uploads/sliders/';

            $i = 1;
            foreach($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath.'-'.$filename;
            }
            $slider->productImages()->create([
                'product_id' => $slider->id,
                'image' => $finalImagePathName,
            ]);
        }

        // $validatedData['status'] = $request->status == true ? '1' : '0';

        // Slider::create([
        //     'title'=> $validatedData['title'],
        //     'description' => $validatedData['description'],
        //     'image' => $validatedData['image'],
        //     'status' => $validatedData['status'],
        // ]);

        return redirect('admin/sldr')->with('message', 'Slider Added');
    }
}
