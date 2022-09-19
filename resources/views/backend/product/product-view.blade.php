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
                        <h3 class="box-title">Product List <span class="badge badge-pill badge-info">{{count($product)}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>product Image</th>
                                        <th>product En</th>
                                        <th>product Price</th>
                                        <th>Discount</th>
                                        <th>product Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $item)
                                    <tr>
                                        <!-- <td><span><i class="fa-solid fa-id-card"></i></span></td> -->
                                        <td class="d-flex justify-content-center"><img class="img rounded-4 center" src="{{asset($item->product_thumbnail)}}" alt="" style="width: 4rem !important;height: 3.5rem !important;"></td>
                                        <td style="width: 33%;">{{$item->product_name_en}}</td>
                                        <td>{{$item->selling_price}}</td>
                                        <td>
                                            @if($item->discount_price == NULL)
                                            <span class="badge badge-pill badge-warning">No Discount</span>
                                            @else
                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-dark">{{round($discount)}} %</span>
                                            @endif
                                        </td>
                                        <td>{{$item->product_quantity}}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('product-details',$item->id)}}" title="View Product Details" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('product-edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('product-delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                            @if($item->status == 1)
                                            <a href="{{ route('product-inactive',$item->id)}}" title="Inactive Now" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('product-active',$item->id)}}" title="Active Now" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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