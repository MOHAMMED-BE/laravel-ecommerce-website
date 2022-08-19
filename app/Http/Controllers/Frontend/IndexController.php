<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user-profile',compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $storeData = User::find(Auth::user()->id);
        $storeData->name = $request->name;
        $storeData->email = $request->email;
        $storeData->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user-images/' . $storeData->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user-images'), $filename);
            $storeData['profile_photo_path'] = $filename;
        }

        $storeData->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    } // end UserProfileStore

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user-change-password',compact('user'));
    } // UserChangePassword

    public function UserUpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed',
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'User Password Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('user.logout')->with($notification);;
        }
        else{
            return redirect()->back();
        }
    } // UserUpdateChangePassword

}


