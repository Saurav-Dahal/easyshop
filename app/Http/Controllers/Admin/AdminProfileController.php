<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 

class AdminProfileController extends Controller
{

    public function displayProfile()
    {
        $loggedinUser = Auth::guard('admin')->user();
        return view('admin.profile.profile_master', compact('loggedinUser'));
    }

    public function editProfile()
    {   $loggedinUser = Auth::guard('admin')->user();
        return view('admin.profile.profile_edit', compact('loggedinUser'));
    }

    public function updateProfile(Request $request, $id)
    {
        $updateProfile = Admin::findorFail($id);
        $updateProfile->name = $request->name;
        $updateProfile->email = $request->email;

        if($request->file('profile_pic'))
        {
            $validatedData = $request->validate([
                'profile_pic'=>'mimes:jpg,bmp,png'
            ]);

            $file = $request->file('profile_pic');
            @unlink(public_path('backend/uploads/profile_images/'.$updateProfile->profile_pic));
            $filename = date('YmdHi').'-'.$file->getClientOriginalName();
            $file->move(public_path('backend/uploads/profile_images'), $filename);
            $updateProfile->profile_pic = $filename;
        }
            $updateProfile->save();
            $notification = [
                'message' => 'Admin Profile Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
    }

    public function changeProfilePassword()
    {
        $loggedinUser = Auth::guard('admin')->user();
        return view('admin.profile.password_change', compact('loggedinUser'));
    }

    public function updateProfilePassword(Request $request)
    {   
        // dd('123');
        $validatedData = $request->validate([
            'old_password' => 'required|min:6|max:20',
            'password' => 'confirmed|required|min:6|max:20',
            'password_confirmation' => 'required|min:6|max:20'
        ],
        [
            'old_password.required' => 'The current password field is required.',
            'password.confirmed' => 'Password did not match' 
        ]);
        $hashedPassword = Auth::guard('admin')->user()->password;

        if(Hash::check($request->old_password, $hashedPassword))
        {
            $updatePassword = Auth::guard('admin')->user();
            $updatePassword->password = Hash::make($request->password);
            $updatePassword->save();
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('success', 'Your password have been changed. Please login again!');
        }else{
            
            return redirect()->back()->with('error', 'Current password doesnot match with the database.');
        }
    }

}
