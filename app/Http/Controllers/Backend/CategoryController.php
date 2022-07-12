<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

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
          'category_icon'=>'required|mimes:jpg,bmp,png',
        ],
        [
           'category_name.required'=>'Please input Category Name',
           'category_icon.required'=>'Please input Category Icon',
           'category_icon.mimes'=>'File format not supported',
        ]);
    
        $category_icon = $request->file('category_icon');

        if($category_icon)
        {
            $name_generate=hexdec(uniqid());
            $image_ext=strtolower($category_icon->getClientOriginalExtension());
            $image_name= 'img-'.$name_generate.'.'.$image_ext;
            $image_location = 'backend/uploads/category/';
            $final_image = $image_location.$image_name;
            // $brand_image->move($image_location, $image_name);

            if(!is_dir($image_location)) {
        
                mkdir($image_location, 0755, true);
            }

            Image::make($category_icon)->resize(300,300)->save($final_image);

           $category = new Category;
           $category->category_name = $request->category_name;
           $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
           $category->category_icon = $final_image;
           $category->save();

           $notification = [
               'message' => 'Category added successfully.',
               'alert-type' => 'success',
           ];
        }
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
            'category_icon'=>'required|mimes:jpg,bmp,png',
          ],
          [
             'category_name.required'=>'Please input Category Name',
             'category_icon.mimes'=>'File format not supported',
          ]);

          $category = Category::findorFail($id);
          $old_image = $request->old_image;
          $category_icon = $request->file('category_icon');

          if($category_icon)
          {
              $name_generate = hexdec(uniqid());
              $image_ext = strtolower($category_icon->getClientOriginalExtension());
              $image_name = 'img-'.$name_generate.'.'.$image_ext;
              $image_location = 'backend/uploads/category/';
              $final_image = $image_location.$image_name;
  
              if(!is_dir($image_location)) {
  
                  mkdir($image_location, 0755, true);
              }
  
              Image::make($category_icon)->resize(300,300)->save($final_image);
  
              if(File::exists($old_image))
              {
                  unlink($old_image);
              }
  
              $category->category_icon = $final_image;
          }

             $category->category_name = $request->category_name;
             $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
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
        $image = $category->category_icon;

        if(File::exists($image))
        {
            unlink($image);
        }

        $category->delete();

        $notification = [
            'message' => 'Category deleted successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
