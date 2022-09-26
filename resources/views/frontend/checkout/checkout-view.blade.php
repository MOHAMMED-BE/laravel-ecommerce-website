@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Checkout
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <form method="post" action="{{ route('checkout.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <h4 class="checkout-subtitle"><b>Shipping Adresse</b></h4>
                                            <hr>
                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <!-- <form class="register-form" role="form"> -->
                                                <div class="form-group">
                                                    <label class="info-title" for="shipping_name_field"><b>Shipping Name</b> <span>*</span></label>
                                                    <input type="text" value="{{Auth::user()->name}}" name="shipping_name" class="form-control text-input" id="shipping_name_field" placeholder="Shipping Name" required>
                                                </div> <!-- end form-group -->

                                                <div class="form-group">
                                                    <label class="info-title" for="shipping_email_field"><b>Shipping Email</b> <span>*</span></label>
                                                    <input type="email" value="{{Auth::user()->email}}" name="shipping_email" class="form-control text-input" id="shipping_email_field" placeholder="Shipping Email" required>
                                                </div> <!-- end form-group -->

                                                <div class="form-group">
                                                    <label class="info-title" for="shipping_phone_field"><b>Shipping Phone</b> <span>*</span></label>
                                                    <input type="text" value="{{Auth::user()->phone}}" name="shipping_phone" class="form-control text-input" id="shipping_phone_field" placeholder="Shipping Phone" required>
                                                </div> <!-- end form-group -->

                                                <div class="form-group">
                                                    <label class="info-title" for="post_code_field"><b>Post Code</b> <span>*</span></label>
                                                    <input type="text" name="post_code" class="form-control text-input" id="post_code_field" placeholder="Post Code" required>
                                                </div> <!-- end form-group -->

                                                <!-- </form> -->
                                            </div>
                                            <!-- already-registered-login -->

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <form class="register-form" role="form">
                                                    <div class="form-group">
                                                        <h5><b>Country Select</b> <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="division_id" id="divisionselect" class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disabled>Select Your division</option>
                                                                @foreach($division as $item)
                                                                <option value="{{$item->id}}">{{$item->division_name}}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('division_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5><b>Region Select</b> <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="district_id" id="districtselect" class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disabled>Select Your District</option>

                                                            </select>
                                                            @error('district_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5><b>City Select</b> <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="state_id" id="stateselect" class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disabled>Select Your State</option>

                                                            </select>
                                                            @error('state_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="notes_field"><b>Notes</b></label>
                                                        <textarea name="notes" class="form-control" id="notes_field" placeholder="Notes" cols="30" rows="5"></textarea>
                                                    </div> <!-- end form-group -->

                                                </form>
                                            </div>
                                            <!-- guest-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- end checkout-step-01  -->

                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                            <li><img src="{{asset($item->options->image)}}" class="any-img" style="width: 50px;height: 50px;"></li>

                                            <li>
                                                <strong>Quantity : </strong>
                                                ( {{$item->qty}} ) |
                                                <strong>Color : </strong>
                                                {{$item->options->color}} |
                                                <strong>Size : </strong>
                                                {{$item->options->size}} |
                                            </li>

                                            @endforeach
                                            <hr>
                                            <li>
                                                @if(Session::has('coupon'))
                                                <strong>SubTotal : </strong>
                                                ${{$cartTotal}}
                                                <hr>
                                                <strong>Coupon Name : </strong>
                                                {{session()->get('coupon')['coupon_name']}} |
                                                {{session()->get('coupon')['coupon_discount']}} % Off
                                                <hr>

                                                <strong>Coupon Discount : </strong>
                                                ${{session()->get('coupon')['discount_amount']}}
                                                <hr>

                                                <strong>Grand Total : </strong>
                                                ${{session()->get('coupon')['total_amount']}}
                                                <hr>

                                                @else
                                                <strong>SubTotal : </strong>
                                                ${{$cartTotal}}
                                                <hr>
                                                <strong>Grand Total : </strong>
                                                ${{$cartTotal}}
                                                <hr>
                                                @endif

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->

                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="stripe">Stripe</label>
                                            <input type="radio" class="form-check-input" name="payment_method" value="stripe" id="stripe">
                                            <img src="{{asset('frontend/assets/images/payments/1.png')}}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cash">Cash</label>
                                            <input type="radio" class="form-check-input" name="payment_method" value="cash" id="cash">
                                            <img src="{{asset('frontend/assets/images/payments/6.png')}}" alt="">
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>

                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </form>
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->


<script>
    // <!-- // get district -->
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
    // <!-- // get state -->
    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
</script>


@endsection