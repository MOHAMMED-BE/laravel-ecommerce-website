@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit catagory -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add catagory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('subcatagory.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$subcatagory->id}}" name="id">

                                <div class="form-group">
                                    <h5>Catagory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="catagory_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select Your Catagory</option>
                                            @foreach($catagory as $item)
                                            <option value="{{$item->id}}" {{$item->id == $subcatagory->catagory_id ? 'selected':''}} ">{{$item->catagory_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('catagory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCatagory English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$subcatagory->subcatagory_name_en}}" name="subcatagory_name_en" class="form-control">
                                        @error('subcatagory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCatagory Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$subcatagory->subcatagory_name_ar}}" name="subcatagory_name_ar" class="form-control">
                                        @error('subcatagory_name_ar')
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