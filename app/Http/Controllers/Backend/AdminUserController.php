<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminUserController extends Controller
{
    public function AllAdminRole()
    {
        $adminuser = Admin::where('type',2)->latest()->get();

        return view('backend.role.all-admin-role',compact('adminuser'));
    } // end AllAdminRole

    public function AddAdminRole()
    {
        return view('backend.role.create-admin-role');
    } // end AddAdminRole

    public function StoreAdminUser(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile_photo_path' => 'required',
        ],
        [
            'name.required' => 'Input Admin User Name English',
            'phone.required' => 'Input Admin User Phone Arabic',
            'email.required' => 'Input Admin User Email Arabic',
            'password.required' => 'Input Admin User Password Arabic',
            'profile_photo_path.required' => 'Add Admin User Image',
        ]);

        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/admin-images/' . $name_gen);
        $save_url = 'upload/admin-images/' . $name_gen;


        Admin::insert([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' =>  Hash::make($request->password),
            'phone' =>  $request->phone,
            'brand' =>  $request->brand,
            'category' =>  $request->category,
            'product' =>  $request->product,
            'slider' =>  $request->slider,
            'coupon' =>  $request->coupon,
            'shipping' =>  $request->shipping,
            'setting' =>  $request->setting,
            'returnorder' =>  $request->returnorder,
            'review' =>  $request->review,
            'orders' =>  $request->orders,
            'reports' =>  $request->reports,
            'allusers' =>  $request->allusers,
            'adminuserrole' =>  $request->adminuserrole,
            'type' =>  2,
            'profile_photo_path' =>  $save_url,
            'created_at' =>  Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Admin User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);
    } // end StoreAdminUser

    public function EditAdminUser($id)
    {
        $adminuser = Admin::findOrFail($id);

        return view('backend.role.edit-admin-role',compact('adminuser'));

    } // end EditAdminUser


    public function UpdateAdminUser(Request $request)
    {
        $adminuser_id = $request->id;

        Admin::findOrFail($adminuser_id)->update([
            'brand' =>  $request->brand,
            'category' =>  $request->category,
            'product' =>  $request->product,
            'slider' =>  $request->slider,
            'coupon' =>  $request->coupon,
            'shipping' =>  $request->shipping,
            'setting' =>  $request->setting,
            'returnorder' =>  $request->returnorder,
            'review' =>  $request->review,
            'orders' =>  $request->orders,
            'reports' =>  $request->reports,
            'allusers' =>  $request->allusers,
            'adminuserrole' =>  $request->adminuserrole,
            'type' =>  2,
            'updated_at' =>  Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin.user')->with($notification);

    } // end UpdateAdminUser


    public function DeleteAdminUser($id)
    {
        $adminuser = Admin::findOrFail($id);
        unlink($adminuser->profile_photo_path);
        Admin::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end DeleteAdminUser


}
