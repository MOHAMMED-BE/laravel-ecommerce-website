@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Blog Post</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <!-- start secound row -->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title_en" class="form-control" required>
                                                </div>
                                                @error('post_title_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Title Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="post_title_ar" class="form-control" required>
                                                </div>
                                                @error('post_title_ar')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end secound row -->

                                    <!-- start sexth row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>BlogCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required aria-invalid="false">
                                                        <option value="" selected="" disabled>Select Your Category</option>
                                                        @foreach($blogcategory as $item)
                                                        <option value="{{$item->id}}">{{$item->blog_category_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('category_id')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="post_image" class="form-control" required onChange="postImageUrl(this)">
                                                </div>
                                                @error('post_image')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <img src="" alt="" id="postImage">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end sexth row -->

                                    <!-- start Eighth row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Details English</h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="post_details_en" rows="10" cols="80">
						                            </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Post Details Arabic</h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="post_details_ar" rows="10" cols="80">
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
                                <input type="submit" class="btn btn-info" value="Start Post" />
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    function postImageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#postImage').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection