<!DOCTYPE html>
<html lang="en">

@php
$seo = App\Models\SeoSetting::find(1);
@endphp

<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="{{$seo->meta_description}}">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="author" content="{{$seo->meta_author}}">
  <meta name="keywords" content="{{$seo->meta_keyword}}">
  <meta name="robots" content="all">
  <script>
  {{"$seo->google_analytics"}}
  </script>
  <title>@yield('title')</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

  <!-- Customizable CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">
  <link rel="icon" href="{{ asset('assets/icons/icon-0.ico')}}">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>

</head>

<body class="cnt-home">
  <!-- ============================================== HEADER ============================================== -->

  @include('frontend.body.header')

  <!-- ============================================== HEADER : END ============================================== -->

  @yield('content')

  <!-- ============================================================= FOOTER ============================================================= -->

  @include('frontend.body.footer')

  <!-- ============================================================= FOOTER : END============================================================= -->

  <script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
  <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('frontend/assets/js/cart.js')}}"></script>
  <script src="{{asset('frontend/assets/js/wishlist.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-632b76a864b62174"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
      case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

      case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

      case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

      case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
  </script>


  <!-- Add To Card Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="product-name"></span></h5>
          <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="" id="product-thumbnail" class="card-img-top" alt="..." style="height: 200px;width: 200px;">
              </div>
            </div>
            <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item">
                  Product Price : <strong id="product-selling-price" class="text-danger"></strong>
                  <del id="product-old-price" style="display: none;"></del>
                </li>
                <li class="list-group-item">Product Code : <strong id="product-code"></strong> </li>
                <li class="list-group-item">Category : <strong id="product-category"></strong> </li>
                <li class="list-group-item">Brand : <strong id="product-brand"></strong> </li>
                <li class="list-group-item">Stock : <span id="product-stock"></span> </li>
              </ul>
            </div>
            <div class="col-md-4">
              <div class="form-group" id="size-group">
                <label for="size">choose Size</label>
                <select class="form-control" id="size" name="product-size">

                </select>
              </div>
              <!-- end form-group -->
              <div class="form-group" id="color-group">
                <label for="color">choose Color</label>
                <select class="form-control" id="color" name="product-color">

                </select>
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" value="1" min="1">
              </div>
              <!-- end form-group -->
            </div>
          </div>
          <!-- end row -->

        </div>
        <div class="modal-footer">
          <input type="hidden" id="product-id">
          <button type="submit" class="btn btn-primary mb-2" onclick="AddToCart()">Add To Cart</button>
          <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Add To Card Modal -->



  <!-- // ========================= applyCoupon Start -->
  <script>
    function applyCoupon() {
      var coupon_name = $('#coupon_name').val();
      $.ajax({
        type: "POST",
        dataType: "json",
        data: {
          coupon_name: coupon_name
        },
        url: "{{url('/coupon-apply')}}",

        success: function(data) {
          couponCalculation();
          if (data.validity == true) {
            $('#coupon-field').hide();
          }

          // Start Message
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })

          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
            })
          } else {
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
            })
          }
          // End Message
        }
      })

    }
    // ========================= applyCoupon end 

    // ========================= couponCalculation Start 

    function couponCalculation() {
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "{{ url('/coupon-calculation') }}",
        success: function(data) {
          if (data.total) {
            $('#coupon-cal-field').html(`
              <tr>
                <th>
                    <div class="cart-sub-total">
                        Subtotal<span class="inner-left-md">$${data.total}</span>
                    </div>
                    <div class="cart-sub-total">
                        Grand total<span class="inner-left-md">$${data.total}</span>
                    </div>
                </th>
              </tr>
            `)
          } // end if
          else {
            $('#coupon-cal-field ').html(`
              <tr>
                <th style="text-align:start;">
                    <div class="cart-sub-total">
                        Subtotal<span class="inner-left-md">$${data.subtotal}</span>
                    </div>
                    <div class="cart-sub-total">
                        Coupon<span class="inner-left-md">${data.coupon_name} <button class="btn-remove" type="submit"><i class="fa-solid fa-trash-can" onclick="CouponRemove()"></i></button></span>
                    </div>
                    <div class="cart-sub-total">
                        Discount Amount<span class="inner-left-md">$${data.discount_amount}</span>
                    </div>
                    <div class="cart-grand-total">
                        Total Amount<span class="inner-left-md">$${data.total_amount}</span>
                    </div>
                </th>
              </tr>
            `)

          } // end else
        }
      })
    }

    couponCalculation();

    // ========================= couponCalculation end 
  </script>

  <script>
    // ========================= CouponRemove Start 

    function CouponRemove() {
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: "{{ url('/coupon-remove') }}",
        success: function(data) {
          couponCalculation();
          $('#coupon-field').show();
          $('#coupon_name').val('');
          // Start Message
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })

          if ($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
            })
          } else {
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
            })
          }
          // End Message

        }
      })
    }

    // ========================= CouponRemove end 
  </script>



  <script>
    // get district 
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function() {
        var division_id = $(this).val();
        if (division_id) {
          $.ajax({
            url: "{{ url('/shipping/district/ajax') }}/" + division_id,
            type: "GET",
            dataType: "json",
            success: function(data) {
              var d = $('select[name="district_id"]').empty();
              $.each(data, function(key, value) {
                $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
              });
            },
          });
        } else {
          alert('danger');
        }
      });

    });
  </script>


</body>

</html>