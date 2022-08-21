@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Ar</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $item)
                                    <tr>
                                        <td>{{$item->brand_name_en}}</td>
                                        <td>{{$item->brand_name_ar}}</td>
                                        <td class="d-flex justify-content-center"><img class="img rounded-4 center" src="{{asset($item->brand_image)}}" alt="" style="width: 4rem !important;height: 3.5rem !important;"></td>
                                        <td>
                                            <a href="{{ route('brand.edit',$item->id)}}" class="w-70 btn btn-info">Edit</a>
                                            <a href="{{ route('brand.delete',$item->id)}}" class="w-70 btn btn-danger">Delete</a>
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

            <!-- Add brand -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Brnad Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="brand_name_en" class="form-control">
                                        @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brnad Name Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="brand_name_ar" class="form-control">
                                        @error('brand_name_ar')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brnad Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" value="" name="brand_image" class="form-control">
                                        @error('brand_image')
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