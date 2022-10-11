@php
$hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','desc')->limit(6)->get();
@endphp
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($hot_deals as $product)

        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">
                    <div class="image"> <img src="{{asset($product->product_thumbnail)}}" href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}" alt=""> </div>
                    @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                    $date = Carbon\Carbon::parse($product->created_at);

                    $expert_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date->addDays(50))->format('Y-m-d H:i:s');

                    @endphp
                    <input type="hidden" id="expert_date" value="{{$expert_date}}">
                    <div class="sale-offer-tag hot"><span>{{round($discount)}} % <br>off</span></div>
                    <div class="timing-wrapper">

                        <div class="timer">
                            <ul>
                                <li>
                                    <p class="day"></p><span>DAYS</span>
                                </li>
                                <li>
                                    <p class="hour"></p><span>HRS</span>
                                </li>
                                <li>
                                    <p class="minute"></p><span>MINS</span>
                                </li>
                                <li id="sec">
                                    <p class="secound"></p><span>SEC</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'english') {{$product->product_name_en}} @else {{$product->product_name_ar}} @endif </a></h3>
                    @php
                    $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                    @endphp
                    @include('frontend.common.rating')
                    <div class="product-price"> <span class="price"> {{$product->discount_price}} $ </span> <span class="price-before-discount">{{$product->selling_price}} $</span> </div>
                    <!-- /.product-price -->

                </div>
                <!-- /.product-info -->

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <div class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="button" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}" onclick="productView(this.id)">Add to cart</button>
                        </div>
                    </div>
                    <!-- /.action -->
                </div>
                <!-- /.cart -->
            </div>
        </div>

        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>
<script>
    var expert_date = $('#expert_date').val();
    console.log(expert_date);
    var countDownDate = new Date(expert_date).getTime();

    var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $(".day").html(days);
        $(".hour").html(hours);
        $(".minute").html(minutes);
        $(".secound").html(seconds);

        if (distance < 0) {
            clearInterval(x);
            $(".day").html("EXPIRED");
        }
    }, 1000);
</script>