@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Blog Category
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
                        <h3 class="box-title">Update BlogCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('blog.category.update',$blogcategory->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$blogcategory->id}}" name="id">

                                <div class="form-group">
                                    <h5>BlogCategory Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$blogcategory->blog_category_name_en}}" name="blog_category_name_en" class="form-control">
                                        @error('blog_category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>BlogCategory Name Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$blogcategory->blog_category_name_ar}}" name="blog_category_name_ar" class="form-control">
                                        @error('blog_category_name_ar')
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