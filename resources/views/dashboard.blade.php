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
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            Hi..... <strong>{{Auth::user()->name}}</strong>
                        </span>
                        Welcome
                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection