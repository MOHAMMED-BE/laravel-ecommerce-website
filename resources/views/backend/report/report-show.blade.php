@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Reports Result
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders List</h3>
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
                                        <th>Action</th>
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
                                        <td class="text-center">
                                            <a href="{{ route('pending.order.details',$order->id)}}" title="View Order Details" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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