@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Profil
@endsection
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
                <div class="widget-user-header">
                    <!--  bg-black -->
                    <h3 class="widget-user-username">Name : {{$adminData->name}}</h3>
                    <a href="{{ route('admin.profile.edit')}}" style="float: right;" class="btn btn-success mb-5">Edit Profile</a>
                    <h6 class="widget-user-username">Email : {{$adminData->email}}</h6>
                    <h6 class="widget-user-username">Phone : {{$adminData->phone}}</h6>
                </div>
                <div class="widget-user-image">
                    <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path))? url($adminData->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar">
                </div>
                <!-- <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">12K</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                        </div>
                        <div class="col-sm-4 br-1 bl-1">
                            <div class="description-block">
                                <h5 class="description-header">550</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">158</h5>
                                <span class="description-text">TWEETS</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- box-footer -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection