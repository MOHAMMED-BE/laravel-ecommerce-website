<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest()
    {
        $orders = Order::where('return_order',1)->orderBy('id','desc')->get();

        return view('backend.return-order.return-request',compact('orders'));
    } // end ReturnRequest

    public function ReturnRequestApprove($order_id)
    {
        Order::where('id',$order_id)->update([
            'return_order' => 2,
        ]);

        $notification = array(
            'message' => 'slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('return.request')->with($notification);

    } // end ReturnRequestApprove

    public function ReturnAllRequest()
    {
        $orders = Order::where('return_order',2)->orderBy('id','desc')->get();

        return view('backend.return-order.all-return-request',compact('orders'));
    } // end ReturnAllRequest

}
