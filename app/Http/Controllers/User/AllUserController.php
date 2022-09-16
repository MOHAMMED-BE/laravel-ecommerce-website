<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class AllUserController extends Controller
{
    public function MyOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();

        return view('frontend.user.order.order-view',compact('orders'));

    } // end MyOrders

    public function OrdersDetails($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        return view('frontend.user.order.order-details',compact('order','orderItem'));
        
    } // end OrdersDetails
}
