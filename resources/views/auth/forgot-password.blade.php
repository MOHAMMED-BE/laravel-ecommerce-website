@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class='active'>Forget Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Forget Password</h4>
                    <p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" class="form-control text-input" id="email" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary checkout-page-button">Email Password Reset Link</button>
                    </form>
                </div>
                <!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

    </div><!-- /.container -->
</div><!-- /.body-content -->


@endsection