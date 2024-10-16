  <nav class="mt-1">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
          <i class="nav-icon fas fa-link"></i>
          <p>
            kết nối mạng xa hội
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/admin/soclai/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tạo mới kết nối</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/soclai/list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách kết nối</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fas fa-pencil-alt"></i>
          <p>
            Chính sách
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/admin/policy/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tạo mới chính sách</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/policy/list" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách chính sách</p>
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

      <li class="nav-item mt-auto">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Tài khoản của tôi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/account/chang/{{ \Auth::user()->id }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chỉnh sửa thông tin</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/admin/account/password/{{ \Auth::user()->id }}" class="nav-link">
                <i class="fas fa-lock nav-icon"></i>
                <p>đổi mật khẩu</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/user/logout" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Dăng xuất</p>
              </a>
            </li>
        </ul>
      </li>

      @if (\Auth::user()->level == 1)
        @include('admin.setting')
      @endif
    </ul>
  </nav>
