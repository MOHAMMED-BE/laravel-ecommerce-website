@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Slider List
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-6">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider List <span class="badge badge-pill badge-info">{{count($sliders)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Slider Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $item)
                                    <tr>
                                        <td class="d-flex justify-content-center"><img class="img rounded-3 center" src="{{asset($item->slider_img)}}" alt="" style="width: 7rem !important;height: 4rem !important;"></td>

                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>

                                        <td class="text-center p-0" style="width: 20%;">
                                            <a href="{{ route('menage-slider',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('slider-delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                            @if($item->status == 1)
                                            <a href="{{ route('slider-inactive',$item->id)}}" title="Inactive Now" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('slider-active',$item->id)}}" title="Active Now" class="btn btn-success"><i class="fa fa-arrow-up"></i></a>
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

            <!-- Add Slider -->

            <div class="col-3">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider-store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" value="" name="slider_img" class="form-control">
                                        @error('slider_img')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-warning backend-btn" value="Save" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-3">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider-update',$item->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$item->id}}" name="id">
                                <input type="hidden" value="{{$item->slider_img}}" name="old_image">

                                <div class="form-group">
                                    <h5>Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" value="" name="edit_slider_img" class="form-control" required>
                                        @error('slider_img')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-warning backend-btn" value="Update" />
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