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
                        <h3 class="box-title">SubCatagory List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Catagory</th>
                                        <th>SubCatagory En</th>
                                        <th>SubCatagory Ar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcatagory as $item)
                                    <tr>
                                        <td>{{$item->catagory_id}}</td>
                                        <td>{{$item->subcatagory_name_en}}</td>
                                        <td>{{$item->subcatagory_name_ar}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('subcatagory.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('subcatagory.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

            <!-- Add subcatagory -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add SubCatagory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('subcatagory.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Catagory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="catagory_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select Your Catagory</option>
                                            @foreach($catagory as $item)
                                            <option value="{{$item->id}}">{{$item->catagory_name_en}}</option>
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
                                        <input type="text" value="" name="subcatagory_name_en" class="form-control">
                                        @error('subcatagory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCatagory Arab <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="subcatagory_name_ar" class="form-control">
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