@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">

            <!-- ============================================== User Sidebar ============================================== -->

            @include('frontend.common.user-sidebar')

            <!-- ============================================== User Sidebar: END ============================================== -->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">
                            Hi..... <strong>{{Auth::user()->name}}</strong>
                        </span>
                        Welcome
                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection