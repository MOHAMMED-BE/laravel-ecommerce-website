@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Edit Admin User
@endsection

<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Admin User</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$adminuser->id}}" name="id">
                       
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox"  name="brand" id="checkbox_1" value="1" {{$adminuser->brand == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_1">Brand</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="category" id="checkbox_2" value="1" {{$adminuser->category == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_2">Category</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="product" id="checkbox_3" value="1" {{$adminuser->product == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_3">Product</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="slider" id="checkbox_4" value="1" {{$adminuser->slider == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_4">Slider</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="coupon" id="checkbox_5" value="1" {{$adminuser->coupon == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_5">Coupon</label>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox"  name="shipping" id="checkbox_6" value="1" {{$adminuser->shipping == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_6">Shipping</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="setting" id="checkbox_8" value="1" {{$adminuser->setting == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_8">Setting</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="returnorder" id="checkbox_9" value="1" {{$adminuser->returnorder == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_9">Return Order</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="review" id="checkbox_10" value="1" {{$adminuser->review == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_10">Review</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="orders" id="checkbox_11" value="1" {{$adminuser->orders == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_11">Orders</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox"  name="reports" id="checkbox_13" value="1" {{$adminuser->reports == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_13">Reports</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="allusers" id="checkbox_14" value="1" {{$adminuser->allusers == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_14">All Users</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox"  name="adminuserrole" id="checkbox_15" value="1" {{$adminuser->adminuserrole == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_15">Admin User Role</label>
                                            </fieldset>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-warning backend-btn" value="Save" />
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