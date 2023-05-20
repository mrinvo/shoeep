<!DOCTYPE html>
<html lang="en">
@include('admin.layout.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
@include('admin.layout.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.layout.leftbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>



  <!-- /.content-wrapper -->
@include('admin.layout.footer')

  <!-- Control Sidebar -->
@include('admin.layout.rightbar')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layout.script')
</body>
</html>
/admin/
