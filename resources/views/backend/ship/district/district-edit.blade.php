@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Region
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit Region -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Region</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('district.update',$district->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$district->id}}" name="id">

                                <div class="form-group">
                                    <h5>Country Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select  Country</option>
                                            @foreach($division as $item)
                                            <option value="{{$item->id}}" {{$item->id == $district->division_id ? 'selected':''}} >{{$item->division_name}}</option>
                                            @endforeach

                                        </select>
                                        @error('division_id')
                                        <span class=" text-danger">{{$message}}</span>
                                                @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Region Name </h5>
                                    <div class="controls">
                                        <input type="text" value="{{$district->district_name}}" name="district_name" class="form-control">
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