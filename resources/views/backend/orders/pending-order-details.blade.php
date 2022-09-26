@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Order Details
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Pending Order Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Pending Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Shipping Details</strong></h4>
                    </div>
                    <table class="table">
                        <tbody class="user-dash-table">
                            <tr>
                                <th>Shipping Name : </th>
                                <th>{{$order->name}}</th>
                            </tr>

                            <tr>
                                <th>Shipping Phone : </th>
                                <th>{{$order->phone}}</th>
                            </tr>

                            <tr>
                                <th>Shipping Email : </th>
                                <th>{{$order->email}}</th>
                            </tr>

                            <tr>
                                <th>Division : </th>
                                <th>{{$order->division->division_name}}</th>
                            </tr>

                            <tr>
                                <th>District : </th>
                                <th>{{$order->district->district_name}}</th>
                            </tr>

                            <tr>
                                <th>State : </th>
                                <th>{{$order->state->state_name}}</th>
                            </tr>

                            <tr>
                                <th>Post Code : </th>
                                <th>{{$order->post_code}}</th>
                            </tr>

                            <tr>
                                <th>Order Date : </th>
                                <th>{{$order->order_date}}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice No : {{$order->invoice_no}}</span></h4>
                    </div>
                    <table class="table">
                        <tbody class="user-dash-table">
                            <tr>
                                <th>Name : </th>
                                <th>{{$order->user->name}}</th>
                            </tr>

                            <tr>
                                <th>Phone : </th>
                                <th>{{$order->user->phone}}</th>
                            </tr>

                            <tr>
                                <th>Payment Type : </th>
                                <th>{{$order->payment_method}}</th>
                            </tr>

                            <tr>
                                <th>Tarnx Id : </th>
                                <th>{{$order->transaction_id}}</th>
                            </tr>

                            <tr>
                                <th>Invoice : </th>
                                <th class="text-danger">{{$order->invoice_no}}</th>
                            </tr>

                            <tr>
                                <th>Totale : </th>
                                <th>${{$order->amount}}</th>
                            </tr>

                            <tr>
                                <th>Order : </th>
                                <td>
                                    @if($order->status == 'pending')
                                    <span class="badge badge-pill badge-warning" style="background:#7733ff;">Pending</span>
                                    @elseif($order->status == 'confirmed')
                                    <span class="badge badge-pill badge-warning" style="background:#668cff;">Confirmed</span>
                                    @elseif($order->status == 'proccessing')
                                    <span class="badge badge-pill badge-warning" style="background:#66d9ff;">Proccessing</span>
                                    @elseif($order->status == 'picked')
                                    <span class="badge badge-pill badge-warning" style="background:#ff751a;">Picked</span>
                                    @elseif($order->status == 'shipped')
                                    <span class="badge badge-pill badge-warning" style="background:#729b1f;">Shipped</span>
                                    @elseif($order->status == 'delivered')
                                    <span class="badge badge-pill badge-warning" style="background:#237408;">Delivered</span>
                                    @elseif($order->status == 'cancel')
                                    <span class="badge badge-pill badge-warning" style="background:#ff0040;">Cancel</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th></th>
                                <th>
                                    @if($order->status == 'pending')
                                    <a href="{{ route('pending.confirm',$order->id)}}" id="confirm" class="btn btn-block btn-success">Confirm Order</a>

                                    @elseif($order->status == 'confirmed')
                                    <a href="{{ route('confirm.proccessing',$order->id)}}" id="proccessing" class="btn btn-block btn-success">Proccessing Order</a>

                                    @elseif($order->status == 'proccessing')
                                    <a href="{{ route('proccessing.picked',$order->id)}}" id="picked" class="btn btn-block btn-success">Picked Order</a>

                                    @elseif($order->status == 'picked')
                                    <a href="{{ route('picked.shipped',$order->id)}}" id="shipped" class="btn btn-block btn-success">Shipped Order</a>

                                    @elseif($order->status == 'shipped')
                                    <a href="{{ route('shipped.delivered',$order->id)}}" id="delivered" class="btn btn-block btn-success">Delivered Order</a>

                                    @endif
                                </th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Product Details</strong></h4>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr class="user-dash-table">
                                <!--  style="background:#E2E2E2;"  -->
                                <td class="col-md-1">
                                    <label for="">Image</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Product Name</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Product Code</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Color</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Size</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Quantity</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">price</label>
                                </td>
                            </tr>

                            @foreach($orderItem as $item)
                            <tr style=" text-align: center; ">
                                <td class="col-md-1">
                                    <label for=""><img class="any-img" src="{{asset($item->product->product_thumbnail)}}" height="80px" width="80px"></label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->product->product_name_en}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->product->product_code}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->color}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$item->size}}</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">{{$item->qty}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">${{$item->price}} @if($item->qty > 1) ( ${{$item->price * $item->qty}} ) @endif</label>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection