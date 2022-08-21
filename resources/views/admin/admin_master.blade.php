<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('backend/images/favicon.ico')}}">
  <!-- <link rel="icon" href="../../../public/{{ asset('')}}backend/images/favicon.ico"> -->

  <title>Easy Ecommerce Admin - Dashboard</title>

  <!-- Vendors Style-->
  <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css')}}">

  <!-- Style-->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> -->

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


    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->


  <!-- Vendor JS -->
  <script src="{{ asset('backend/js/vendors.min.js')}}"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
  <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

  <!-- Sunny Admin App -->
  <script src="{{ asset('backend/js/template.js')}}"></script>
  <script src="{{ asset('backend/js/pages/dashboard.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{ asset('backend/js/pages/data-table.js')}}"></script>

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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <script type="text/javascript">
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
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      });
    });
  </script> -->
  <!-- <script>
 $(document).ready(function() {
 @if(Session::has('message'))
 toastr.options =
 {
 "closeButton" : true,
 "progressBar" : true
 }
 toastr.success("{{ session('message') }}");
 @endif
 
 @if(Session::has('error'))
 toastr.options =
 {
 "closeButton" : true,
 "progressBar" : true
 }
 toastr.error("{{ session('error') }}");
 @endif
 
 @if(Session::has('info'))
 toastr.options =
 {
 "closeButton" : true,
 "progressBar" : true
 }
 toastr.info("{{ session('info') }}");
 @endif
 
 @if(Session::has('warning'))
 toastr.options =
 {
 "closeButton" : true,
 "progressBar" : true
 }
 toastr.warning("{{ session('warning') }}");
 @endif
 }); 
</script> -->


</body>

</html>