<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;


class ProductController extends Controller
{
    public function allProducts()
    {   
        $subcategories = SubCategory::latest()->get();

        return view('backend.subcategory.all_subcategories', compact('subcategories'));
    }

    public function addProducts()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.subcategory.add_subcategories', compact('categories'));
    }

    public function storeProducts(Request $request)
    {    
        $validatedData= $request->validate([
          'category_id'=>'required',
          'subcategory_name'=>'required',
        ],
        [
           'category_id.required'=>'Category must be selected.',
           'subcategory_name.required'=>'Please input subcategory.',
        ]);
        // dd($request);

           $subcategory = new SubCategory;
           $subcategory->category_id = $request->category_id;
           $subcategory->subcategory_name = $request->subcategory_name;
           $subcategory->subcategory_slug = strtolower(str_replace(' ', '-', $request->subcategory_slug));
           $subcategory->save();

           $notification = [
               'message' => 'Subcategory added successfully.',
               'alert-type' => 'success',
           ];

           return redirect()->back()->with($notification);

    }

    public function editProducts($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::findorFail($id);
        return view('backend.subcategory.edit_subcategories', compact('subcategories', 'categories'));
    }

    public function updateProducts(Request $request, $id)
    { 
        $validatedData= $request->validate([
        'category_id'=>'required',
        'subcategory_name'=>'required',
        ],
        [
            'category_id.required'=>'Category must be selected.',
            'subcategory_name.required'=>'Please input subcategory.',
        ]);
        // dd($request);

        $subcategory = SubCategory::findorFail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = strtolower(str_replace(' ', '-', $request->subcategory_name));
        $subcategory->save();

        $notification = [
        'message' => 'SubCategory updated successfully.',
        'alert-type' => 'info',
        ];

        return redirect()->route('all.subcategories')->with($notification);
    }

    public function deleteProducts($id)
    {
        $subcategory = Subcategory::findorFail($id);
        $subcategory->delete();

        $notification = [
            'message' => 'Subcategory deleted successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
}
