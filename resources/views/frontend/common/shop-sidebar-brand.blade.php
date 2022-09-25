@php
$brands = App\Models\Brand::orderBy('brand_name_en','asc')->get();
@endphp



<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Brand</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @if(!empty($_GET['brand']))

            @php
            $filter_brand = explode(',',$_GET['brand']);
            @endphp

            @endif
            @foreach($brands as $brand)
            <div class="accordion-group">
                <div class="accordion-heading">
                    <label for="{{$brand->brand_name_en}}" class="form-check-label">
                        <input type="checkbox" name="brand[]" class="form-check-input" @if(!empty($filter_brand) && in_array($brand->brand_slug_en,$filter_brand)) checked @endif onchange="this.form.submit()" value="{{$brand->brand_slug_en}}" id="{{$brand->brand_name_en}}">
                        @if(session()->get('language') == 'english') {{$brand->brand_name_en}} @else {{$brand->brand_name_ar}} @endif
                    </label>
                </div>
                <!-- /.accordion-body -->
            </div>
            @endforeach
            <!-- /.accordion-group -->
        </div>
        <!-- /.accordion -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->