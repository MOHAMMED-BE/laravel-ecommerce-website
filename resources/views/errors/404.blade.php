@extends('frontend.main_master')
@section('content')
@section('title')
Error 404
@endsection

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>404</h1>
        </div>
        <h2>Oops! Nothing was found</h2>
        <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable. <br><a href="{{url('/')}}">Return To Home Page</a></p>
    </div>
</div>

@endsection