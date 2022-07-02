<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{   
    public function allBrands()
    {
        $brands = Brand::latest()->get();

        return view('backend.brand.all_brands', compact('brands'));
    }

    public function addBrands()
    {
        return view('backend.brand.add_brands');
    }

    public function storeBrands(Request $request)
    {    
        $validatedData= $request->validate([
          'brand_name'=>'required|max:255|unique:brands',
          'brand_image'=>'required|mimes:jpg,bmp,png',
        ],
        [
           'brand_name.required'=>'Please input Brand Name',
           'brand_image.required'=>'Please select Brand Image ',
           'brand_image.mimes'=>'File format not supported',
        ]);
        // dd($request);
        $brand_image= $request->file('brand_image');

        $name_generate=hexdec(uniqid());
        $image_ext=strtolower($brand_image->getClientOriginalExtension());
        $image_name= 'img-'.$name_generate.'.'.$image_ext;
        $image_location = 'backend/uploads/brand/';
        $final_image = $image_location.$image_name;
        // $brand_image->move($image_location, $image_name);
        Image::make($brand_image)->resize(300,300)->save($final_image);

           $brand = new Brand;
           $brand->brand_name = $request->brand_name;
           $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
           $brand->brand_image = $final_image;
           $brand->save();

           $notification = [
               'message' => 'Brand added successfully.',
               'alert-type' => 'success',
           ];

           return redirect()->back()->with($notification);

    }

    public function editBrands($id){
        $brands = Brand::findorFail($id);
        return view('backend.brand.edit_brands', compact('brands'));
    }

    public function updateBrands(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'brand_name'=>'required|max:255',
            'brand_image'=>'mimes:jpg,bmp,png',
          ],
          [
             'brand_name.required'=>'Please input Brand Name',
             'brand_image.mimes'=>'File format not supported',
        ]);
        
        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if($brand_image){
        $name_generate = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = 'img-'.$name_generate.'.'.$image_ext;
        $image_location = 'backend/uploads/brand/';
        $final_image = $image_location.$image_name;
        Image::make($brand_image)->resize(300,300)->save($final_image);

        unlink($old_image);

        $brand = Brand::findorFail($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
        $brand->brand_image = $final_image;
        $brand->save();

        $notification = [
            'message' => 'Brand updated successfully.',
            'alert-type' => 'info',
        ];

        return redirect()->route('all.brands')->with($notification);

        }
        else{
            $brand = Brand::findorFail($id);
            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
            $brand->save();

            $notification = [
                'message' => 'Brand updated successfully.',
                'alert-type' => 'info',
            ];
    
            return redirect()->route('all.brands')->with($notification);
        }

    }

    public function deleteBrands($id)
    {
        $brand = Brand::findorFail($id);
        $image = $brand->brand_image;
        unlink($image);
        $brand->delete();

        $notification = [
            'message' => 'Brand deleted successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
