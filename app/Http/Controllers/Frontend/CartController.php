<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShipDivision;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        if($product->product_quantity > 0){
            if(Session::has('coupon')){
                session()->forget('coupon');
            }
    
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
        }

        
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


    public function AddToWishList(Request $request, $product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if(!$exists){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at'=> Carbon::now() ,
                ]);
                return response()->json(['success'=>'Product Added Successfully On Your Wishlist']);
            }
            else
                return response()->json(['error'=>'This Product Has Already Added On Your Wishlist']);
        }
        else{
            
            return response()->json(['error'=>'You Must Be Login']);

        }

    }// end addToWishList

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount / 100))
            ]);

            return response()->json(array('validity'=>true,'success'=>'Coupon Applied Successfully'));

        }
        else{
            return response()->json(['error'=>'Invalid Coupon']);

        }
        
    } // end CouponApply

    public function CouponCalculation()
    {
        if(Session::has('coupon')){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }
        else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end CouponCalculation

    public function CouponRemove()
    {
        session()->forget('coupon');

        return response()->json(['success'=>'Coupon Removed Successfully']);

    } // end CouponRemove

    public function CheckoutCreate()
    {
        $division = ShipDivision::orderBy('division_name','asc')->get();

        if(Auth::check()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                $cartQuantity = Cart::count();
                $cartTotal = Cart::total();

                return view('frontend.checkout.checkout-view',compact('division','carts','cartQuantity','cartTotal'));
            }
            else{
                $notification = array(
                    'message' => 'Shopping At List One Product',
                    'alert-type' => 'warning'
                );
        
                return redirect()->to('/')->with($notification);
            }

        }
        else{
            

            $notification = array(
                'message' => 'You Must Be Login',
                'alert-type' => 'warning'
            );
    
            return redirect()->route('login')->with($notification);

        }
    } // end CheckoutCreate
    
}
