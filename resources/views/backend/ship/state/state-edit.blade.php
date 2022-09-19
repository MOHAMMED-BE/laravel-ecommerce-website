@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit City -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update City</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('state.update',$state->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$state->id}}" name="id">

                                <div class="form-group">
                                    <h5>Country Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select Your division</option>
                                            @foreach($division as $item)
                                            <option value="{{$item->id}}" {{$item->id == $state->division_id ? 'selected':''}}>{{$item->division_name}}</option>
                                            @endforeach

                                        </select>
                                        @error('division_id')
                                        <span class=" text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Region Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="district_id" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled>Select Your district</option>
                                            @foreach($district as $item)
                                            <option value="{{$item->id}}" {{$item->id == $state->district_id ? 'selected':''}}>{{$item->district_name}}</option>
                                            @endforeach

                                        </select>
                                        @error('district_id')
                                        <span class=" text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>City Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{$state->state_name}}" name="state_name" class="form-control">
                                        @error('state_name')
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