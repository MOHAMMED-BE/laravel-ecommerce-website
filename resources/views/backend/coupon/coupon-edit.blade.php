@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Coupon
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit coupon -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('coupon.update',$coupon->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$coupon->id}}" name="id">

                                <div class="form-group">
                                    <h5>coupon Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$coupon->coupon_name}}" name="coupon_name" class="form-control">
                                        @error('coupon_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>coupon Discount (%)<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$coupon->coupon_discount}}" name="coupon_discount" class="form-control">
                                        @error('coupon_discount')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>coupon Validity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" value="{{$coupon->coupon_validity}}" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" name="coupon_validity" class="form-control">
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