<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin-profile-view', compact('adminData'));
    } // end AdminProfile

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin-profile-edit', compact('editData'));
    } // end AdminProfileEdit

    public function AdminProfileStore(Request $request)
    {
        $storeData = Admin::find(1);
        $storeData->name = $request->name;
        $storeData->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin-images/' . $storeData->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin-images'), $filename);
            $storeData['profile_photo_path'] = $filename;
        }

        $storeData->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    } // end AdminProfileStore

    public function AdminChangePassword()
    {
        return view('admin.admin-change-password');
    } // end AdminChangePassword

    public function AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed',
        ]);

        $hashPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            $notification = array(
                'message' => 'Admin Password Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.logout')->with($notification);;
        }
        else{
            return redirect()->back();
        }

    } // end AdminUpdateChangePassword
}
