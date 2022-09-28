@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Coupon List
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Coupon List <span class="badge badge-pill badge-info">{{count($coupons)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Coupon Name</th>
                                        <th>Coupon Discount</th>
                                        <th>Coupon Validity</th>
                                        <th>Coupon Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $item)
                                    <tr>
                                        <!-- <td><span><i class="fa-solid fa-id-card"></i></span></td> -->
                                        <td>{{$item->coupon_name}}</td>
                                        <td>{{$item->coupon_discount}} %</td>
                                        <td>
                                            {{Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y')}}
                                        </td>
                                        <td>
                                            @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d') && $item->status == 1)
                                            <span class="badge badge-pill badge-success">Valid</span>
                                            @elseif($item->coupon_validity < Carbon\Carbon::now()->format('Y-m-d') || $item->status == 0)
                                            <span class="badge badge-pill badge-danger">Invalid</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('coupon.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('coupon.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                            @if($item->status == 1)
                                            <a href="{{ route('coupon-inactive',$item->id)}}" title="Inactive Now" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('coupon-active',$item->id)}}" title="Active Now" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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

            <!-- Add coupon -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Coupon Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="coupon_name" class="form-control">
                                        @error('coupon_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Coupon Discount (%) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="coupon_discount" class="form-control">
                                        @error('coupon_discount')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Coupon Validity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" name="coupon_validity" class="form-control">
                                        @error('coupon_validity')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-info" value="Save" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection