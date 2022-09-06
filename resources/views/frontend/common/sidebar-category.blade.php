@php
    $categories = App\Models\Category::orderBy('category_name_en','asc')->get();
@endphp

<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach($categories as $category)

            @php
            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','asc')->get();
            @endphp

            <div class="accordion-group">
                <div class="accordion-heading"> <a href="#collapse_{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
                        @if(session()->get('language') == 'english') {{$category->category_name_en}} @else {{$category->category_name_ar}} @endif </a> </div>
                <!-- /.accordion-heading -->
                <div class="accordion-body collapse" id="collapse_{{$category->id}}" style="height: 0px;">
                    <div class="accordion-inner">
                        @foreach($subcategories as $subcategory)
                        <ul>
                            <li><a href="{{url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}">@if(session()->get('language') == 'english') {{$subcategory->subcategory_name_en}} @else {{$subcategory->subcategory_name_ar}} @endif</a></li>
                        </ul>
                        @endforeach

                    </div>

                    <!-- /.accordion-inner -->
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