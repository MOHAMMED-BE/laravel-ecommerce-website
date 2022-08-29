@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form novalidate>
                            <div class="row">
                                <div class="col-12">


                                    <!-- start secound row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled>Select Your Brand</option>
                                                        @foreach($brand as $item)
                                                        <option value="{{$item->id}}">{{$item->brand_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('brand_id')
                                                    <span class=" text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled>Select Your Category</option>
                                                        @foreach($category as $item)
                                                        <option value="{{$item->id}}">{{$item->category_name_en}}</option>
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
                                                <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled>Select SubCategory</option>

                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end first row -->

                                    <!-- start secound row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" aria-invalid="false">
                                                        <option value="" selected="" disabled>Select Sub-SubCategory</option>

                                                    </select>
                                                    @error('subsubcategory_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control">
                                                </div>
                                                @error('product_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name Ar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_ar" class="form-control">
                                                </div>
                                                @error('product_name_ar')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end secound row -->

                                    <!-- start third row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" class="form-control">
                                                </div>
                                                @error('product_code')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_quantity" class="form-control">
                                                </div>
                                                @error('product_quantity')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                <input type="text" value="Lorem" name="product_tags_en" data-role="tagsinput" placeholder="add tags" />
                                                @error('product_tags_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end third row -->

                                    <!-- start fourth row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags Ar <span class="text-danger">*</span></h5>
                                                <input type="text" value="Lorem" name="product_tags_ar" data-role="tagsinput" placeholder="أضف كلمات مفتاحية" />
                                                @error('product_tags_ar')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size En <span class="text-danger">*</span></h5>
                                                <input type="text" value="Lorem" name="product_size_en" data-role="tagsinput" placeholder="add tags" />
                                                @error('product_size_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                                <input type="text" value="Lorem" name="product_size_ar" data-role="tagsinput" placeholder="أضف كلمات مفتاحية" />
                                                @error('product_size_ar')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end fourth row -->

                                    <!-- start fifth row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Color En <span class="text-danger">*</span></h5>
                                                <input type="text" value="Lorem" name="product_color_en" data-role="tagsinput" placeholder="أضف كلمات مفتاحية" />
                                                @error('product_color_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                                <input type="text" value="Lorem" name="product_color_ar" data-role="tagsinput" placeholder="add tags" />
                                                @error('product_color_ar')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control">
                                                </div>
                                                @error('selling_price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end fifth row -->

                                    <!-- start sexth row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control">
                                                </div>
                                                @error('discount_price')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Thumbnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="multi_img[]" class="form-control">
                                                </div>
                                                @error('product_thumbnail')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Mutiple Images <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="discount_price" class="form-control">
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
                                                <h5>English Short Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                </div>
                                                @error('short_desc_en')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Arabic Short Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_desc_ar" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
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
                                                <h5>English Long Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <form>
                                                        <textarea id="editor1" name="short_desc_en" rows="10" cols="80">
												            This is my textarea to be replaced with CKEditor.
						                                </textarea>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Arabic Long Description <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <form>
                                                        <textarea id="editor2" name="short_desc_ar" rows="10" cols="80">
												            This is my textarea to be replaced with CKEditor.
						                                </textarea>
                                                    </form>
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
                                                <input type="checkbox" name="hot_deals" id="checkbox_2" value="1">
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="featured" id="checkbox_3" value="1">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="special_offer" id="checkbox_4" value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="special_deals" id="checkbox_5" value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info" value="Save Product" />
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


@endsection