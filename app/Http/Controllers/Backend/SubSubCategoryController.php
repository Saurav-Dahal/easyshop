<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;


class SubSubCategoryController extends Controller
{
    public function allSubSubCategories()
    {   
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.all_subsubcategories', compact('subsubcategories'));
    }

    public function addSubSubCategories()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.subsubcategory.add_subsubcategories', compact('categories'));
    }

    public function storeSubSubCategories(Request $request)
    {    
        $validatedData= $request->validate([
        'category_id'=>'required',
        'sub_category_id'=>'required',
        'subsubcategory_name'=>'required',
        ],
        [
        'category_id.required'=>'Category must be selected.',
        'sub_category_id.required'=>'SubCategory must be selected.',
        'subsubcategory_name.required'=>'Please input subsubcategory.',
        ]);
        // dd($request);

        $subsubcategory = new SubSubCategory;
        $subsubcategory->sub_category_id = $request->sub_category_id;
        $subsubcategory->subsubcategory_name = $request->subsubcategory_name;
        $subsubcategory->subsubcategory_slug = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
        $subsubcategory->save();

        $notification = [
            'message' => 'SubSubcategory added successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }

    public function editSubSubCategories($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name', 'ASC')->get();
        $subsubcategories = SubSubCategory::findorFail($id);
        return view('backend.subsubcategory.edit_subsubcategories', compact('subsubcategories','subcategories', 'categories'));
    }

    public function updateSubSubCategories(Request $request, $id)
    { 
        $validatedData= $request->validate([
        'category_id'=>'required',
        'sub_category_id'=>'required',
        'subsubcategory_name'=>'required',
        ],
        [
            'category_id.required'=>'Category must be selected.',
            'sub_category_id.required'=>'Category must be selected.',
            'subsubcategory_name.required'=>'Please input subsubcategory.',
        ]);
        // dd($request);

        $subsubcategory = SubSubCategory::findorFail($id);
        $subsubcategory->sub_category_id = $request->sub_category_id;
        $subsubcategory->subsubcategory_name = $request->subsubcategory_name;
        $subsubcategory->subsubcategory_slug = strtolower(str_replace(' ', '-', $request->subsubcategory_name));
        $subsubcategory->save();

        $notification = [
        'message' => 'SubSubCategory updated successfully.',
        'alert-type' => 'info',
        ];

        return redirect()->route('all.subsubcategories')->with($notification);
    }

    public function deleteSubSubCategories($id)
    {
        $subsubcategory = SubSubcategory::findorFail($id);

        if($subsubcategory)
        {
            $subsubcategory->delete();
            $notification = [
                'message' => 'SubSubcategory deleted successfully.',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
        }
    }

    public function getAllSubCategories($category_id)
    {
        $subcategory = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcategory);
    }

    public function getAllSubSubCategories($subcategory_id)
    {
        $subsubcategory = SubSubCategory::where('sub_category_id', $subcategory_id)->orderBy('subsubcategory_name', 'ASC')->get();
        return json_encode($subsubcategory);
    }
}
