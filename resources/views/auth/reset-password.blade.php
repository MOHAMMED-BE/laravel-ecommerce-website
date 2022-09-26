@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Reset Password
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class='active'>Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">

                <!-- reset password -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Reset Password</h4>
                    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" class="form-control text-input" id="email" name="email">
                            @error('email')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" class="form-control text-input" id="password" name="password">
                            @error('password')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control text-input" id="password_confirmation" name="password_confirmation">
                        </div>
                        @error('password_confirmation')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Passwoed</button>
                    </form>

                </div>
                <!-- reset password -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->

    </div><!-- /.container -->
</div><!-- /.body-content -->


@endsection