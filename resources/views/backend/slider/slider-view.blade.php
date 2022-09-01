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
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Slider Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $item)
                                    <tr>
                                        <td class="d-flex justify-content-center"><img class="img rounded-4 center" src="{{asset($item->slider_img)}}" alt="" style="width: 4rem !important;height: 3.5rem !important;"></td>
                                        <td>
                                            @if($item->title == NULL)
                                            <span class="badge badge-pill badge-info">No Title</span>
                                            @else
                                            {{$item->title}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->description == NULL)
                                            <span class="badge badge-pill badge-info">No Description</span>
                                            @else
                                            {{$item->description}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td class="text-center p-0" style="width: 15%;">
                                            <a href="{{ route('slider-edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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

            <div class="col-4">

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

                                <div class="form-group">
                                    <h5>Slider Title </h5>
                                    <div class="controls">
                                        <input type="text" value="" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Slider Description </h5>
                                    <div class="controls">
                                        <input type="text" value="" name="description" class="form-control">
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