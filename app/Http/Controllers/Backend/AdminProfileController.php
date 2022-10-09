<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin-profile-view', compact('adminData'));
    } // end AdminProfile

    public function AdminProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.admin-profile-edit', compact('editData'));
    } // end AdminProfileEdit

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $storeData = Admin::find($id);
        $storeData->name = $request->name;
        $storeData->email = $request->email;
        $storeData->phone = $request->phone;

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
        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $admin = Admin::find(Auth::id());
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


    public function AllUsers()
    {
        $users = User::latest()->get();

        return view('backend.user.all-users',compact('users'));

    } // end AllUsers

    public function DeleteUser($id){

        $user = User::findOrFail($id);
        if($user->profile_photo_path != NULL){
            $user_img = $user->profile_photo_path;
            unlink("upload/user-images/".$user_img);
        }

        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.users')->with($notification);
    } // end DeleteUser
}
