@extends('frontend.main_master')
@section('content')
@section('title')
Shopping Room - 
    @foreach($breadsubcat as $item)
        {{$item->getcategory->category_name_en}} / {{$item->subcategory_name_en}}
    @endforeach
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{('/')}}">Home</a></li>
                @foreach($breadsubcat as $item)
                <li class='active'> {{$item->getcategory->category_name_en}}</li>
                <li class='active'>{{$item->subcategory_name_en}}</li>
                @endforeach
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION ================================== -->

                @include('frontend.common.vertical-menu')

                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->

                        @include('frontend.common.sidebar-category')

                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->
                        
                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <!-- ========================================== SECTION – HERO ========================================= -->

                @foreach($breadsubcat as $item)
                <span class="badge badge-pill badge-success" style="background:#f94d4d;">{{$item->getcategory->category_name_en}}</span>
                <span class="badge badge-pill badge-success" style="background:#f94d4d;"> {{$item->subcategory_name_en}}</span>
                @endforeach

                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-12 col-md-6">
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">position</a></li>
                                                <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"> <span class="lbl">Show</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">1</a></li>
                                                <li role="presentation"><a href="#">2</a></li>
                                                <li role="presentation"><a href="#">3</a></li>
                                                <li role="presentation"><a href="#">4</a></li>
                                                <li role="presentation"><a href="#">5</a></li>
                                                <li role="presentation"><a href="#">6</a></li>
                                                <li role="presentation"><a href="#">7</a></li>
                                                <li role="presentation"><a href="#">8</a></li>
                                                <li role="presentation"><a href="#">9</a></li>
                                                <li role="presentation"><a href="#">10</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row" id="product-grid-view">
                                    @include('frontend.product.product-grid-view')

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->



                        <div class="tab-pane " id="list-container">
                            <div class="category-product" id="product-list-view">

                                @include('frontend.product.product-list-view')


                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- /.tab-content -->
                    <!-- <div class="clearfix filters-container"> -->
                        <!-- <div class="text-right"> -->
                            <!-- <div class="pagination-container"> -->
                                <!-- <ul class="list-inline list-unstyled"> -->
                                <!-- </ul> -->
                                <!-- /.list-inline -->
                            <!-- </div> -->
                            <!-- /.pagination-container -->
                        <!-- </div> -->
                        <!-- /.text-right -->

                    <!-- </div> -->
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
            <div class="ajax-loadmore-product text-center">
                <img class="loading-img" src="{{asset('frontend/assets/images/loading-more.svg')}}">
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>
<!-- /.body-content -->


<script>
    function loadMoreProduct(page) {
        $.ajax({
                type: "get",
                url: "?page=" + page,

                beforSend: function(response) {
                    $('.ajax-loadmore-product').show();
                }

            }) // end ajax

            .done(function(data) {
                if (data.grid_view == " " || data.list_view == " ") {
                    return;
                }
                $('.ajax-loadmore-product').hide();
                $('#product-grid-view').append(data.grid_view);
                $('#product-list-view').append(data.list_view);

            })

            .fail(function() {
                alert('Somethind Wend Wrong');
            })
    }

    var page = 1;
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreProduct(page);
        }
    });
</script>



@endsection