@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Product Stock List
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Product Stock <span class="badge badge-pill badge-info">{{count($products)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product En</th>
                                        <th>Product Price</th>
                                        <th>Discount</th>
                                        <th>Product Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <!-- <td><span><i class="fa-solid fa-id-card"></i></span></td> -->
                                        <td class="d-flex justify-content-center"><img class="img rounded-4 center" src="{{asset($item->product_thumbnail)}}" alt="" style="width: 4rem !important;height: 3.5rem !important;"></td>
                                        <td style="width: 33%;">{{$item->product_name_en}}</td>
                                        <td>${{$item->selling_price}}</td>
                                        <td>
                                            @if($item->discount_price == NULL)
                                            <span class="badge badge-pill badge-warning">No Discount</span>
                                            @else
                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-dark" style="background: #fd4f4f;">{{round($discount)}} %</span>
                                            @endif
                                        </td>
                                        <td>{{$item->product_quantity}} Piece</td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
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