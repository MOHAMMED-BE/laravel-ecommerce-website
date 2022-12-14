@php
$setting = App\Models\SiteSetting::find(1);
@endphp

<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>@if(session()->get('language') == 'english') Wishlist @else قائمة الرغبات @endif</a></li>
                        <li><a href="{{route('mycart')}}"><i class="icon fa fa-shopping-cart"></i>@if(session()->get('language') == 'english') My Cart @else عربة التسوق @endif</a></li>
                        <li><a href="{{route('checkout')}}"><i class="fa-solid fa-money-check-dollar"></i>@if(session()->get('language') == 'english') Checkout @else الدفع @endif</a></li>
                        <li><a href="" type="button" data-toggle="modal" data-target="#trackingModal"><i class="fa-solid fa-map-location-dot"></i>@if(session()->get('language') == 'english') Order Tracking @else تتبع @endif</a></li>
                        @auth
                        <li><a href="{{route('dashboard')}}"><i class="icon fa fa-user"></i>@if(session()->get('language') == 'english') My Profile @else الحساب @endif</a></li>
                        @else
                        <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>@if(session()->get('language') == 'english') Login / Register @else دخول/تسجيل @endif</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">@if(session()->get('language') == 'english') English @else العربية @endif</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') == 'english')
                                <li><a href="{{ route('arabic.language')}}">العربية</a></li>
                                @else
                                <li><a href="{{ route('english.language')}}">English</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{url('/')}}"> <img src="{{asset($setting->logo)}}" alt="logo" style="height: 90px;margin: -34px 0 0 -50px;"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area" style="height: 45px;">

                        <form action="{{route('product.search')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <input class="search-field" onfocus="SearchResultShow()" onblur="SearchResultHide()" name="search" id="search" placeholder="Search here..." required style=" outline: none; " />
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        <div id="searchProducts" class="search-div"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="width: 200px">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cart-quantity"></span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price">
                                        <span class="sign cart-sub-total">

                                        </span>
                                        <span class="value"></span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="miniCart">

                                </div>
                                <div class="clearfix cart-total">
                                    <div class="pull-right">
                                        <span class="text">Sub Total : </span>
                                        <span class='price cart-sub-total'></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{('/')}}">
                                    @if(session()->get('language') == 'english') Home @else الرئيسية @endif</a>
                                </li>
                                @php
                                $categories = App\Models\Category::orderBy('category_name_en','asc')->get();
                                @endphp

                                @foreach($categories as $category)
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        @if(session()->get('language') == 'english') {{$category->category_name_en}} @else {{$category->category_name_ar}} @endif</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">

                                                    @php
                                                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','asc')->get();
                                                    @endphp

                                                    @foreach($subcategories as $subcategory)

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a href="{{url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}">
                                                            <h2 class="title">@if(session()->get('language') == 'english') {{$subcategory->subcategory_name_en}} @else {{$subcategory->subcategory_name_ar}} @endif</h2>
                                                        </a>
                                                        @php
                                                        $subsubcategories = App\Models\SubsubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','asc')->get();
                                                        @endphp

                                                        @foreach($subsubcategories as $subsubcategory)

                                                        <ul class="links">
                                                            <li>
                                                                <a href="{{url('subsubcategory/product/'.$subsubcategory->id.'/'.$subcategory->subcategory_slug_en.'/'.$subsubcategory->subsubcategory_slug_en)}}">
                                                                    @if(session()->get('language') == 'english') {{$subsubcategory->subsubcategory_name_en}} @else {{$subsubcategory->subsubcategory_name_ar}} @endif
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                    <!-- /.col -->
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                                <li><a href="{{route('shop.page')}}">Shop</a></li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

    <!-- Modal -->
    <div class="modal fade" id="trackingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('order.tracking')}}" method="get">
                    @csrf
                    <div class="modal-body">
                        <label for="">Invoice Code</label>
                        <input type="text" name="invoice_code" id="" class="form-control" placeholder="Input Your Order Invoice Number">
                    </div>
                    <button type="submit" class="btn btn-danger" style="margin: 0 0 10px 16px;">Track Now</button>
                </form>

            </div>
        </div>
    </div>

</header>

<script>
    function SearchResultShow() {
        $('#searchProducts').slideDown();
    }

    function SearchResultHide() {
        $('#searchProducts').slideUp();
    }
</script>