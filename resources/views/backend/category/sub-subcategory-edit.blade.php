@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Sub-SubCategory
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
                        <h3 class="box-title">Update Sub-SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('subsubcategory.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{$subsubcategory->id}}" name="id">

                                <div class="form-group">
                                    <h5>Category Select </h5>
                                    <div class="controls">
                                        <select name="category_id" id="categoryselect" class="form-control" aria-invalid="false">
                                        <option value="" selected="" disabled>Select  Category</option>
                                            @foreach($category as $item)
                                            <option value="{{$item->id}}" {{$item->id == $subsubcategory->category_id ? 'selected' : ''}} >{{$item->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Sub Category Select </h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="subcategoryselect" class="form-control" aria-invalid="false">
                                        <option value="" selected="" disabled>Select SubCategory</option>
                                        
                                        @foreach($subcategory as $subitem)

                                        <option value="{{$subitem->id}}" {{$subitem->id == $subsubcategory->subcategory_id ? 'selected' : ''}} >{{$subitem->subcategory_name_en}}</option>
                                        @endforeach

                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Sub-SubCategory English </h5>
                                    <div class="controls">
                                        <input type="text" value="{{$subsubcategory->subsubcategory_name_en}}" name="subsubcategory_name_en" class="form-control">
                                        @error('subsubcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Sub-SubCategory Arab </h5>
                                    <div class="controls">
                                        <input type="text" value="{{$subsubcategory->subsubcategory_name_ar}}" name="subsubcategory_name_ar" class="form-control">
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