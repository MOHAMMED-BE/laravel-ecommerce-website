@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Blog Details
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Blog Details</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    <div class="blog-post wow fadeInUp">
                        <img class="img-responsive post-img" src="{{asset($post->post_image)}}" alt="">
                        <h1>@if(session()->get('language') == 'english') {{$post->post_title_en}} @else {{$post->post_title_ar}} @endif</h1>
                        <span class="author">John Doe</span>
                        <span class="review">7 Comments</span>
                        <span class="date-time">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                        <div class="addthis_inline_share_toolbox"></div>
                        <p>@if(session()->get('language') == 'english') {!! $post->post_details_en !!} @else {!! $post->post_details_ar !!} @endif</p>

                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Leave A Comment</h4>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                        <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 sidebar">

                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>

                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                        </div>
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
                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        @include('frontend.common.product-tags')

                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection