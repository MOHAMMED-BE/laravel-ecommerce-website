<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $price = NULL;

        if($product->discount_price == NULL)
            $price = $product->selling_price;
        else
            $price = $product->discount_price;


        Cart::add([
        'id' => $id,
        'name' => $request->product_name ,
        'qty' => $request->quantity ,
        'price' => $price ,
        'weight' => 1 ,
        'options' => [
           'image' => $product->product_thumbnail,
           'color' => $request->color ,
           'size' => $request->size ,

        ],
       ]);

       return response()->json(['success'=>'Product Added Successfully TO Your Cart']);
        
    }// end AddToCart

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => $cartTotal,
        ));
    } // end AddMiniCart

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
       return response()->json(['success'=>'Product Removed Successfully From Your Cart']);

    } // end RemoveMiniCart
}
