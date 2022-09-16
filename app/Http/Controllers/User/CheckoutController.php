<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function GetDistrict($division_id)
    {
        $shipdistrict = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'asc')->get();

        return json_encode($shipdistrict);
    } // end GetDistrict

    public function GetState($district_id)
    {
        $shipstate = ShipState::where('district_id', $district_id)->orderBy('state_name', 'asc')->get();

        return json_encode($shipstate);
    } // end GetState

    public function CheckoutStore(Request $request)
    {
        // dd($request->all());

        
        $cartTotal = Cart::total();

        $data = array();

        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;

        if($request->payment_method == 'stripe'){
            return view('frontend.payment.stripe',compact('data','cartTotal'));
            // return view('frontend.payment.stripe',compact('data','carts','cartQuantity','cartTotal'));
        }
        else if($request->payment_method == 'cart'){
            return view('frontend.payment.cart',compact('data','cartTotal'));
        }
        else if($request->payment_method == 'cash'){
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }

    } // end CheckoutStore
}
