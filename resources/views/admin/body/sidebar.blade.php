@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

$setting = App\Models\SiteSetting::find(1);

@endphp


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">

    <div class="user-profile">
      <div class="ulogo">
        <a href="{{url('admin/dashboard')}}">
          <!-- logo for regular statee and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{asset($setting->logo)}}" alt="" style=" transform: scale(0.7); margin: -10px 0 0 0; ">
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{ ($route == 'dashboard')? 'active':''}}">
        <a href="{{url('admin/dashboard')}}">
          <i data-feather="pie-chart"></i>
          <span>Shopping Room Dashboard</span>
        </a>
      </li>

      @php
      $brand = (auth()->guard('admin')->user()->brand == 1);
      $category = (auth()->guard('admin')->user()->category == 1);
      $product = (auth()->guard('admin')->user()->product == 1);
      $slider = (auth()->guard('admin')->user()->slider == 1);
      $coupon = (auth()->guard('admin')->user()->coupon == 1);
      $shipping = (auth()->guard('admin')->user()->shipping == 1);
      $setting = (auth()->guard('admin')->user()->setting == 1);
      $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
      $review = (auth()->guard('admin')->user()->review == 1);
      $orders = (auth()->guard('admin')->user()->orders == 1);
      $reports = (auth()->guard('admin')->user()->reports == 1);
      $allusers = (auth()->guard('admin')->user()->allusers == 1);
      $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
      @endphp


      @if($brand == true)
      <li class="treeview {{ ($prefix == '/brand')? 'active':''}}">
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Brands</span>
          <span class="test" style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.brand')? 'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brand</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($category == true)
      <li class="treeview {{ ($prefix == '/category')? 'active':''}}">
        <a href="#">
          <i data-feather="mail"></i> <span>Categories</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.category')? 'active':''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
          <li class="{{ ($route == 'all.subcategory')? 'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li>
          <li class="{{ ($route == 'all.subsubcategory')? 'active':''}}"><a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($product == true)
      <li class="treeview {{ ($prefix == '/product')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Products</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'add-product')? 'active':''}}"><a href="{{route('add-product')}}"><i class="ti-more"></i>Add Products</a></li>
          <li class="{{ ($route == 'menage-product')? 'active':''}}"><a href="{{route('menage-product')}}"><i class="ti-more"></i>Menage Products</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($slider == true)
      <li class="treeview {{ ($prefix == '/slider')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Sliders</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'menage-slider')? 'active':''}}"><a href="{{route('menage-slider')}}"><i class="ti-more"></i>Menage Slider</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($coupon == true)
      <li class="treeview {{ ($prefix == '/coupon')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Coupons</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'menage-coupon')? 'active':''}}"><a href="{{route('menage-coupon')}}"><i class="ti-more"></i>Menage Coupon</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($shipping == true)
      <li class="treeview {{ ($prefix == '/shipping')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Shipping Area</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'menage-division')? 'active':''}}"><a href="{{route('menage-division')}}"><i class="ti-more"></i>Ship Country</a></li>
          <li class="{{ ($route == 'menage-district')? 'active':''}}"><a href="{{route('menage-district')}}"><i class="ti-more"></i>Ship Region</a></li>
          <li class="{{ ($route == 'menage-state')? 'active':''}}"><a href="{{route('menage-state')}}"><i class="ti-more"></i>Ship City</a></li>
        </ul>
      </li>
      @else
      @endif



      @if($setting == true)
      <li class="treeview {{ ($prefix == '/setting')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Menage Settings</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'site.setting')? 'active':''}}"><a href="{{route('site.setting')}}"><i class="ti-more"></i>Site Settings</a></li>
          <li class="{{ ($route == 'seo.setting')? 'active':''}}"><a href="{{route('seo.setting')}}"><i class="ti-more"></i>Seo Settings</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($review == true)
      <li class="treeview {{ ($prefix == '/review')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Menage Reviews</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'pending.review')? 'active':''}}"><a href="{{route('pending.review')}}"><i class="ti-more"></i>Pending Review</a></li>
          <li class="{{ ($route == 'publish.review')? 'active':''}}"><a href="{{route('publish.review')}}"><i class="ti-more"></i>Publish Review</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($orders == true)
      <li class="treeview {{ ($prefix == '/orders')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Orders</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'pending-orders')? 'active':''}}"><a href="{{route('pending-orders')}}"><i class="ti-more"></i>Pending Orders</a></li>
          <li class="{{ ($route == 'confirmed-orders')? 'active':''}}"><a href="{{route('confirmed-orders')}}"><i class="ti-more"></i>Confirmed Orders</a></li>
          <li class="{{ ($route == 'proccessing-orders')? 'active':''}}"><a href="{{route('proccessing-orders')}}"><i class="ti-more"></i>Proccessing Orders</a></li>
          <li class="{{ ($route == 'shipped-orders')? 'active':''}}"><a href="{{route('shipped-orders')}}"><i class="ti-more"></i>Shipped Orders</a></li>
          <li class="{{ ($route == 'delivered-orders')? 'active':''}}"><a href="{{route('delivered-orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>
          <li class="{{ ($route == 'cancel-orders')? 'active':''}}"><a href="{{route('cancel-orders')}}"><i class="ti-more"></i>Cancel Orders</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($returnorder == true)
      <li class="treeview {{ ($prefix == '/return')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Return Orders</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'return.request')? 'active':''}}"><a href="{{route('return.request')}}"><i class="ti-more"></i>Return Request</a></li>
          <li class="{{ ($route == 'all.request')? 'active':''}}"><a href="{{route('all.request')}}"><i class="ti-more"></i>All Request</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($reports == true)
      <li class="treeview {{ ($prefix == '/reports')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>All Reports</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.reports')? 'active':''}}"><a href="{{route('all.reports')}}"><i class="ti-more"></i>All Orders reports</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($allusers == true)
      <li class="treeview {{ ($prefix == '/allusers')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Menage Clients</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.users')? 'active':''}}"><a href="{{route('all.users')}}"><i class="ti-more"></i>Menage Clients</a></li>
        </ul>
      </li>
      @else
      @endif

      @if($adminuserrole == true)
      <li class="treeview {{ ($prefix == '/adminuserrole')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Admin User Role</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.admin.user')? 'active':''}}"><a href="{{route('all.admin.user')}}"><i class="ti-more"></i>All Admin User</a></li>
        </ul>
      </li>
      @else
      @endif

    </ul>
  </section>

  <div class="sidebar-footer">
    <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>
</aside>