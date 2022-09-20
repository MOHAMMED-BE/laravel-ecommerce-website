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
                        <h3 class="box-title">Blog Category List <span class="badge badge-pill badge-info">{{count($blogcategory)}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Blog Category En</th>
                                        <th>Blog Category Ar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogcategory as $item)
                                    <tr>
                                        <td>{{$item->blog_category_name_en}}</td>
                                        <td>{{$item->blog_category_name_ar}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('blog.category.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('blog.category.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

            <!-- Add category -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Blog Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('blogcategory.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="blog_category_name_en" class="form-control">
                                        @error('blog_category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Category Name Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="blog_category_name_ar" class="form-control">
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