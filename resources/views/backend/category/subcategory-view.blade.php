@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit SubCategory list
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-info">{{count($subcategory)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>SubCategory En</th>
                                        <th>SubCategory Ar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategory as $item)
                                    <tr>
                                        <td>{{$item['getCategory']['category_name_en']}}</td>
                                        <td>{{$item->subcategory_name_en}}</td>
                                        <td>{{$item->subcategory_name_ar}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('subcategory.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('subcategory.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

            <!-- Add subcategory -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select  Category</option>
                                            @foreach($category as $item)
                                            <option value="{{$item->id}}">{{$item->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="subcategory_name_en" class="form-control">
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="subcategory_name_ar" class="form-control">
                                        @error('subcategory_name_ar')
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