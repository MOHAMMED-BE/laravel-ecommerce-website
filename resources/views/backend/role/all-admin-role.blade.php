@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - All Admin User
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Admin Users <span class="badge badge-pill badge-info">{{count($adminuser)}}</span></h3>
                        <a href="{{route('add.admin')}}" class="btn btn-success" style="float:right;">Add Admin User</a>
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
                                        <th>Access</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adminuser as $item)
                                    <tr>
                                        <td class="d-flex justify-content-center"><img class="img rounded-4 center" src="{{asset($item->profile_photo_path)}}" alt="" style="width: 4rem !important;height: 3.5rem !important;"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td style="width: 22rem;">
                                            @if($item->brand == 1)
                                            <span class="badge badge-pill badge-success">Brand</span>
                                            @else
                                            @endif

                                            @if($item->category == 1)
                                            <span class="badge badge-pill badge-success">Category</span>
                                            @else
                                            @endif

                                            @if($item->product == 1)
                                            <span class="badge badge-pill badge-success">Product</span>
                                            @else
                                            @endif

                                            @if($item->slider == 1)
                                            <span class="badge badge-pill badge-success">Slider</span>
                                            @else
                                            @endif

                                            @if($item->coupon == 1)
                                            <span class="badge badge-pill badge-success">Coupon</span>
                                            @else
                                            @endif

                                            @if($item->shipping == 1)
                                            <span class="badge badge-pill badge-success">Shipping</span>
                                            @else
                                            @endif

                                            @if($item->blog == 1)
                                            <span class="badge badge-pill badge-success">Blog</span>
                                            @else
                                            @endif

                                            @if($item->setting == 1)
                                            <span class="badge badge-pill badge-success">Setting</span>
                                            @else
                                            @endif

                                            @if($item->returnorder == 1)
                                            <span class="badge badge-pill badge-success">Return Order</span>
                                            @else
                                            @endif

                                            @if($item->review == 1)
                                            <span class="badge badge-pill badge-success">Review</span>
                                            @else
                                            @endif

                                            @if($item->stock == 1)
                                            <span class="badge badge-pill badge-success">Stock</span>
                                            @else
                                            @endif

                                            @if($item->reports == 1)
                                            <span class="badge badge-pill badge-success">Reports</span>
                                            @else
                                            @endif

                                            @if($item->allusers == 1)
                                            <span class="badge badge-pill badge-success">All Users</span>
                                            @else
                                            @endif

                                            @if($item->adminuserrole == 1)
                                            <span class="badge badge-pill badge-success">Admin User Role</span>
                                            @else
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.user.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('admin.user.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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