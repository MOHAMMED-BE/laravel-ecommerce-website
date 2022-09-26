<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function WishlistView()
    {
        return view('frontend.wishlist.wishlist-view');
    } // end ViewWishlist

    public function GetWishlistProduct()
    {
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        return response()->json($wishlist);
    } // end GetWishlistProduct

    public function wishlistRemove($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
       return response()->json(['success'=>'Product Removed Successfully From Your Wishlist']);

    } // end RemoveMiniCart
}
