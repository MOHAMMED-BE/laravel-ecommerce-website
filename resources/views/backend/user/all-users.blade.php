@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - User List
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Users <span class="badge badge-pill badge-info">{{count($users)}}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="d-flex justify-content-center">
                                            <img class="img rounded-4 center"
                                                src="{{ (!empty($user->profile_photo_path)) ? url('upload/user-images/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}"
                                                alt="" style="width: 4rem !important;height: 3.5rem !important;">
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>

                                        <td>
                                            @if($user->UserOnline())
                                                <span class="badge badge-pill badge-success">Online</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</span>

                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('user.delete',$user->id)}}" title="Delete Data" class="btn btn-danger" id="delete" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection