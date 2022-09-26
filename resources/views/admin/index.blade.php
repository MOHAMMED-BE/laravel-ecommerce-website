@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Dashboard
@endsection


@php

$this_day = Carbon\Carbon::now()->format('d F Y');
$today = App\Models\Order::where('order_date',$this_day)->sum('amount');

$yesterday = Carbon\Carbon::yesterday();
$day_before = App\Models\Order::where('order_date',$yesterday)->sum('amount');

$this_year = Carbon\Carbon::now()->format('Y');
$date = Carbon\Carbon::now();

$prev_month = $date->subMonth()->format('F');
$last_month = App\Models\Order::where('order_month',$prev_month)->where('order_year',$this_year)->sum('amount');


$this_month = Carbon\Carbon::now()->format('F');
$month = App\Models\Order::where('order_month',$this_month)->where('order_year',$this_year)->sum('amount');


$prev_year = $date->subYear()->format('Y');
$last_year = App\Models\Order::where('order_year',$prev_year)->sum('amount');

$year = App\Models\Order::where('order_year',$this_year)->sum('amount');


$old_pending = App\Models\Order::where('order_month',$prev_month)->where('status','pending')->get();

$new_pending = App\Models\Order::where('order_month',$this_month)->where('status','pending')->get();

$order_item = App\Models\OrderItem::with('product','order')->get();

@endphp

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60 justify-content-center d-flex align-items-center">
                            <i class="text-primary mr-0 font-size-24 fa-solid fa-magnifying-glass-chart" style=" transform: scale(1.4); "></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$today}}
                                @if($day_before < $today) <small class="text-success"><i class="fa fa-caret-up"></i> </small>
                                    <small class="text-success">USD</small>
                                    @else
                                    <small class="text-danger"><i class="fa fa-caret-down"></i> </small>
                                    <small class="text-danger">USD</small>
                            </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60 justify-content-center d-flex align-items-center">
                            <i class="text-warning mr-0 font-size-24 fa-solid fa-magnifying-glass-chart" style=" transform: scale(1.4); "></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$month}}
                                @if($last_month < $month) <small class="text-success"><i class="fa fa-caret-up"></i> </small>
                                    <small class="text-success">USD</small>
                                    @else
                                    <small class="text-danger"><i class="fa fa-caret-down"></i> </small>
                                    <small class="text-danger">USD</small>
                            </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60 justify-content-center d-flex align-items-center">
                            <i class="text-info mr-0 font-size-24 fa-solid fa-magnifying-glass-chart" style=" transform: scale(1.4); "></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$year}}
                                @if($last_year < $year) <small class="text-success"><i class="fa fa-caret-up"></i> </small>
                                    <small class="text-success">USD</small>
                                    @else
                                    <small class="text-danger"><i class="fa fa-caret-down"></i> </small>
                                    <small class="text-danger">USD</small>
                            </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60 justify-content-center d-flex align-items-center">
                            <i class="text-danger mr-0 font-size-24 fa-solid fa-cart-plus"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{count($new_pending)}}
                                @if(count($old_pending) < count($new_pending)) <small class="text-success"><i class="fa fa-caret-up"></i> +{{count($new_pending) - count($old_pending)}}</small>
                                    @else
                                    <small class="text-danger"><i class="fa fa-caret-down"></i> -{{count($old_pending) - count($new_pending)}}</small>
                            </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Recents Orders
                            <small class="subtitle">More than {{count($new_pending)}}+ new orders</small>
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Image</span></th>
                                        <th style="min-width: 250px"><span class="text-white">Date</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Amount</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Payment</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">Status</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">Action</span></th>
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_item as $order)
                                    @if($order->order->status == 'pending')
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50 ">
                                                        <img class="img any-img" src="{{asset($order->product->product_thumbnail)}}" alt="" style="width: 7rem !important;height: 3.5rem !important;">
                                                    </div>
                                                </div>

                                                <div>
                                                    <a href="{{ route('pending.order.details',$order->order->id)}}" class="text-white font-weight-600 hover-success mb-1 font-size-16">{{$order->product->product_name_en}}</a>
                                                    <span class="text-fade d-block">

                                                        @if($order->color != NULL && $order->size != NULL)
                                                        Quantity : {{$order->qty}},
                                                        Color : {{$order->color}},
                                                        Size : {{$order->size}}

                                                        @elseif($order->color != NULL && $order->size == NULL)
                                                        Quantity : {{$order->qty}},
                                                        Color : {{$order->color}}

                                                        @elseif($order->color == NULL && $order->size != NULL)
                                                        Quantity : {{$order->qty}},
                                                        Size : {{$order->size}}

                                                        @else
                                                        Quantity : {{$order->qty}}

                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                {{$order->order->order_date}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$order->order->invoice_no}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                $ {{$order->price}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{$order->order->payment_method}}
                                            </span>
                                        </td>
                                        <td><span class="badge badge-pill badge-success" style="background:#7733ff;">{{$order->order->status}}</span></td>

                                        <td class="text-center">
                                            <a href="{{ route('pending.order.details',$order->order->id)}}" title="View Order Details" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @else
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection