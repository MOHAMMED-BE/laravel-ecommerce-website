<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders = Order::where('status','Pending')->orderBy('id','desc')->get();

        return view('backend.orders.pending-order',compact('orders'));


    } // end PendingOrders

    public function PendingOrderDetails($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        return view('backend.orders.pending-order-details',compact('order','orderItem'));

    } // end PendingOrderDetails


    public function ConfirmedOrders()
    {
        $orders = Order::where('status','confirmed')->orderBy('id','desc')->get();

        return view('backend.orders.confirmed-order',compact('orders'));


    } // end ConfirmedOrders


    public function ProccessingOrders()
    {
        $orders = Order::where('status','proccessing')->orderBy('id','desc')->get();

        return view('backend.orders.proccessing-order',compact('orders'));


    } // end ProccessingOrders


    public function PickedOrders()
    {
        $orders = Order::where('status','picked')->orderBy('id','desc')->get();

        return view('backend.orders.picked-order',compact('orders'));


    } // end PickedOrders


    public function ShippedOrders()
    {
        $orders = Order::where('status','shipped')->orderBy('id','desc')->get();

        return view('backend.orders.shipped-order',compact('orders'));


    } // end ShippedOrders


    public function DeliveredOrders()
    {
        $orders = Order::where('status','delivered')->orderBy('id','desc')->get();

        return view('backend.orders.delivered-order',compact('orders'));


    } // end DeliveredOrders


    public function CancelOrders()
    {
        $orders = Order::where('status','cancel')->orderBy('id','desc')->get();

        return view('backend.orders.cancel-order',compact('orders'));


    } // end CancelOrders


    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'confirmed',
            'confirmed_date' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);
    } // end PendingToConfirm


    public function ConfirmToProccessing($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'proccessing',
            'proccessing_date' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Order proccessing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('proccessing-orders')->with($notification);
    } // end ConfirmToProccessing


    public function ProccessingToPicked($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'picked',
            'picked_date' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Order picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);
    } // end ProccessingToPicked


    public function PickedToShipped($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'shipped',
            'shipped_date' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Order shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);
    } // end PickedToShipped


    public function ShippedToDelivered($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'delivered',
            'delivered_date' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Order delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('delivered-orders')->with($notification);
    } // end ShippedToDelivered


    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        $pdf = PDF::loadView('backend.orders.order-invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download($order->invoice_no.'.pdf');

    } // end  InvoiceDownload
}
