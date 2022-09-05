<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'english')
            @foreach($products_tags_en as $product)
            <a class="item" title="Phone" href="{{url('product/tag/'.$product->product_tags_en)}}">{{str_replace(',',' ',$product->product_tags_en)}}</a>
            @endforeach
            @else
            @foreach($products_tags_ar as $product)
            <a class="item" title="Phone" href="{{url('product/tag/'.$product->product_tags_ar)}}">{{str_replace(',',' ',$product->product_tags_ar)}}</a>
            @endforeach
            @endif

            <!-- <a class="item active" title="Vest" href="category.html">Vest</a> -->
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->