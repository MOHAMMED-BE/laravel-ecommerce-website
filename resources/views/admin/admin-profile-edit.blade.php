@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Profil
@endsection
<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Profile Edit</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Name </h5>
                                                <div class="controls">
                                                    <input type="text" value="{{$editData->name}}" name="name" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email </h5>
                                                <div class="controls">
                                                    <input type="email" value="{{$editData->email}}" name="email" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Phone </h5>
                                                <div class="controls">
                                                    <input type="text" value="{{$editData->phone}}" name="phone" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Profile Image </h5>
                                                <div class="controls">
                                                    <input type="file" id="profile-image" name="profile_photo_path" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-4">
                                            <img id="show-profile-image" class="rounded-circle" src="{{ (!empty($editData->profile_photo_path)) ? url($editData->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px ;height:100px;box-shadow: 0 .5rem 1rem rgba(255,255,255,.25)!important;">
                                        </div>
                                    </div>
                                </div>
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