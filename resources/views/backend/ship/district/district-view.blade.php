@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Region List
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Region List <span class="badge badge-pill badge-info">{{count($districts)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Region Name</th>
                                        <th>Country Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($districts as $item)
                                    <tr>
                                        <!-- <td><span><i class="fa-solid fa-id-card"></i></span></td> -->



                                        <td>{{$item->district_name}}</td>
                                        <td>{{$item->division->division_name}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('district.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('district.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

            <!-- Add Region -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Region</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('district.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Country Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" id="divisionselect" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select  Country</option>
                                            @foreach($divisions as $item)
                                            <option value="{{$item->id}}">{{$item->division_name}}</option>
                                            @endforeach

                                        </select>
                                        @error('division_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Region Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="" name="district_name" class="form-control">
                                        @error('district_name')
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