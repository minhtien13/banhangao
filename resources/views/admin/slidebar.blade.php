<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     
      @if (\Auth::user()->level == 1)
        @include('admin.setting')
      @endif

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-bars"></i>
          <p>
            Menu
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
    
          <li class="nav-item">
            <a href="/admin/menu/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/menu/list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fab fa-product-hunt"></i>
          <p>
            sản phẩm
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/admin/product/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Thêm mới</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/product/list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-shopping-cart"></i>
          <p>
            Kiểm tra đơn hàng
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/admin/cart/list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Xem đơn hàng</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Thoát
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/user/logout" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dăng xuất</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>