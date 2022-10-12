@extends('frontend.main_master')
@section('content')
@php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp
@section('title')
Shopping Room User - Change Password
@endsection

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- ============================================== User Sidebar ============================================== -->

            @include('frontend.common.user-sidebar')

            <!-- ============================================== User Sidebar: END ============================================== -->
            <div class="col-md-2"></div>
            <div class="col-md-6 user-dash">
                <div class="card">
                    <h3 class="text-center">
                        Update Your Password
                    </h3>
                    <div class="card-body">
                        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('user.update.change.password') }}">
                            @csrf
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
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning backend-btn" value="Update" />
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#profile-image').change(function(e) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#show-profile-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


    @endsection