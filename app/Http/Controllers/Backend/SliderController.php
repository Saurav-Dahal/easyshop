<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;
use File;

class SliderController extends Controller
{ 
    public function allSliders()
    {
        $sliders = Slider::latest()->get();

        return view('backend.slider.all_sliders', compact('sliders'));
    }

    public function addSliders()
    {
        return view('backend.slider.add_sliders');
    }

    public function storeSliders(Request $request)
    {    
        $validatedData= $request->validate([
          'slider_name'=>'required|max:255|unique:sliders',
          'slider_image'=>'required|mimes:jpg,bmp,png',
        ],
        [
           'slider_name.required'=>'Please input Slider Name',
           'slider_image.required'=>'Please select Slider Image ',
           'slider_image.mimes'=>'File format not supported',
        ]);
        // dd($request);

        if($request->hasFile('slider_image'))
        {
            $slider_image= $request->file('slider_image');

            $name_generate=hexdec(uniqid());
            $image_ext=strtolower($slider_image->getClientOriginalExtension());
            $image_name= 'img-'.$name_generate.'.'.$image_ext;
            $image_location = 'backend/uploads/slider/';
            $final_image = $image_location.$image_name;
            // $brand_image->move($image_location, $image_name);

            if(!is_dir($image_location)) {

                mkdir($image_location, 0755, true);
            }

            Image::make($slider_image)->resize(870,370)->save($final_image);

            $slider = new Slider;
            $slider->slider_name = $request->slider_name;
            $slider->slider_slug = strtolower(str_replace(' ', '-', $request->slider_name));
            $slider->slider_description = $request->slider_description;
            $slider->slider_image = $final_image;
            $slider->status = $request->status;
            $slider->save();
        }
           $notification = [
               'message' => 'Slider added successfully.',
               'alert-type' => 'success',
           ];

           return redirect()->back()->with($notification);

    }

    public function editSliders($id)
    {
        $sliders = Slider::findorFail($id);
        return view('backend.slider.edit_sliders', compact('sliders'));
    }

    public function updateSliders(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'slider_name'=>'required|max:255',
            'slider_image'=>'mimes:jpg,bmp,png',
          ],
          [
             'slider_name.required'=>'Please input Slider Name',
             'slider_image.mimes'=>'File format not supported',
        ]);

        $slider = Slider::findorFail($id);

        $old_image = $request->old_image;
        $slider_image = $request->file('slider_image');

        if($slider_image)
        {
            $name_generate = hexdec(uniqid());
            $image_ext = strtolower($slider_image->getClientOriginalExtension());
            $image_name = 'img-'.$name_generate.'.'.$image_ext;
            $image_location = 'backend/uploads/slider/';
            $final_image = $image_location.$image_name;

            if(!is_dir($image_location)) {

                mkdir($image_location, 0755, true);
            }

            Image::make($slider_image)->resize(870,370)->save($final_image);

            if(File::exists($old_image))
            {
                unlink($old_image);
            }

            $slider->slider_image = $final_image;
        }

           $slider->slider_name = $request->slider_name;
           $slider->slider_slug = strtolower(str_replace(' ', '-', $request->slider_name));
           $slider->slider_description = $request->slider_description;
           $slider->status = $request->status;
           $slider->save();

        $notification = [
            'message' => 'Slider updated successfully.',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.sliders')->with($notification);

    }

    public function deleteSliders($id)
    {
        $slider = Slider::findorFail($id);
        $image = $slider->slider_image;

        if(File::exists($image))
            {
                unlink($image);
            }

        $slider->delete();

        $notification = [
            'message' => 'Slider deleted successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}