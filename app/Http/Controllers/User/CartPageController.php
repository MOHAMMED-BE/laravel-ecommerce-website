<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
       return response()->json(['success'=>'Product Removed Successfully From Your Cart']);

    } // end RemoveCart

    public function cartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        if($row->qty >= 1)
        Cart::update($rowId, $row->qty + 1);
       return response()->json(['increment']);

    } // end cartIncrement

    public function cartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        if($row->qty > 1)
        Cart::update($rowId, $row->qty - 1);
       return response()->json(['decrement']);
    } // end cartDecrement
}
