@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Site Setting</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('update.sitesetting') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id"  value="{{$setting->id}}">

                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Logo</h5>
                                                <div class="controls">
                                                    <input type="file" name="logo" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Email</h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" value="{{$setting->email}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Phone One</h5>
                                                <div class="controls">
                                                    <input type="text" name="phone_one" class="form-control" value="{{$setting->phone_one}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Phone Two</h5>
                                                <div class="controls">
                                                    <input type="text" name="phone_two" class="form-control" value="{{$setting->phone_two}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Company Name</h5>
                                                <div class="controls">
                                                    <input type="text" name="company_name" class="form-control" value="{{$setting->company_name}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Company Address</h5>
                                                <div class="controls">
                                                    <input type="text" name="company_address" class="form-control" value="{{$setting->company_address}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Facebook</h5>
                                                <div class="controls">
                                                    <input type="text" name="facebook" class="form-control" value="{{$setting->facebook}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Twitter</h5>
                                                <div class="controls">
                                                    <input type="text" name="twitter" class="form-control" value="{{$setting->twitter}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Linkedin</h5>
                                                <div class="controls">
                                                    <input type="text" name="linkedin" class="form-control" value="{{$setting->linkedin}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Youtube</h5>
                                                <div class="controls">
                                                    <input type="text" name="youtube" class="form-control" value="{{$setting->youtube}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- en col-12 -->
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info" value="Update" />
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
</div>


@endsection