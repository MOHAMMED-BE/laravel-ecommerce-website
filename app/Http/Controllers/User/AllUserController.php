<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

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

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        $pdf = PDF::loadView('frontend.user.order.order-invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($order->invoice_no.'.pdf');
        
    } // end  InvoiceDownload

    public function ReturnOrder($order_id,Request $request)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Submited Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    } // end ReturnOrder

    public function ReturnOrderList()
    {
        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','desc')->get();

        return view('frontend.user.order.return-order-view',compact('orders'));

    } // end ReturnOrderList

    public function CancelOrder()
    {
        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','desc')->get();

        return view('frontend.user.order.cancel-order-view',compact('orders'));

    } // end CancelOrders


    public function OrderTracking(Request $request)
    {
        $invoice_code = $request->invoice_code;

        $track = Order::where('invoice_no',$invoice_code)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$track->id)->first();

        if($track){
            
        return view('frontend.tracking.track-order',compact('track','orderItem'));
            
        }
        else{
            $notification = array(
                'message' => 'Invalid Tracking Code',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }

    } // end OrderTracking
}
