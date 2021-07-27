<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables -->
  <script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- AdminLTE App -->
  <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('AdminLTE') }}/dist/js/demo.js"></script>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-messaging.js"></script>

    <style type="text/css">
        .preloader {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 9999;
          background-color: #fff;
        }
        .preloader .loading {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%,-50%);
          font: 14px arial;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="preloader">
        <div class="loading text-center">
          <img src="{{ asset('loading.gif') }}" width="200%">
        </div>
      </div>
<div class="wrapper" id="app">
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
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="fas fa-th-large"></i>
                Logout
            </a>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-red elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ auth()->user()->name }}</span>
    </a>
    <br>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-header">BERANDA</li>
              <li class="nav-item">
                  <a href="/home" class="nav-link {{request()->is('home')? 'active': ''}}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Home
                      </p>
                  </a>
              </li>
              <li class="nav-header">MENU</li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Master Menu
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                @if (auth()->user()->level=='admin')
                  <li class="nav-item">
                    <a href="/pendaftar" class="nav-link {{request()->is('pendaftar')? 'active': ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pendaftar</p>
                    </a>
                  </li>
                @endif
                @if (auth()->user()->level=='admin')
                    <li class="nav-item">
                        <a href="/admin/kehadiran" class="nav-link {{request()->is('admin/kehadiran')? 'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kehadiran</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->level=='user')
                  <li class="nav-item">
                    <a href="/kehadiran" class="nav-link {{request()->is('kehadiran')? 'active': ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kehadiran</p>
                    </a>
                  </li>
                @endif
                  <li class="nav-item">
                    <a href="/materi" class="nav-link {{request()->is('materi')? 'active': ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Materi</p>
                    </a>
                  </li>
                  @if (auth()->user()->level=='user')
                    <li class="nav-item">
                        <a href="/soal" class="nav-link {{request()->is('soal')? 'active': ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ujian</p>
                        </a>
                    </li>
                  @endif
                  @if (auth()->user()->level=='admin')
                    <li class="nav-item">
                        <a href="/ujian" class="nav-link {{request()->is('ujian')? 'active': ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Soal</p>
                        </a>
                    </li>
                  @endif
                </ul>
              </li>

                @if (auth()->user()->level=='admin')
                    <li class="nav-header">STATUS</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Master STATUS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/lolos" class="nav-link {{request()->is('lolos')? 'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar layanan Lolos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tidak" class="nav-link {{request()->is('tidak')? 'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Daftar layanan Tidak Lolos</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->level=='user')
                <li class="nav-item">
                    <a href="/cetak/pdf" class="nav-link {{request()->is('cetak/pdf')? 'active': ''}}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Cetak Sertifikat
                        </p>
                    </a>
                </li>
                @endif
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('judul1')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         @yield('content')
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 </strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script>
    window.setTimeout(function(){
      $(".alert").fadeTo(500,0).slideUp(500,function(){
        $(this).remove();
      });
    },3000)
    //Preloading
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script>
  @stack('modals')
</body>
</html>
