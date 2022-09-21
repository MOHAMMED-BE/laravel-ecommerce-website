@extends('frontend.main_master')
@section('content')
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
                            <tr class="user-dash-table"> <!--  style="background:#E2E2E2;"  -->
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
                                    <label for="">Order</label>
                                </td>
                                <td class="col-md-1">
                                    <label for="">Action</label>
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
                                    <label for="">
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
                                    </label>
                                </td>
                                <td class="col-md-2">
                                <a href="{{ url('user/order-details/'.$order->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                                <a href="{{ url('user/invoice-download/'.$order->id)}}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Invoice</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#profile-image').change(function(e) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#show-profile-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


    @endsection