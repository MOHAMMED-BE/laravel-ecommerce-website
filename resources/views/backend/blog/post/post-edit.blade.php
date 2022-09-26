@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Blog Post
@endsection

<style>
    .edit-img {
        margin: 10px 0 0 0 !important;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit blogpost -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update blogpost</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('post.update') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" value="{{$blogpost->id}}" name="id">

                                    <div class="row">
                                        <div class="col-12">

                                            <!-- start secound row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category_id" class="form-control" required aria-invalid="false">
                                                                <option value="" selected="" disabled>Select Your Category</option>
                                                                @foreach($blogcategory as $item)
                                                                <option value="{{$item->id}}" {{$item->id == $blogpost->category_id ? 'selected':''}}>{{$item->blog_category_name_en}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('category_id')
                                                            <span class=" text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Post Title En <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="post_title_en" value="{{$blogpost->post_title_en}}" class="form-control" required>
                                                        </div>
                                                        @error('post_title_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Post Title Ar <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="post_title_ar" value="{{$blogpost->post_title_ar}}" class="form-control" required>
                                                        </div>
                                                        @error('post_title_ar')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end secound row -->

                                            <!-- start Eighth row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Post Details English</h5>
                                                        <div class="controls">
                                                            <textarea id="editor1" name="post_details_en" rows="10" cols="80">
                                                            {!! $blogpost->post_details_en !!}
						                                </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Post Details Arabic</h5>
                                                        <div class="controls">
                                                            <textarea id="editor2" name="post_details_ar" rows="10" cols="80">
                                                    {!! $blogpost->post_details_ar !!}
						                                </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end Eighth row -->

                                        </div>
                                        <!-- end col-12 -->
                                    </div>
                                    <!-- end row -->
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-info" value="Update Blog Post" />
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
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Start image Update-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">blogpost image <strong>Update</strong></h4>
                    </div>
                    <form method="post" action="{{ route('blogpost.update.image') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$blogpost->id}}" name="id">
                        <input type="hidden" value="{{$blogpost->post_image}}" name="old_img">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <div class="card edit-img" style="width: 18rem;">
                                    <img src="{{ asset($blogpost->post_image)}}" class="card-img-top" id="postImage" style="height: 100%;width: 100%;">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <label for="" class="form-control-label">Change Image<span class="tx-danger">*</span>
                                                <input type="file" name="post_image" class="form-control" onChange="postImageUrl(this)">
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" style=" margin: 0 0 0 10px; " class="btn btn-info" value="Update" />
                        </div><br><br>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end image Update-->

</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
    function postImageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#postImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


@endsection