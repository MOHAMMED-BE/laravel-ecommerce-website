@extends('frontend.main_master')
@section('content')
@section('title')
My Cart
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
    <div class="row ">
				<div class="shopping-cart">
					<div class="shopping-cart-table ">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="cart-romove item">Image</th>
										<th class="cart-product-name item">Product Name</th>
										<th class="cart-edit item">Size</th>
										<th class="cart-edit item">color</th>
										<th class="cart-qty item">Quantity</th>
										<th class="item">Subtotal</th>
										<th class="cart-total last-item">Grandtotal</th>
										<th class="cart-total last-item">Remove</th>
									</tr>
								</thead><!-- /thead -->
                            <tbody id="cart-page">
                                
                               
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        
 <!-- ============================================== BRANDS CAROUSEL ============================================== -->

 @include('frontend.body.brands')

<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection