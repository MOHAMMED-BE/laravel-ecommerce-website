<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function CouponView()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('backend.coupon.coupon-view',compact('coupons'));
    } // end couponView

    function CouponStore(Request $request)
    {
        $request->validate(
            [
                'coupon_name' => 'required',
                'coupon_discount' => 'required',
                'coupon_validity' => 'required',
            ],
            [
                'coupon_name.required' => 'Input coupon Name ',
                'coupon_discount.required' => 'Input coupon discount',
                'coupon_validity.required' => 'Add coupon validity',
            ]
        );

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end couponStore

    public function CouponEdit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.coupon-edit', compact('coupon'));
    } // end couponEdite

    function CouponUpdate(Request $request)
    {
        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('menage-coupon')->with($notification);
    } // end couponUpdate

    public function CouponDelete($id)
    {
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end couponDelete

    public function InactiveCoupon($id)
    {
        Coupon::findOrFail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Coupon Inactivated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end InactiveCoupon

    public function ActiveCoupon($id)
    {
        Coupon::findOrFail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Coupon Activated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end ActiveCoupon
}
