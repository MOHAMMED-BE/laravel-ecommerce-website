<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head" style="border-radius: 5px 5px 0px 0px;"><i class="icon fa fa-align-justify fa-fw"></i>Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}} category-icon" aria-hidden="true"></i>
                    @if(session()->get('language') == 'english') {{$category->category_name_en}} @else {{$category->category_name_ar}} @endif
                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','asc')->get();
                            @endphp
                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                <a href="{{url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}">
                                    <h2 class="title">
                                        @if(session()->get('language') == 'english') {{$subcategory->subcategory_name_en}} @else {{$subcategory->subcategory_name_ar}} @endif
                                    </h2>
                                </a>

                                @php
                                $subsubcategories = App\Models\SubsubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','asc')->get();
                                @endphp

                                @foreach($subsubcategories as $subsubcategory)
                                <ul class="links list-unstyled">
                                    <li>
                                        <a href="{{url('subsubcategory/product/'.$subsubcategory->id.'/'.$subcategory->subcategory_slug_en.'/'.$subsubcategory->subsubcategory_slug_en)}}">
                                            @if(session()->get('language') == 'english') {{$subsubcategory->subsubcategory_name_en}} @else {{$subsubcategory->subsubcategory_name_ar}} @endif
                                        </a>
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                            <!-- /.col -->
                            @endforeach
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->
            @endforeach
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->