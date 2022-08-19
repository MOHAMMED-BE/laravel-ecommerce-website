@extends('frontend.main_master')
@section('content')
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

            <div class="col-md-2">

            </div>

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            Hi..... <strong>{{Auth::user()->name}}</strong>
                        </span>
                        Update Your Profile
                    </h3>

                    <div class="card-body">
                        <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="name">Name <span></span></label>
                                <input type="text" class="form-control text-input" id="name" value="{{$user->name}}" name="name">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span></span></label>
                                <input type="email" class="form-control text-input" id="email" value="{{$user->email}}" name="email">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="phone">Phone <span></span></label>
                                <input type="text" class="form-control text-input" id="phone" value="{{$user->phone}}" name="phone">
                            </div>

                            <div class="form-group">
                                <h5>Profile Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" id="profile-image" name="profile_photo_path" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <img id="show-profile-image" class="rounded-circle" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px ;height:100px;box-shadow: 0 .5rem 1rem rgba(255,255,255,.25)!important;">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary checkout-page-button">Save</button>
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