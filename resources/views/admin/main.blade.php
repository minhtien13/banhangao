<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>

<div class="p-2 bg-info">
    <div class="row">
        <div class="col-6">
            <div class="d-flex align-items-center">
                <span>Admin</span>
            </div>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end align-items-center">
                <span class="d-black mr-2 text-capitalize">{{ \Auth::user()->name }}</span>
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" width="25" height="25" alt="User Image">
            </div>
        </div>
    </div>
</div>

<body class="hold-transition sidebar-mini">
  @include('admin.header')

  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        @include('admin.slidebar')
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content mt-5">
      @include('admin.alert')
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{  $title }}</h3>
              </div>

              @yield('container')


            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
 @include('admin.footer')
