<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin-profile-view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin-profile-edit', compact('editData'));
    }

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
    }
}
