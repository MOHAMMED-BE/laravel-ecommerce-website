@php
$categories = App\Models\Category::orderBy('category_name_en','asc')->get();
@endphp

<div class="sidebar-widget wow fadeInUp" style="margin: 0 0 30px 0;">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">

            @if(!empty($_GET['category']))
            @php
            $filter_Cat = explode(',',$_GET['category']);
            @endphp
            @endif

            @foreach($categories as $category)
            <div class="accordion-group">
                <div class="accordion-heading">
                    <label for="{{$category->category_name_en}}" class="form-check-label">
                        <input type="checkbox" name="category[]" class="form-check-input" @if(!empty($filter_Cat) && in_array($category->category_slug_en,$filter_Cat)) checked @endif onchange="this.form.submit()" value="{{$category->category_slug_en}}" id="{{$category->category_name_en}}">
                        @if(session()->get('language') == 'english') {{$category->category_name_en}} @else {{$category->category_name_ar}} @endif
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