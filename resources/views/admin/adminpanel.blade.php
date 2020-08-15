
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCC7UB6_0R6HSp0hfCyUJDAKtPWWgeplQg"></script>-->
  <script>
  </script>
  <title>MAFTAH-AGENCY | ADMIN</title>

  <!-- Font Awesome Icons -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="icon"
  type="image/png"
  href="../img/logo2.png">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>


    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar"  @keyup="searchit" v-model="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MAFTAH-AGENCY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <router-link name='admin' :to="{name:'admin'}" class="nav-link">
                <i class="fas fa-chart-line"></i>
                  <p>
                    Dashboard
                  </p>
                </router-link>
              </li>
          <li class="nav-item">
            <router-link to="/Listcategory" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categorie
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/Listsubcategory" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                SubCategorie
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/ListUsers" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/ListArticle" class="nav-link">
                <i class="fas fa-store"></i>
              <p>
                Articles
              </p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link name='admin' to="/listblog" class="nav-link">
            <i class="fas fa-blog"></i>
              <p>
                blogs
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/map" class="nav-link">
                <i class="fas fa-map"></i>
              <p>
                map
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                           <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>{{ __('Logout') }}</p>
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
          </li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
           <admin-main></admin-main>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      By EL HADDAD
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 <a href="https://adminlte.io">MAFTAH-AGENCY.ma</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
  async defer></script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!--<script src="https://cdn.jsdelivr.net/npm/places.js@1.17.1"></script>-->
<!--<script src="{{ asset('js/index.js') }}" ></script>-->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
