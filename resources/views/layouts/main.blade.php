<!DOCTYPE html>
<html lang="en">

<head>
  <title>Webzera Admin Panel</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vendor/laradmin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('vendor/laradmin/img/favicon.png') }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{ asset('vendor/laradmin/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet">
  <link href="{{ asset('vendor/laradmin/demo/demo.css') }}" rel="stylesheet" />
  {{-- <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" /> --}}
</head>

<body>
  <div class="wrapper ">
    @include('admin::layouts.sidenav')
    <div class="main-panel">
      <!-- Navbar -->
      @include('admin::layouts.nav')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      @include('admin::layouts.footer')
    </div>
  </div>
</body>
<script src="{{ asset('vendor/laradmin/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/laradmin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('vendor/laradmin/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('vendor/laradmin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('vendor/laradmin/js/material-dashboard.js?v=2.1.2') }}"></script>
</html>