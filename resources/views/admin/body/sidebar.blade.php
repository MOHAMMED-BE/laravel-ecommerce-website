@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
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
            <!-- <img src="{{ asset('backend/images/logo-dark.png') }}" alt=""> -->
            <h3>BMS Dashboard</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{ ($route == 'dashboard')? 'active':''}}">
        <a href="{{url('admin/dashboard')}}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview {{ ($prefix == '/brand')? 'active':''}}">
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Brands</span>
          <span class="test" style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.brand')? 'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brand</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/category')? 'active':''}}">
        <a href="#">
          <i data-feather="mail"></i> <span>Category</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all.category')? 'active':''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
          <li class="{{ ($route == 'all.subcategory')? 'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li>
          <li class="{{ ($route == 'all.subsubcategory')? 'active':''}}"><a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/product')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Products</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'add-product')? 'active':''}}"><a href="{{route('add-product')}}"><i class="ti-more"></i>Add Products</a></li>
          <li class="{{ ($route == 'menage-product')? 'active':''}}"><a href="{{route('menage-product')}}"><i class="ti-more"></i>Menage Products</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/slider')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Slider</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'menage-slider')? 'active':''}}"><a href="{{route('menage-slider')}}"><i class="ti-more"></i>Menage Slider</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/coupon')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Coupons</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'menage-coupon')? 'active':''}}"><a href="{{route('menage-coupon')}}"><i class="ti-more"></i>Menage Coupon</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/shipping')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Shipping Area</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'menage-division')? 'active':''}}"><a href="{{route('menage-division')}}"><i class="ti-more"></i>Ship Country</a></li>
          <li class="{{ ($route == 'menage-district')? 'active':''}}"><a href="{{route('menage-district')}}"><i class="ti-more"></i>Ship Region</a></li>
          <li class="{{ ($route == 'menage-state')? 'active':''}}"><a href="{{route('menage-state')}}"><i class="ti-more"></i>Ship City</a></li>
        </ul>
      </li>


      <li class="treeview {{ ($prefix == '/blog')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Menage Blog</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'blog.category')? 'active':''}}"><a href="{{route('blog.category')}}"><i class="ti-more"></i>Blog Category</a></li>
          <li class="{{ ($route == 'view.post')? 'active':''}}"><a href="{{route('view.post')}}"><i class="ti-more"></i>Blog Post List</a></li>
          <li class="{{ ($route == 'add.post')? 'active':''}}"><a href="{{route('add.post')}}"><i class="ti-more"></i>Add Blog Post</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/setting')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Menage Setting</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'site.setting')? 'active':''}}"><a href="{{route('site.setting')}}"><i class="ti-more"></i>Site Setting</a></li>
          <li class="{{ ($route == 'seo.setting')? 'active':''}}"><a href="{{route('seo.setting')}}"><i class="ti-more"></i>Seo Setting</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/return')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Rerurn Order</span>
          <span style="float: right;">
            <!-- class="pull-right-container" -->
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'return.request')? 'active':''}}"><a href="{{route('return.request')}}"><i class="ti-more"></i>Return Request</a></li>
          <li class="{{ ($route == 'all.request')? 'active':''}}"><a href="{{route('all.request')}}"><i class="ti-more"></i>All Request</a></li>
        </ul>
      </li>





      <li class="header nav-small-cap">Menage Orders</li>

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
          <li class="{{ ($route == 'picked-orders')? 'active':''}}"><a href="{{route('picked-orders')}}"><i class="ti-more"></i>Picked Orders</a></li>
          <li class="{{ ($route == 'shipped-orders')? 'active':''}}"><a href="{{route('shipped-orders')}}"><i class="ti-more"></i>Shipped Orders</a></li>
          <li class="{{ ($route == 'delivered-orders')? 'active':''}}"><a href="{{route('delivered-orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>
          <li class="{{ ($route == 'cancel-orders')? 'active':''}}"><a href="{{route('cancel-orders')}}"><i class="ti-more"></i>Cancel Orders</a></li>
        </ul>
      </li>


      <li class="treeview {{ ($prefix == '/reports')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>All Reports</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all-reports')? 'active':''}}"><a href="{{route('all-reports')}}"><i class="ti-more"></i>All reports</a></li>
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/allusers')? 'active':''}}">
        <a href="#">
          <i data-feather="file"></i>
          <span>All Users</span>
          <span style="float: right;">
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($route == 'all-users')? 'active':''}}"><a href="{{route('all-users')}}"><i class="ti-more"></i>All Users</a></li>
        </ul>
      </li>

      <!-- <li class="treeview">
        <a href="#">
          <i data-feather="grid"></i>
          <span>Components</span>
          <span style="float: right;" > class="pull-right-container"
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
          <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
          <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="credit-card"></i>
          <span>Cards</span>
          <span style="float: right;" > class="pull-right-container"
            <i class="fa-solid fa-angle-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
          <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
          <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
        </ul>
      </li> -->

    </ul>
  </section>

  <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>
</aside>