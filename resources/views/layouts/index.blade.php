<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CRUD PRODUCTOS</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="">
    <link href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-scroller d-flex">
    @include('layouts.partials.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('layouts.partials.navbar')

        <div class="container">
            @yield('content')

        </div>
    @include('layouts.partials.footer')

    </div>
</div>



  <!-- base:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/crud.js') }}"></script>
</body>
</html>
