@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Blog
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{('/')}}">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    @foreach($blogpost as $post)
                    <div class="blog-post  wow fadeInUp" style="margin: 0 0 20px 0;">
                        <a href="{{route('blog.details',$post->id)}}"><img class="img-responsive post-img" src="{{asset($post->post_image)}}" alt=""></a>
                        <h1>
                            <a href="{{route('blog.details',$post->id)}}">@if(session()->get('language') == 'english') {{$post->post_title_en}} @else {{$post->post_title_ar}} @endif</a>
                        </h1>
                        <!-- <span class="author"></span>
                        <span class="review"></span> -->
                        <span class="date-time">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                        <p>@if(session()->get('language') == 'english') {!! Str::limit($post->post_details_en,500) !!} @else {!! Str::limit($post->post_details_ar,500) !!} @endif</p>
                        <a href="{{route('blog.details',$post->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
                    </div>
                    @endforeach
                    <!-- blog post -->

                    <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- /.list-inline -->
                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->

                    </div><!-- /.filters-container -->
                </div>
                <div class="col-md-3 sidebar">

                    <div class="sidebar-module-container">
                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    @foreach($blogcategory as $category)
                                    <ul class="list-group list-group-flush">
                                        <a href="{{url('blog/category/post',$category->id)}}">
                                            <li class="list-group-item">@if(session()->get('language') == 'english') {{$category->blog_category_name_en}} @else {{$category->blog_category_name_ar}} @endif</li>
                                        </a>
                                    </ul>
                                    @endforeach

                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection