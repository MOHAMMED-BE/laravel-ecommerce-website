@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room User - Edit Profil
@endsection

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- ============================================== User Sidebar ============================================== -->

            @include('frontend.common.user-sidebar')

            <!-- ============================================== User Sidebar: END ============================================== -->

            <div class="col-md-2"></div>

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
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
                                <img id="show-profile-image" class="user-sidebar-img" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" >
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