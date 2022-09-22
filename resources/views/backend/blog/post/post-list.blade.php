@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Post List <span class="badge badge-pill badge-info">{{count($blogpost)}}</h3>
                        <a href="{{route('add.post')}}" class="btn btn-success" style="float:right;">Add Post</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Post Ilage</th>
                                        <th>Post Category</th>
                                        <th>Post Title En</th>
                                        <th>Post Title Ar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogpost as $item)
                                    <tr>
                                        <td class="d-flex justify-content-center">
                                            <img class="img rounded-3 center" src="{{asset($item->post_image)}}" alt="" style="width: 7rem !important;height: 4rem !important;">
                                        </td>
                                        <td>{{$item['category']['blog_category_name_en']}}</td>
                                        <td>{{$item->post_title_en}}</td>
                                        <td>{{$item->post_title_ar}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('post.edit',$item->id)}}" title="Edit Data" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('post.delete',$item->id)}}" title="Delete Data" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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