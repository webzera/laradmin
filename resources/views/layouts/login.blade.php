<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin John School</title>

  <!-- Font Awesome Icons 
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">-->

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style type="text/css">
    .btn {
  background-color: DodgerBlue; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 12px 16px; /* Some padding */
  font-size: 16px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
  </style>
   @yield('styles')
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div style="height: 160px;"></div>
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('js/app.js') }}"></script>

  @yield('scripts')

</body>
</html>
