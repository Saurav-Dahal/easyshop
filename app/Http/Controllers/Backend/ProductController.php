<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImage;
use Carbon\Carbon;
use Image;
use File;

class ProductController extends Controller
{
    public function allProducts()
    {   
        $products = Product::latest()->get();
        return view('backend.product.all_products', compact('products'));
    }

    public function addProducts()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $brands = Brand::orderBy('brand_name', 'ASC')->get();
        return view('backend.product.add_products', compact('categories', 'brands'));
    }

    public function storeProducts(Request $request)
    {    
        $validatedData= $request->validate([
            'brand_id' => 'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
            'product_name' => 'required|max:255',
            'product_code'=> 'required',
            'product_qty' => 'required',
            'product_color' => 'required',
            'product_tags' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            // 'product_thumbnail'=>'required|mimes:jpeg,jpg,bmp,png',
            // 'multi_img'=>'mimes:jpeg,jpg,bmp,png',
        ],
        [
           'product_thumbnail.required'=>'Please select Product Image',
           'product_thumbnail.mimes'=>'File format not supported',
           'multi_img.mimes'=>'File format not supported',
           'brand_id.required'=>'Brand must be selected.',
           'category_id.required'=>'Category must be selected.',
           'subcategory_id.required'=>'SubCategory must be selected.',
           'subsubcategory_id.required'=>'Sub SubCategory must be selected.',

        ]);
            //----------------For Product Image----------------//
        if($request->hasFile('product_thumbnail'))
        {
            $product_thumbnail = $request->file('product_thumbnail');

            $name_generate = hexdec(uniqid());
            $image_ext = strtolower($product_thumbnail->getClientOriginalExtension());
            $image_name= 'img-'.$name_generate.'.'.$image_ext;
            $image_location = 'backend/uploads/product/thumbnail/';
            $final_image = $image_location.$image_name;

                if(!is_dir($image_location)) {

                    mkdir($image_location, 0755, true);
                }

            Image::make($product_thumbnail)->resize(917,1000)->save($final_image);

            $product = new Product;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->subsubcategory_id = $request->subsubcategory_id;
            $product->product_name = $request->product_name;
            $product->product_slug = strtolower(str_replace(' ', '-', $request->product_name));
            $product->product_code = $request->product_code;
            $product->product_qty = $request->product_qty;
            $product->product_tags = $request->product_tags;
            $product->product_size = $request->product_size;
            $product->product_color = $request->product_color;
            $product->selling_price = $request->selling_price;
            $product->discount_price = $request->discount_price;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->hot_deals = $request->hot_deals;
            $product->featured = $request->featured;
            $product->speacial_offer = $request->special_offer;
            $product->speacial_deals = $request->special_deals;
            $product->status = $request->status;
            $product->product_thumbnail = $final_image;
            $product->created_at = Carbon::now();
            $product->save();
        }
            

            //-------------------Product Image Ends ------------------//

            //----------------For Multi Image----------------//
            if($request->hasFile('multi_img'))
            {
                $image = $request->file('multi_img');
                foreach($image as $images)
                {
                    $name_gen = hexdec(uniqid());
                    $multi_image_ext = strtolower($images->getClientOriginalExtension());
                    $multi_image_name= 'img-'.$name_gen.'.'.$multi_image_ext;
                    $img_location = 'backend/uploads/product/multi_image/';
                    $final_img = $img_location.$multi_image_name;
        
                    if(!is_dir($img_location)) {
        
                        mkdir($img_location, 0755, true);
                    }
        
                    Image::make($images)->resize(917,1000)->save($final_img);
                    
                    $multiple_img = new MultiImage;
                    $multiple_img->product_id = $product->id;
                    $multiple_img->photo_name = $final_img;
                    $multiple_img->created_at = Carbon::now();
                    $multiple_img->save();
                }
            }
            

            //----------------For Multi Image Ends----------------//

            $notification = [
               'message' => 'Product added successfully.',
               'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

    }

    public function editProducts($id)
    {   
        $brands = Brand::orderBy('brand_name', 'ASC')->get();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $products = Product::findorFail($id);
        
        return view('backend.product.edit_products', compact('products', 'brands', 'categories', 'subcategories', 'subsubcategories'));
    }

    public function updateProducts(Request $request, $id)
    { 
        // dd($request->all());
        $validatedData= $request->validate([
            'brand_id' => 'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
            'product_name' => 'required|max:255',
            'product_code'=> 'required',
            'product_qty' => 'required',
            'product_color' => 'required',
            'product_tags' => 'required',
            'product_size' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            // 'product_thumbnail'=>'required|mimes:jpeg,jpg,bmp,png',
            // 'multi_img'=>'mimes:jpeg,jpg,bmp,png',
        ],
        [
           'product_thumbnail.required'=>'Please select Product Image',
           'product_thumbnail.mimes'=>'File format not supported',
           'multi_img.mimes'=>'File format not supported',
           'brand_id.required'=>'Brand must be selected.',
           'category_id.required'=>'Category must be selected.',
           'subcategory_id.required'=>'SubCategory must be selected.',
           'subsubcategory_id.required'=>'Sub SubCategory must be selected.',

        ]);

            $product = Product::findorFail($id);

            //----------------For Product Image----------------//
            if($request->hasFile('product_thumbnail'))
            {
                $product_thumbnail = $request->file('product_thumbnail');
                $old_image = $request->old_image;

                $name_generate = hexdec(uniqid());
                $image_ext = strtolower($product_thumbnail->getClientOriginalExtension());
                $image_name= 'img-'.$name_generate.'.'.$image_ext;
                $image_location = 'backend/uploads/product/thumbnail/';
                $final_image = $image_location.$image_name;

                if(!is_dir($image_location)) {

                    mkdir($image_location, 0755, true);
                }

                Image::make($product_thumbnail)->resize(917,1000)->save($final_image);
                
                    if(File::exists($old_image))
                    {
                        unlink($old_image);
                    }

                $product->product_thumbnail = $final_image;
            }

            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->subsubcategory_id = $request->subsubcategory_id;
            $product->product_name = $request->product_name;
            $product->product_slug = strtolower(str_replace(' ', '-', $request->product_name));
            $product->product_code = $request->product_code;
            $product->product_qty = $request->product_qty;
            $product->product_tags = $request->product_tags;
            $product->product_size = $request->product_size;
            $product->product_color = $request->product_color;
            $product->selling_price = $request->selling_price;
            $product->discount_price = $request->discount_price;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->hot_deals = $request->hot_deals;
            $product->featured = $request->featured;
            $product->speacial_offer = $request->special_offer;
            $product->speacial_deals = $request->special_deals;
            $product->status = $request->status;
            $product->created_at = Carbon::now();
            $product->save();
            //-------------------Product Image Ends ------------------//

            //----------------For Multi Image----------------//
            
            if($request->hasFile('multi_img'))
            {
                $image = $request->file('multi_img');
                foreach($image as $images)
                {
                    $name_gen = hexdec(uniqid());
                    $multi_image_ext = strtolower($images->getClientOriginalExtension());
                    $multi_image_name= 'img-'.$name_gen.'.'.$multi_image_ext;
                    $img_location = 'backend/uploads/product/multi_image/';
                    $final_img = $img_location.$multi_image_name;
        
                    if(!is_dir($img_location)) {
        
                        mkdir($img_location, 0755, true);
                    }
        
                    Image::make($images)->resize(917,1000)->save($final_img);

                    $multiple_img = new MultiImage;
                    $multiple_img->product_id = $product->id;
                    $multiple_img->photo_name = $final_img;
                    $multiple_img->created_at = Carbon::now();
                    $multiple_img->save();
                }
            }
            //----------------For Multi Image Ends----------------//

            $notification = [
               'message' => 'Product updated successfully.',
               'alert-type' => 'info',
            ];


        return redirect()->route('all.products')->with($notification);
    }

    public function deleteProducts($id)
    {
        $product = Product::findorFail($id);

        if(File::exists($product->product_thumbnail))
        {
            unlink($product->product_thumbnail);
        }

        foreach($product->images as $image)
        {
            if(File::exists($image->photo_name))
            {
                unlink($image->photo_name);
                $image->delete();        
            }
        }
        $product->delete();

        $notification = [
            'message' => 'Product deleted successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function deleteMultiImage($id)
    {
        $multi_image = MultiImage::findorFail($id);
        $photo_name = $multi_image->photo_name;
        if(File::exists($photo_name))
        {
            unlink($photo_name);
        }
        
        $multi_image->delete();

        return redirect()->back();
    }
}
