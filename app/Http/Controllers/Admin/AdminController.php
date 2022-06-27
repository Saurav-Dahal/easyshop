<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login.login_master');
    }
    public function loginValidate(Request $request)
    {
       $check = $request->all();
       if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'], 'status' => '1']))
       {  
        //   $request->session()->regenerate(); 
          return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully.');
       }
       else{
          return redirect()->back()->with('error', 'Invalid credentials.');
       }
    }
    public function displayDashboard()
    {
        $loggedinUser = Auth::guard('admin')->user();
        return view('admin.dashboard.dashboard_content', compact('loggedinUser'));
    }

    public function data()
    {
        return 123;
    }


    public function file()
    {
        dd('123');
        return view('admin.profile.profile_edit');
    }

    // public function manageAdmins()
    // {   
    //     $admins = Admin::all();

    //     // $admins = Admin::select('id', 'name', 'email', 'status', 'created_at')->get();
    //     return view('admin.show_admin', compact('admins'));
    // }
    // public function authorizeSellers()
    // {
    //     return view('admin.show_seller');
    // }
    // public function showForm()
    // {
    //     return view('admin.add_admin');
    // }
    // public function addAdmin(Request $request)
    // {  
    //     $validatedData = $request->validate([
    //       'name' => 'required|max:255|unique:admins',
    //       'email' => 'required|max:255',
    //       'password' => 'required',
    //       'status'=> 'required'

    // ]);

    // //    dd($request->all());
    //     $admin = new Admin;
    //     $admin->name = $request->name;
    //     $admin->email = $request->email; 
    //     $admin->password = Hash::make($request->password);
    //     $admin->super_password = Hash::make($request->super_password);
    //     $admin->status = $request->status;
    //     $admin->save();
    //     return redirect()->back()->with('success', 'Admin created successfully.');
    // }
    // public function editAdmin($id)
    // {

    // }
    // public function updateAdmin(Request $request, $id)
    // {

    // }
    // public function deleteAdmin($id)
    // {

    // }
    public function logout()
    {
        Auth::guard('admin')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenarateToken();
        return redirect()->route('admin.login')->with('success', 'User logout successfully.');
    }
}
