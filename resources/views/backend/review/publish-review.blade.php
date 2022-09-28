@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Publish Reviews
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Publish Reviews</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Summary</th>
                                        <th>Comment</th>
                                        <th>Product Name</th>
                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $review)
                                    <tr>
                                        <td>{{$review->summary}}</td>
                                        <td>{{$review->comment}}</td>
                                        <td>{{$review->product->product_name_en}}</td>
                                        <td>{{$review->user->name}}</td>
                                        <td>
                                            @if($review->status == 0)
                                            <span class="badge badge-pill badge-warning" style="background: #7733ff;"> Pending </span>
                                            @elseif($review->status == 1)
                                            <span class="badge badge-pill badge-warning" style="background: #008000;">Publish </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('review.delete',$review->id)}}" id="delete"  title="Delete Data" class="btn btn-danger" id="delete">Delete</a>
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