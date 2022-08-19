@extends('frontend.main_master')
@section('content')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin-images/'.$editData->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px ;height:100px;box-shadow: 0 .5rem 1rem rgba(255,255,255,.25)!important; border-radius:50%;" class="card-img-top">
                <ul class="list-group list-group-flush">
                    <a href="{{url('/')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{url('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.logout')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
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
                        <form class="register-form outer-top-xs" role="form" method="POST" action="">
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
                                <input type="text" class="form-control text-input" id="phone" value="{{$user->phone}}" name="email">
                            </div>

                        </form>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>


@endsection