<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(7)->get();
        $categories = Category::select('category_name', 'id')->orderBy('category_name','ASC')->with(['subcategories.subsubcategories' => fn($q) => $q->orderBy('subsubcategory_name', 'ASC')])->get();
        $featuredProducts = Product::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->limit(7)->get();
        $hotDeals = Product::where('status', 1)->where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $specialOffers = Product::where('status', 1)->where('speacial_offer', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $specialDeals = Product::where('status', 1)->where('speacial_deals', 1)->orderBy('id', 'DESC')->limit(6)->get();
        return view('frontend.index', compact('categories', 'sliders', 'products', 'featuredProducts', 'hotDeals', 'specialOffers', 'specialDeals'));
    }

    public function updateUser(Request $request)
    {
        $updateUser = User::find(Auth::user()->id);
        $updateUser->name = $request->name;
        $updateUser->email = $request->email;
        $updateUser->phone_no = $request->phone_no;

        if($request->file('profile_pic'))
        {
            $validatedData = $request->validate([
                'profile_pic'=>'mimes:jpg,bmp,png'
            ]);

            $file = $request->file('profile_pic');
            @unlink(public_path('frontend/assets/uploads/profile_images/'.$updateUser->profile_pic));
            $filename = date('YmdHi').'-'.$file->getClientOriginalName();
            $image_location = 'frontend/assets/uploads/profile_images';
            if(!is_dir($image_location)) {

                mkdir($image_location, 0755, true);
            }
            $file->move(public_path($image_location), $filename);
            // $file->move(public_path('frontend/assets/uploads/profile_images'), $filename);
            $updateUser->profile_pic = $filename;
        }
            $updateUser->save();

            $notification = [
                'message' => 'User Updated Successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
    }

    public function productDetailsPage($id, $slug)
    {
        $categories = Category::select('category_name', 'id')->orderBy('category_name','ASC')->with(['subcategories.subsubcategories' => fn($q) => $q->orderBy('subsubcategory_name', 'ASC')])->get();
        $product = Product::findorFail($id);
        $productImage = Product::findorFail($id)->images;
        return view('frontend.product.product_details', compact('product', 'productImage', 'categories'));
    }

    public function tagWiseProducts($tag)
    {
        $products = Product::where('status', 1)->where('product_tags', $tag)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::select('category_name', 'id')->orderBy('category_name','ASC')->with(['subcategories.subsubcategories' => fn($q) => $q->orderBy('subsubcategory_name', 'ASC')])->get();
        
        return view('frontend.product.product_tags_search', compact('products', 'categories'));
    }

}
