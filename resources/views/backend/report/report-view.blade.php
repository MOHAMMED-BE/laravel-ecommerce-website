@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Reports
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders Search With Date</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="get" action="{{ route('search.by.date') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Select Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" value="" name="date" class="form-control">
                                        @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-info" value="Searsh" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-4 -->
            <div class="col-md-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders Search With Month</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="get" action="{{ route('search.by.month') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Select Month <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="month_select" id="" class="form-control">
                                            <option selected value='Janaury'>Janaury</option>
                                            <option value='February'>February</option>
                                            <option value='March'>March</option>
                                            <option value='4'>April</option>
                                            <option value='May'>May</option>
                                            <option value='June'>June</option>
                                            <option value='July'>July</option>
                                            <option value='August'>August</option>
                                            <option value='September'>September</option>
                                            <option value='October'>October</option>
                                            <option value='November'>November</option>
                                            <option value='December'>December</option>
                                        </select>
                                        @error('month_select')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                @php
                                $years = range(2000, strftime("%Y", time()));
                                @endphp
                                <div class="form-group">
                                    <h5>Select Year <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year_select" id="" class="form-control">
                                            @foreach($years as $year) :
                                            <option value="{{$year}}">{{$year}}</option>
                                            @endforeach;
                                        </select>
                                        @error('year_select')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-info" value="Searsh" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-4 -->

            <div class="col-md-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders Search With Year</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="get" action="{{ route('search.by.year') }}">
                                @csrf
                                @php
                                $years = range(2000, strftime("%Y", time()));
                                @endphp
                                <div class="form-group">
                                    <h5>Select Year <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year" id="" class="form-control">
                                            @foreach($years as $year) :
                                            <option value="{{$year}}">{{$year}}</option>
                                            @endforeach;
                                        </select>
                                        @error('year')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-info" value="Searsh" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-4 -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection