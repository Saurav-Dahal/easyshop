<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
            $file->move(public_path('frontend/assets/uploads/profile_images'), $filename);
            $updateUser->profile_pic = $filename;
        }
            $updateUser->save();
            $notification = [
                'message' => 'User Updated Successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
    }

}