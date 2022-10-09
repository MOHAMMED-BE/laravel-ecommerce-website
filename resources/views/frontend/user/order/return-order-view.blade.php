@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Return Orders
@endsection

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- ============================================== User Sidebar ============================================== -->

            @include('frontend.common.user-sidebar')

            <!-- ============================================== User Sidebar: END ============================================== -->

            <div class="col-md-2"></div>

            <div class="col-md-8 user-dash" style=" padding: 3px; ">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="user-dash-table">
                                <!--  style="background:#E2E2E2;"  -->
                                <td class="col-md-1">
                                    <label for="">Date</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Total</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Payment</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Invoice</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Return Reason</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">Order</label>
                                </td>
                            </tr>

                            @foreach($orders as $order)
                            <tr>
                                <td class="col-md-1">
                                    <label for="">{{$order->order_date}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->amount}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->payment_method}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->invoice_no}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">{{$order->return_reason}}</label>
                                </td>
                                <td class="col-md-2">
                                    <label for="">
                                        @if($order->return_order == 0)
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                        @elseif($order->return_order == 1)
                                        <span class="badge badge-pill badge-warning" style="background: #7733ff;"> Pedding </span>
                                        <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>

                                        @elseif($order->return_order == 2)
                                        <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                        @endif
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    @endsection