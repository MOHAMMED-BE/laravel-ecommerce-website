@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Create Admin User</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Phone <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" id="profile-image" name="profile_photo_path" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img id="show-profile-image" class="rounded-circle" src="{{ url('upload/no_image.jpg')}}" alt="User Avatar" style="width:100px ;height:100px;box-shadow: 0 .5rem 1rem rgba(255,255,255,.25)!important;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="brand" id="checkbox_1" value="1">
                                                <label for="checkbox_1">Brand</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="category" id="checkbox_2" value="1">
                                                <label for="checkbox_2">Category</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="product" id="checkbox_3" value="1">
                                                <label for="checkbox_3">Product</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="slider" id="checkbox_4" value="1">
                                                <label for="checkbox_4">Slider</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="coupon" id="checkbox_5" value="1">
                                                <label for="checkbox_5">Coupon</label>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="shipping" id="checkbox_6" value="1">
                                                <label for="checkbox_6">Shipping</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="blog" id="checkbox_7" value="1">
                                                <label for="checkbox_7">Blog</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="setting" id="checkbox_8" value="1">
                                                <label for="checkbox_8">Setting</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="returnorder" id="checkbox_9" value="1">
                                                <label for="checkbox_9">Return Order</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="review" id="checkbox_10" value="1">
                                                <label for="checkbox_10">Review</label>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" name="orders" id="checkbox_11" value="1">
                                                <label for="checkbox_11">Orders</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="stock" id="checkbox_12" value="1">
                                                <label for="checkbox_12">Stock</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="reports" id="checkbox_13" value="1">
                                                <label for="checkbox_13">Reports</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="allusers" id="checkbox_14" value="1">
                                                <label for="checkbox_14">All Users</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" name="adminuserrole" id="checkbox_15" value="1">
                                                <label for="checkbox_15">Admin User Role</label>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info" value="Save" />
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