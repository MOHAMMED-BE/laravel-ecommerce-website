<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('assets/icons/icon-0.ico')}}">

  <title>@yield('title')</title>

  <!-- Vendors Style-->
  <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css')}}">

  <!-- Style-->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

  <div class="wrapper">

    @include('admin.body.header')

    @include('admin.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      @yield('admin')

    </div>
    <!-- /.content-wrapper -->

    @include('admin.body.footer')

    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->


  <!-- Vendor JS -->
  <script src="{{ asset('backend/js/vendors.min.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

  <script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
  <script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
  <script src="{{ asset('backend/js/pages/editor.js')}}"></script>

  <!-- Sunny Admin App -->
  <script src="{{ asset('backend/js/template.js')}}"></script>
  <script src="{{ asset('backend/js/pages/dashboard.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{ asset('backend/js/pages/data-table.js')}}"></script>
  <script src="{{ asset('backend/js/order.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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


  <script type="text/javascript">
    $(function() {
      $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Brand has been deleted.',
              'success'
            )
          }
        })
      });
    });
  </script>


  <script type="text/javascript">
    // get category
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
          $.ajax({
            url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
            type: "GET",
            dataType: "json",
            success: function(data) {
              $('select[name="subsubcategory_id"]').html('');
              var d = $('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value) {
                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
              });
            },
          });
        } else {
          alert('danger');
        }
      });


      // <!-- // get district -->
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


      // get subcategory
      $('select[name="subcategory_id"]').on('change', function() {
        var subcategory_id = $(this).val();
        if (subcategory_id) {
          $.ajax({
            url: "{{ url('/product/subsubcategory/ajax') }}/" + subcategory_id,
            type: "GET",
            dataType: "json",
            success: function(data) {

              var d = $('select[name="subsubcategory_id"]').empty();
              $.each(data, function(key, value) {
                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
              });
            },
          });
        } else {
          alert('danger');
        }
      });

    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name="subcategory_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
          $.ajax({
            url: "{{ url('/category/subsubcategory/ajax') }}/" + category_id,
            type: "GET",
            dataType: "json",
            success: function(data) {
              var d = $('select[name="subsubcategory_id"]').empty();
              $.each(data, function(key, value) {
                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
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