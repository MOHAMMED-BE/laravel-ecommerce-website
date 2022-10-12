@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Category
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit category -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$category->id}}" name="id">

                                <div class="form-group">
                                    <h5>category Icon </h5>
                                    <div class="controls">
                                        <input type="text" value="{{$category->category_icon}}" name="category_icon" class="form-control">
                                        @error('category_icon')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>category Name English </h5>
                                    <div class="controls">
                                        <input type="text" value="{{$category->category_name_en}}" name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>category Name Arab </h5>
                                    <div class="controls">
                                        <input type="text" value="{{$category->category_name_ar}}" name="category_name_ar" class="form-control">
                                        @error('category_name_ar')
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

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection