@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Tracking Order #{{$track->invoice_no}}
@endsection
<link rel="stylesheet" href="{{asset('frontend/assets/css/track.css')}}">

<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 text-center">
                    <!-- style=" width: 16rem !important; " -->
                    <b style=" color: #308bc5; ">Invoice Code</b> <br> <span style=" color: #576c78; ">{{$track->invoice_no}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <!-- style=" width: 16rem !important; " -->
                    <b style=" color: #308bc5; ">Order Date</b> <br> <span style=" color: #576c78; ">{{$track->order_date}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <!-- style=" width: 34rem !important; " -->
                    <b style=" color: #308bc5; ">Shipping By <span style=" color: #bb1c0c; ">{{$track->name}}</span></b> <br> <span style=" color: #576c78; ">{{$track->division->division_name}} , {{$track->district->district_name}} , {{$track->state->state_name}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <!-- style=" width: 15rem !important; " -->
                    <b style=" color: #308bc5; ">Phone Number</b> <br> <span style=" color: #576c78; ">{{$track->phone}}</span>
                </div>

                <div class="col-md-2 text-center">
                    <!-- style=" width: 18rem !important; " -->
                    <b style=" color: #308bc5; ">Payment Method</b> <br> <span style=" color: #576c78; ">{{$track->payment_method}}</span>
                </div>
                <div class="col-md-2 text-center">
                    <!-- style=" width: 15rem !important; " -->
                    <b style=" color: #308bc5; ">Order Price</b> <br> <span style=" color: #576c78; ">$ {{$track->amount}}</span>
                </div>
            </div>

            <div class="track">
                @if($track->status == 'pending')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                @elseif($track->status == 'confirmed')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                @elseif($track->status == 'proccessing')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                @elseif($track->status == 'picked')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                @elseif($track->status == 'shipped')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                @elseif($track->status == 'delivered')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Proccessing</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                @endif
            </div>
            <hr>
            <ul class="row">
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{asset($orderItem->product->product_thumbnail)}}" class="img-sm border any-img"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$orderItem->product->product_name_en}}</p>
                        </figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </article>
</div>

@endsection