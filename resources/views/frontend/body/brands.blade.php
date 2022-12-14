@php
$brands = App\Models\Brand::orderBy('id','desc')->get();
@endphp
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach($brands as $brand)
            <div class="item m-t-15">
                <a href="#" class="image">
                    <img data-echo="{{$brand->brand_image}}" src="{{$brand->brand_image}}" alt="" style="width: 30%;">
                </a>
            </div>
            <!--/.item-->
            @endforeach

            <!-- /.owl-carousel #logo-slider -->
        </div>
        <!-- /.logo-slider-inner -->

    </div>

</div>