@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Return Orders List
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Return Orders List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Return Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->order_date}}</td>
                                        <td>{{$order->invoice_no}}</td>
                                        <td>${{$order->amount}}</td>
                                        <td>{{$order->payment_method}}</td>
                                        <td>
                                        @if($order->return_order == 0)
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                        @elseif($order->return_order == 1)
                                        <span class="badge badge-pill badge-warning" style="background: #7733ff;"> Pedding </span>
                                        @elseif($order->return_order == 2)
                                        <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                        @endif    
                                        </td>
                                        <td>
                                        <span class="badge badge-pill badge-warning" style="background: #008000;">Return Success </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection