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
          'brand_image'=>'mimes:jpg,bmp,png',
        ],
        [
           'brand_name.required'=>'Please Input Brand Name',
        ]
        );

        $brand_image= $request->file('brand_image');

        $name_generate=hexdec(uniqid());
        $image_ext=strtolower($brand_image->getClientOriginalExtension());
        $image_name= 'img-'.$name_generate.'.'.$image_ext;
        // echo $image_name;
        $image_location = 'image/brand/';
        $final_image = $image_location.$image_name;
        // echo $final_image;
        // $brand_image->move($image_location, $image_name);
        Image::make($brand_image)->resize(300,200)->save($final_image);

        // exit();

           $brand = new Brand;
           $brand->brand_name = $request->brand_name;
           $brand->brand_image = $final_image;
           $brand->save();

           return redirect()->back()->with('success', 'Brand added successfully.');

    }

    public function editBrands($id){
        $brands = Brand::find($id);
        return view('editbrand', compact('brands'));
    }

    public function updateBrands(Request $request, $id)
    { 
        $validatedData = $request->validate([
            'brand_name'=>'required|max:255',
            'brand_image'=>'mimes:jpg,bmp,png',
          ],
          [
             'brand_name.required'=>'Please Input Brand Name',
        ]);
        
        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if($brand_image){
        $name_generate = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = 'img-'.$name_generate.'.'.$image_ext;
        $image_location = 'image/brand/';
        $final_image = $image_location.$image_name;
        $brand_image->move($image_location, $image_name);

        unlink($old_image);

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $final_image;
        $brand->save();

        return redirect()->back()->with('success', 'Brand updated successfully.');
        }
        else{
            $brand = Brand::find($id);
            $brand->brand_name = $request->brand_name;
            $brand->save();
    
            return redirect()->back()->with('success', 'Brand updated successfully.');
        }

    }

    public function deleteBrands($id)
    {
        $brand = Brand::find($id);
        $image = $brand->brand_image;
        unlink($image);
        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }
}
