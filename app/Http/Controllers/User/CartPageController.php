<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart()
    {
        return view('frontend.wishlist.mycart-view');
    } // end MyCart

    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => $cartTotal,
        ));

    } // end GetCartProduct

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        if(Session::has('coupon')){
            session()->forget('coupon');
            
            // $coupon_name = session()->get('coupon')['coupon_name'];
            // $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            // Session::put('coupon',[
            //     'coupon_name' => $coupon->coupon_name,
            //     'coupon_discount' => $coupon->coupon_discount,
            //     'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
            //     'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100))
            // ]);
        }
       return response()->json(['success'=>'Product Removed Successfully From Your Cart']);

    } // end RemoveCart

    public function cartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if(Session::has('coupon')){

            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100))
            ]);
        }

       return response()->json(['increment']);

    } // end cartIncrement

    public function cartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if(Session::has('coupon')){

            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100))
            ]);
        }

       return response()->json(['decrement']);
    } // end cartDecrement
}
