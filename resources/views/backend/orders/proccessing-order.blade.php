@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Proccessing Orders List</h3>
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
                                        <td><span class="badge badge-pill badge-success" style="background:#66d9ff;">{{$order->status}}</span></td>
                                        <td class="text-center">
                                            <a href="{{ route('pending.order.details',$order->id)}}" title="View Order Details" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('invoice.download',$order->id)}}" target="_blank" title="download order invoice" class="btn btn-info"><i class="fa fa-download"></i></a>
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