@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- ============================================== User Sidebar ============================================== -->

            @include('frontend.common.user-sidebar')

            <!-- ============================================== User Sidebar: END ============================================== -->


            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4>
                    </div>
                    <hr>
                    <div class="card-body">
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
            </div>
            <!-- end First col-md-5 -->

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details</h4>
                        <span class="text-danger">Invoice No : {{$order->invoice_no}}</span>
                    </div>
                    <hr>
                    <div class="card-body" > <!-- style="background:#E9EBEC;" -->
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
                                <td><span class="badge badge-pill badge-warning" style="background:#418D89;">{{$order->status}}</span></td>
                            </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <!-- end Secound col-md-5 -->

            <div class="row">
            <div class="col-md-12 user-dash" style=" padding: 3px; ">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="user-dash-table"> <!--  style="background:#E2E2E2;"  -->
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