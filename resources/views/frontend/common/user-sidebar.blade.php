@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<div class="col-md-2 user-dash">
    <img src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px ;height:100px;box-shadow: 0 .5rem 1rem rgba(255,255,255,.25)!important; border-radius:50%;" class="card-img-top">
    <ul class="list-group list-group-flush">
        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{route('my.orders')}}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>
<!-- end col-md-2 -->