@php
$setting = App\Models\SiteSetting::find(1);
@endphp

<footer id="footer" class="footer color-bg" style=" margin: 5rem 0 0 0; ">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <!-- /.module-heading -->
                    <div class="module-body">
                        <ul class="toggle-footer">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{$setting->company_name}} , {{$setting->company_address}}</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>{{$setting->phone_one}}<br>
                                        {{$setting->phone_two}}
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span>{{$setting->email}}</span> </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div>
                    <!-- /.module-heading -->
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('dashboard')}}">My Account</a></li>
                            <li><a href="{{route('my.orders')}}">Order History</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#">About us</a></li>
                            <li class="last"><a href="{{route('shop.page')}}">Advanced Search</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class=" last"><a href="#" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{$setting->facebook}}" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{$setting->twitter}}" title="Twitter"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{$setting->linkedin}}" title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{$setting->youtube}}" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{asset('frontend/assets/images/payments/1.png')}}" alt=""></li>
                        <li><img src="{{asset('frontend/assets/images/payments/2.png')}}" alt=""></li>
                        <li><img src="{{asset('frontend/assets/images/payments/3.png')}}" alt=""></li>
                        <li><img src="{{asset('frontend/assets/images/payments/4.png')}}" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>