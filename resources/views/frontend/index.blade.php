@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - Start Your Orders Today
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->

                @include('frontend.common.vertical-menu')

                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->

                @include('frontend.common.hot-deals')

                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Offer</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_offers as $product)

                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"> <img src="{{asset($product->product_thumbnail)}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                                        @php
                                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                                        @endphp
                                                        @include('frontend.common.rating')
                                                        @if($product->discount_price == NULL)
                                                        <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                                        @else
                                                        <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                                        <!-- /.product-price -->
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->

                @include('frontend.common.product-tags')

                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp" style="margin-top: 30px;">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    @foreach($special_deals as $product)

                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"> <img src="{{asset($product->product_thumbnail)}}" alt=""> </a> </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                                        @php
                                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                                        @endphp
                                                        @include('frontend.common.rating')
                                                        @if($product->discount_price == NULL)
                                                        <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                                        @else
                                                        <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                                        <!-- /.product-price -->
                                                        @endif

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->

            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)

                        <div class="item">
                            <img src="{{asset($slider->slider_img)}}" alt="">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <!-- <div class="slider-header fadeInDown-1">Top Brands</div> -->
                                    <div class="big-text fadeInDown-1"> {{$slider->title}} </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$slider->description}}</span> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        @endforeach

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">New offers every day</h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>

                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">
                                    @if(session()->get('language') == 'english') {{$category->category_name_en}} @else {{$category->category_name_ar}} @endif</a></li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($products as $product)

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp
                                                    @if($product->discount_price == NULL)
                                                    <div class="tag new"><span>new</span></div>
                                                    @else
                                                    <div class="tag hot"><span>{{round($discount)}} %</span></div>
                                                    @endif
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                                    @php
                                                    $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                                    @endphp
                                                    @include('frontend.common.rating')
                                                    <div class="description"></div>

                                                    @if($product->discount_price == NULL)
                                                    <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                                    <!-- /.product-price -->
                                                    @endif
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" title="Add Cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            <li class="">
                                                                <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                            </li>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    @endforeach

                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @foreach($categories as $category)

                        <div class="tab-pane" id="category{{$category->id}}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @php
                                    $catwiseproduct = App\Models\Product::where('category_id',$category->id)->where('status',1)->orderBy('id','desc')->limit(7)->get();
                                    @endphp
                                    @forelse($catwiseproduct as $product)

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                                    <!-- /.image -->
                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp
                                                    @if($product->discount_price == NULL)
                                                    <div class="tag new"><span>new</span></div>
                                                    @else
                                                    <div class="tag hot"><span>{{round($discount)}} %</span></div>
                                                    @endif
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                                    @php
                                                    $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                                    @endphp
                                                    @include('frontend.common.rating')
                                                    <div class="description"></div>

                                                    @if($product->discount_price == NULL)
                                                    <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                                    <!-- /.product-price -->
                                                    @endif

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" title="Add Cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            <li class="">
                                                                <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                            </li>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    @empty
                                    <h5 class="text-danger">No Product Found</h5>
                                    @endforelse
                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        @endforeach
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Featured products</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($featureds as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                        @php
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        @include('frontend.common.rating')
                                        <div class="description"></div>

                                        @if($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                        <!-- /.product-price -->
                                        @endif

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="">
                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                <!-- ============================================== BEST SELLER ============================================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">Best seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                            @foreach($best_seller as $product)
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product/details/'.$product->product->id.'/'.$product->product->product_slug_en)}}"> <img src="{{asset($product->product->product_thumbnail)}}" alt=""> </a> </div>
                                                        <!-- /.image -->
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="{{url('product/details/'.$product->product->id.'/'.$product->product->product_slug_en)}}">{{ $product->product->product_name_en }}</a></h3>
                                                        @if($product->product->discount_price == NULL)
                                                        <div class="product-price"> <span class="price"> {{$product->product->selling_price}} $ </span> </div>
                                                        @else
                                                        <div class="product-price"> <span class="price"> {{$product->product->discount_price}} $ </span> <span class="price-before-discount">{{$product->product->selling_price}} $</span> </div>
                                                        <!-- /.product-price -->
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3" style=" display: contents; ">
                                                        @php
                                                        $avarage = App\Models\Review::where('product_id',$product->product->id)->where('status',1)->avg('rating');
                                                        @endphp
                                                        @include('frontend.common.rating')

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== Electronics PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">{{$skip_category->category_name_en}}</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($skip_product as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                        @php
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        @include('frontend.common.rating')
                                        <div class="description"></div>

                                        @if($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                        <!-- /.product-price -->
                                        @endif

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" title="Add Cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="">
                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== Electronics PRODUCTS : END ============================================== -->


                <!-- ============================================== Apple PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    @if(session()->get('language') == 'english')
                    <h3 class="section-title"> {{$skip_brand->brand_name_en}} Products</h3>
                    @else
                    <h3 class="section-title" style="float: right;"> منتجات {{$skip_brand->brand_name_ar}} @endif</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($skip_product_brand as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        <div class="tag hot"><span>hot</span></div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                                        @php
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        @endphp
                                        @include('frontend.common.rating')
                                        <div class="description"></div>

                                        @if($product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> {{$product->selling_price}} $ </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                                        <!-- /.product-price -->
                                        @endif

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" title="Add Cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="">
                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== Apple PRODUCTS : END ============================================== -->

                <!-- ============================================== Recent Products Sold ============================================== -->
                <section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">Recent Products Sold</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach($recent_orders as $order)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{url('product/details/'.$order->product->id.'/'.$order->product->product_slug_en)}}"><img src="{{asset($order->product->product_thumbnail)}}" alt=""></a> </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $order->product->selling_price - $order->product->discount_price;
                                        $discount = ($amount/$order->product->selling_price) * 100;
                                        @endphp
                                        @if($order->product->discount_price == NULL)
                                        <div class="tag new"><span>new</span></div>
                                        @else
                                        <div class="tag hot"><span>{{round($discount)}} %</span></div>
                                        @endif
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="{{url('product/details/'.$order->product->id.'/'.$order->product->product_slug_en)}}">{{$order->product->product_name_en}}</a></h3>
                                        <div class="col-md-3" style=" display: contents; ">
                                            @php
                                            $avarage = App\Models\Review::where('product_id',$order->product->id)->where('status',1)->avg('rating');
                                            @endphp
                                            @if($avarage == 0)


                                            @elseif($avarage == 1 || $avarage < 2) <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>

                                                @elseif($avarage == 2 || $avarage < 3) <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    @elseif($avarage == 3 || $avarage < 4) <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>

                                                        @elseif($avarage == 4 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>

                                                            @elseif($avarage == 5 || $avarage < 5) <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                @endif
                                        </div>
                                        <div class="description"></div>
                                        @if($order->product->discount_price == NULL)
                                        <div class="product-price"> <span class="price"> {{$order->product->selling_price}} $ </span> </div>
                                        @else
                                        <div class="product-price"> <span class="price"> {{$order->product->discount_price}} $ </span> <span class="price-before-discount">{{$order->product->selling_price}} $</span> </div>
                                        <!-- /.product-price -->
                                        @endif

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" title="Add Cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="">
                                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->

                        @endforeach

                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== Recent Products Sold : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

        @include('frontend.body.brands')

        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>

@endsection