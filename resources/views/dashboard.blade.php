@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room User - Dashboard
@endsection

<div class="body-content">
    <div class="container">
        <div class="row">

            <!-- ============================================== User Sidebar ============================================== -->

            @include('frontend.common.user-sidebar')

            <!-- ============================================== User Sidebar: END ============================================== -->
            
        </div>
    </div>
</div>


@endsection