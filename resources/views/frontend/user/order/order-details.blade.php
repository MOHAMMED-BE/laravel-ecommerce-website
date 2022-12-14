@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Order Details
@endsection

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
                                    <th>Country : </th>
                                    <th>{{$order->division->division_name}}</th>
                                </tr>

                                <tr>
                                    <th>Region : </th>
                                    <th>{{$order->district->district_name}}</th>
                                </tr>

                                <tr>
                                    <th>City : </th>
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
                    </div>
                    <hr>
                    <div class="card-body">
                        <table class="table">
                            <tbody class="user-dash-table">
                                <tr>
                                    <th>Payment Method : </th>
                                    <th>{{$order->payment_method}}</th>
                                </tr>

                                <tr>
                                    <th>Invoice : </th>
                                    <th class="text-danger">{{$order->invoice_no}}</th>
                                </tr>

                                <tr>
                                    <th>Totale : </th>
                                    <th>${{$order->amount}}</th>
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
                                <tr class="user-dash-table">
                                    <!--  style="background:#E2E2E2;"  -->
                                    <td class="col-md-1">
                                        <label for="">Image</label>
                                    </td>
                                    <td class="col-md-4">
                                        <label for="">Product Name</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">Product Code</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Color</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Size</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">Quantity</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">price</label>
                                    </td>

                                    @foreach($orderItem as $item)
                                    @if($item->product->digital_file !== NULL)
                                    <td class="col-md-1">
                                        <label for="">Download File</label>
                                    </td>
                                    @endif
                                    @endforeach

                                </tr>

                                @foreach($orderItem as $item)
                                <tr style=" text-align: center; ">
                                    <td class="col-md-1">
                                        <label for=""><img class="any-img" src="{{asset($item->product->product_thumbnail)}}" height="80px" width="80px"></label>
                                    </td>
                                    <td class="col-md-4">
                                        <label for="" style=" text-align: start; ">{{$item->product->product_name_en}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">{{$item->product->product_code}}</label>
                                    </td>

                                    <td class="col-md-1">
                                        @if($item->color != NULL)
                                        <label for="">{{$item->color}}</label>
                                        @else
                                        ---
                                        @endif
                                    </td>
                                    <td class="col-md-1">
                                        @if($item->size != NULL)
                                        <label for="">{{$item->size}}</label>
                                        @else
                                        ---
                                        @endif
                                    </td>
                                    <td class="col-md-1">
                                        <label for="">{{$item->qty}}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">${{$item->price}} @if($item->qty > 1) ( ${{$item->price * $item->qty}} ) @endif</label>
                                    </td>
                                    @php
                                    $file = App\Models\Product::where('id',$item->product_id)->first();

                                    @endphp


                                    @if($order->status == 'confirmed' && $item->product->digital_file !== NULL)
                                    <td class="col-md-1">
                                        <a target="_blank" href="{{asset('upload/files/'.$file->digital_file)}}">
                                            <span class="badge badge-pill badge-success" style="background: #FF0000;">Download</span>

                                        </a>
                                    </td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->

            @if($order->status !== "delivered")
            @else
            @php
            $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
            @endphp

            @if($order)
            <hr>
            <form method="post" action="{{ route('return.order',$order->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Order Return Reason</label>
                    <textarea name="return_reason" id="" cols="30" rows="5" class="form-control" placeholder="write your reason here" required></textarea>
                </div>

                <button type="submit" class="btn btn-warning">Submit</button>
            </form>
            @else
            <span class="badge badge-pill badge-warning" style="background:red;">You Have Send Return Request For This Order</span>

            <br>
            <br>
            @endif
            @endif


        </div>
    </div>



    @endsection