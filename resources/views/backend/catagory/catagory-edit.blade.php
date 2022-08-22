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
                            <form method="post" action="{{ route('catagory.update',$catagory->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$catagory->id}}" name="id">

                                <div class="form-group">
                                    <h5>catagory Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$catagory->catagory_icon}}" name="catagory_icon" class="form-control">
                                        @error('catagory_icon')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>catagory Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$catagory->catagory_name_en}}" name="catagory_name_en" class="form-control">
                                        @error('catagory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>catagory Name Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$catagory->catagory_name_ar}}" name="catagory_name_ar" class="form-control">
                                        @error('catagory_name_ar')
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