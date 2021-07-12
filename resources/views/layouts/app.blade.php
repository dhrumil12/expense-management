<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/jqvmap/jqvmap.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('assets/dist/css/adminlte.min.css') !!}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/daterangepicker/daterangepicker.css') !!}">
    <!-- summernote -->
    <link rel="stylesheet" href="{!! asset('assets/plugins/summernote/summernote-bs4.min.css') !!}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .container{
            margin-top: 3%;
        }
        .logout:link {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
              </ul>

              <!-- Right navbar links -->
              <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <a class="logout" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }} <i class="fas fa-sign-out-alt" title='Logout'></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

              </ul>
            </nav>
            <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
              <span class="brand-text font-weight-light">Expense Management</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="{!! asset('assets/dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">@if (Route::has('login')) {{ Auth::user()->name }} @endif</a>
                </div>
              </div>


              <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item">
                    <a href="{{ URL::to('expense') }}" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Expense
                      </p>
                    </a>
                  </li>

                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">

              @yield('content')

          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="#">Expense Management</a>.</strong>
            All rights reserved.
          </footer>

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <!-- /.control-sidebar -->
        </div>
    </div>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('assets/plugins/chart.js/Chart.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('assets/plugins/sparklines/sparkline.js') !!}"></script>
<!-- JQVMap -->
<script src="{!! asset('assets/plugins/jqvmap/jquery.vmap.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('assets/plugins/jquery-knob/jquery.knob.min.js') !!}"></script>
<!-- daterangepicker -->
<script src="{!! asset('assets/plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{!! asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
<!-- Summernote -->
<script src="{!! asset('assets/plugins/summernote/summernote-bs4.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('assets/dist/js/adminlte.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('assets/dist/js/demo.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{!! asset('assets/dist/js/pages/dashboard.js') !!}"></script> -->
@yield('js')
</body>
</html>
