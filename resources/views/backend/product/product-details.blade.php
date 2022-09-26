@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Product Details
@endsection

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit product -->

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- start secound row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Brand </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" value="{{$brand->product_name_en}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name En </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" value="{{$product->product_name_en}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name En </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" value="{{$product->product_name_en}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end first row -->

                                            <!-- start secound row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name En </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" value="{{$product->product_name_en}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name En </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_en" value="{{$product->product_name_en}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Name Ar </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_name_ar" value="{{$product->product_name_ar}}" class="form-control" required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end secound row -->

                                            <!-- start third row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Product Code </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Product Quantity </h5>
                                                        <div class="controls">
                                                            <input type="text" name="product_quantity" value="{{$product->product_quantity}}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end third row -->

                                            <!-- start fourth row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Tags En </h5>
                                                        <input type="text" value="{{$product->product_tags_en}}" name="product_tags_en" />
                                                    </div>

                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Tags Ar </h5>
                                                        <input type="text" value="{{$product->product_tags_ar}}" name="product_tags_ar" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Size En </h5>
                                                        <input type="text" value="{{$product->product_size_en}}" name="product_size_en" />
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end fourth row -->

                                            <!-- start fifth row -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Product Size Ar </h5>
                                                        <input type="text" value="{{$product->product_size_ar}}" name="product_size_ar />
                                                    </div>

                                                </div>
                                                <div class=" col-md-4">
                                                        <div class="form-group">
                                                            <h5>Product Color En </h5>
                                                            <input type="text" value="{{$product->product_color_en}}" name="product_color_en" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5>Product Color Ar </h5>
                                                            <input type="text" value="{{$product->product_color_ar}}" name="product_color_ar" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end fifth row -->

                                                <!-- start sexth row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Selling Price </h5>
                                                            <div class="controls">
                                                                <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control" required>
                                                            </div>
                                                            @error('selling_price')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Discount Price </h5>
                                                            <div class="controls">
                                                                <input type="text" name="discount_price" value="{{$product->discount_price}}" class="form-control" required>
                                                            </div>
                                                            @error('discount_price')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end sexth row -->

                                                <!-- start seventh row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>English Short Description </h5>
                                                            <div class="controls">
                                                                <textarea name="short_desc_en" id="textarea" class="form-control" required>
                                                        {!! $product->short_desc_en !!}
                                                    </textarea>
                                                            </div>
                                                            @error('short_desc_en')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Arabic Short Description </h5>
                                                            <div class="controls">
                                                                <textarea name="short_desc_ar" id="textarea" class="form-control" required>
                                                        {!! $product->short_desc_ar !!}
                                                    </textarea>
                                                            </div>
                                                            @error('short_desc_ar')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end seventh row -->

                                                <!-- start Eighth row -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>English Long Description </h5>
                                                            <div class="controls">
                                                                <textarea name="long_desc_en">
                                                            {!! $product->long_desc_en !!}
						                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Arabic Long Description </h5>
                                                            <div class="controls">
                                                                <textarea name="long_desc_ar">
                                                    {!! $product->long_desc_en !!}
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
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="hot_deals" id="checkbox_2" value="1" {{$product->hot_deals == 1 ? 'checked' : ''}}>
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="featured" id="checkbox_3" value="1" {{$product->featured == 1 ? 'checked' : ''}}>
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="special_offer" id="checkbox_4" value="1" {{$product->special_offer == 1 ? 'checked' : ''}}>
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="special_deals" id="checkbox_5" value="1" {{$product->special_deals == 1 ? 'checked' : ''}}>
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <a href="">Back</a>
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

    <!-- Start Multiple Image Update-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>
                    <form method="post" action="{{ route('product-update-images') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($multiImgs as $img)
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset($img->photo_name)}}" class="card-img-top" style="height: 100%;width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('product-multiimg-delete',$img->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Image"><i class="fa fa-trash"></i></a>
                                        </h5>
                                        <p class="card-text">
                                            <label for="" class="form-control-label">Change Image<span class="tx-danger">*</span>
                                                <input type="file" name="multi_img[{{$img->id}}]" class="form-control"> <!-- id="multiImg"  -->
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-info" value="Update" />
                        </div><br><br>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end Multiple Image Update-->
    <hr>
    <!-- Start Thumbnail Image Update-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>
                    <form method="post" action="{{ route('product-update-thumbnail') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$product->id}}" name="id">
                        <input type="hidden" value="{{$product->product_thumbnail}}" name="old_img">
                        <div class="row row-sm">
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset($product->product_thumbnail)}}" class="card-img-top" id="mainThumbnail" style="height: 100%;width: 100%;">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <label for="" class="form-control-label">Change Image<span class="tx-danger">*</span>
                                                <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumbnailUrl(this)">
                                            </label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-info" value="Update" />
                        </div><br><br>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end Thumbnail Image Update-->

</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
    function mainThumbnailUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader()
            reader.onload = function(e) {
                $('#mainThumbnail').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- ---------------------------Show Multi Image JavaScript Code ------------------------ -->

<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

<!-- ================================= End Show Multi Image JavaScript Code. ==================== -->



@endsection