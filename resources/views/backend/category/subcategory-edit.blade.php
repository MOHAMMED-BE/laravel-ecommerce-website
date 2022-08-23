@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit category -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('subcategory.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$subcategory->id}}" name="id">

                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select Your Category</option>
                                            @foreach($category as $item)
                                            <option value="{{$item->id}}" {{$item->id == $subcategory->category_id ? 'selected':''}} ">{{$item->category_name_en}}</option>
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
                                        <input type="text" value="{{$subcategory->subcategory_name_en}}" name="subcategory_name_en" class="form-control">
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$subcategory->subcategory_name_ar}}" name="subcategory_name_ar" class="form-control">
                                        @error('subcategory_name_ar')
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