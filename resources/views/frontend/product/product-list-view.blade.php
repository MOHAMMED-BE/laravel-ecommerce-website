@foreach($products as $product)
<div class="category-product-inner wow fadeInUp">
    <div class="products">
        <div class="product-list product">
            <div class="row product-list-row">
                <div class="col col-sm-4 col-lg-4">
                    <div class="product-image">
                        <div class="image"> <img src="{{asset($product->product_thumbnail)}}" alt=""> </div>
                    </div>
                    <!-- /.product-image -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-8 col-lg-8">
                    <div class="product-info">
                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif</a></h3>
                        @php
                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                        @endphp
                        @include('frontend.common.rating')
                        @php
                        $product->discount_price = $product->selling_price - $product->discount_price
                        @endphp
                        <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                        <!-- /.product-price -->
                        <div class="description m-t-10">@if(session()->get('language') == 'english') {{$product->short_desc_an}} @else {{$product->short_desc_ar}} @endif</div>
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" title="Add Cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>
                                    <li class="">
                                        <button class="btn btn-primary icon add-to-wishlist" type="button" title="Wishlist" id="{{$product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->

                    </div>
                    <!-- /.product-info -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.product-list-row -->
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
        <!-- /.product-list -->
    </div>
    <!-- /.products -->
</div>
<!-- /.category-product-inner -->
@endforeach