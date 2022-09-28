@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Slider
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit slider -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('slider-update',$slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$slider->id}}" name="id">
                                <input type="hidden" value="{{$slider->slider_img}}" name="old_image">

                                <div class="form-group">
                                    <h5>Slider Image</h5>
                                    <div class="controls">
                                        <input type="file" value="" name="slider_img" class="form-control">
                                        @error('slider_img')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Slider Title</h5>
                                    <div class="controls">
                                        <input type="text" value="{{$slider->title}}" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Slider Description</h5>
                                    <div class="controls">
                                        <input type="text" value="{{$slider->description}}" name="description" class="form-control">
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