@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Change Password
@endsection
<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Password Change</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('update.change.password') }}">
                            @csrf
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Current Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" value="" id="current_password" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>New Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" value="" id="password" name="password" class="form-control" required="" data-validation-required-message="This field is required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" value="" id="password_confirmation" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-warning backend-btn" value="Update" />
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