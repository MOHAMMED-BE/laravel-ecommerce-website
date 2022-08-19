@extends('frontend.main_master')
@section('content')
@php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px ;height:100px;box-shadow: 0 .5rem 1rem rgba(255,255,255,.25)!important; border-radius:50%;" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            Hii..... <strong>{{Auth::user()->name}}</strong>
                        </span>
                        Update Your Profile
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
                                <input type="submit" class="btn btn-info" value="Update" />
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