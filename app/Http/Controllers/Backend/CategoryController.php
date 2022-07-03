<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = Category::latest()->get();

        return view('backend.category.all_categories', compact('categories'));
    }

    public function addCategories()
    {
        return view('backend.category.add_categories');
    }

    public function storeCategories(Request $request)
    {    
        $validatedData= $request->validate([
          'category_name'=>'required|max:255|unique:categories',
          'category_icon'=>'required',
        ],
        [
           'category_name.required'=>'Please input Category Name',
           'category_icon.required'=>'Please input Category Icon',
        ]);
        // dd($request);

           $category = new Category;
           $category->category_name = $request->category_name;
           $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
           $category->category_icon = $request->category_icon;
           $category->save();

           $notification = [
               'message' => 'Category added successfully.',
               'alert-type' => 'success',
           ];

           return redirect()->back()->with($notification);

    }

    public function editCategories($id){
        $categories = Category::findorFail($id);
        return view('backend.category.edit_categories', compact('categories'));
    }

    public function updateCategories(Request $request, $id)
    { 
        $validatedData= $request->validate([
            'category_name'=>'required|max:255',
            'category_icon'=>'required',
          ],
          [
             'category_name.required'=>'Please input Category Name',
             'category_icon.required'=>'Please select Category Icon',
          ]);
          // dd($request);
  
             $category = Category::findorFail($id);
             $category->category_name = $request->category_name;
             $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
             $category->category_icon = $request->category_icon;
             $category->save();
  
             $notification = [
                 'message' => 'Category updated successfully.',
                 'alert-type' => 'info',
             ];

        return redirect()->route('all.categories')->with($notification);
    }

    public function deleteCategories($id)
    {
        $category = Category::findorFail($id);
        $category->delete();

        $notification = [
            'message' => 'Category deleted successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
