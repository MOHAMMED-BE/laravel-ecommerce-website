@extends('admin.admin_master')
@section('admin')

@php
$date = Carbon\Carbon::now()->format('d F Y');
$today = App\Models\Order::where('order_date',$date)->sum('amount');

$date = Carbon\Carbon::now()->format('F');
$month = App\Models\Order::where('order_month',$date)->sum('amount');

$date = Carbon\Carbon::now()->format('F');
$year = App\Models\Order::where('order_year',$date)->sum('amount');

$pending = App\Models\Order::where('status','pending')->get();

@endphp

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Today's Sale</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$today}} <small class="text-success"><i class="fa fa-caret-up"></i> USD</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$month}} <small class="text-success"><i class="fa fa-caret-up"></i> USD</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale</p>
                            <h3 class="text-white mb-0 font-weight-500">${{$year}} <small class="text-danger"><i class="fa fa-caret-down"></i> USD</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{count($pending)}} <small class="text-danger"><i class="fa fa-caret-up"></i>Order</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            New Arrivals
                            <small class="subtitle">More than 400+ new members</small>
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
                                    @foreach($pending as $order)
                                    <tr>
                                        <td class="pl-0 py-8">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-20">
                                                    <div class="bg-img h-50 w-50 ">
                                                        <!-- style="background-image: url(/ecommerce-website/public/backend//images/gallery/creative/img-2.jpg)" -->
                                                        <img class="img rounded-4" src="{{asset('backend/images/gallery/creative/img-1.jpg')}}" alt="" style="width: 7rem !important;height: 3.5rem !important;">
                                                    </div>
                                                </div>

                                                <div>
                                                    <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Vivamus consectetur</a>
                                                    <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                {{$order->order_date}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                            {{$order->invoice_no}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                            $ {{$order->amount}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-white font-weight-600 d-block font-size-16">
                                            {{$order->payment_method}}
                                            </span>
                                        </td>
                                        <td><span class="badge badge-pill badge-success" style="background:#7733ff;">{{$order->status}}</span></td>
                                        
                                        <td class="text-right">
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
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