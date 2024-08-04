<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item">
      <div class="control"><input placeholder="Search everywhere..." class="input"></div>
    </div>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item dropdown has-divider">
        <a class="navbar-link">
          <span class="icon"><i class="mdi mdi-menu"></i></span>
          <span>Sample Menu</span>
          <span class="icon">
            <i class="mdi mdi-chevron-down"></i>
          </span>
        </a>
      </div>
      <div class="navbar-item dropdown has-divider has-user-avatar">
        <a class="navbar-link">
        @if(Auth::check())
          <div class="user-avatar">
            <img src="resources/assets/dest/product/{{Auth::user()->image}}" alt="John Doe" class="rounded-full">
          </div>
          <div class="is-user-name"><span>{{Auth::user()->full_name}}</span></div>
          <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          @endif
        </a>
        <div class="navbar-dropdown">
          <a href="{{route('thongtin')}}" class="navbar-item">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            <span>My Profile</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-settings"></i></span>
            <span>Settings</span>
          </a>
          <a class="navbar-item">
            <span class="icon"><i class="mdi mdi-email"></i></span>
            <span>Messages</span>
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="{{route('dangxuat')}}">
            <span class="icon"><i class="mdi mdi-logout"></i></span>
            <span>Log Out</span>
          </a>
        </div>
      </div>
        <a href="https://justboil.me/tailwind-admin-templates" class="navbar-item has-divider desktop-icon-only">
      <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
      <span>About</span>
      </a>
      <a href="https://github.com/justboil/admin-one-tailwind" class="navbar-item has-divider desktop-icon-only">
        <span class="icon"><i class="mdi mdi-github-circle"></i></span>
        <span>GitHub</span>
      </a>
      <a title="Log out" class="navbar-item desktop-icon-only">
        <span class="icon"><i class="mdi mdi-logout"></i></span>
        <span>Log out</span>
      </a>
    </div>
  </div>
</nav>

<aside class="aside is-placed-left is-expanded">
    <span onclick="toggleIcon()" class="icon" style="color:white;width:50px;font-size:30px;margin:10px;float:right;"><i id="toggleIcon" class="mdi mdi-arrow-left-drop-circle-outline"></i></span>
  <div class="aside-tools">
    <div>
      Admin <b class="font-black">One</b>
    </div>
  </div>
  <div class="menu is-menu-main" id="menu">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li class="active">
        <a href="index.html">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Examples</p>
    <ul class="menu-list">
      <li class="--set-active-tables-html">
        <a href="{{route('danhsachsanpham')}}">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Sản phẩm</span>
        </a>
      </li>
      <li class="--set-active-forms-html">
        <a href="{{route('themsanpham')}}">
          <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
          <span class="menu-item-label">Thêm sản phẩm</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="{{route('danhsachnguoidung')}}">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Người dùng</span>
        </a>
      </li>
      <li>
        <a href="{{route('dangxuatadmin')}}">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          <span class="menu-item-label">Đăng xuất</span>
        </a>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Danh sách loại </span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
         <li>
            <a href="{{route('danhsachloai')}}">
              <span>Danh sách</span>
            </a>
          </li>
          <li>
            <a href="{{route('themloaisanpham')}}">
              <span>Thêm loại</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Khách hàng</span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
         <li>
            <a href="{{route('danhsachkhachhang')}}">
              <span>Danh sách</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Đơn hàng </span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="{{route('danhsachdon')}}">
              <span>Danh sách đơn hàng </span>
            </a>
          </li>   
        </ul>
      </li>
      <li>
        <a class="dropdown">
          <span class="icon"><i class="mdi mdi-view-list"></i></span>
          <span class="menu-item-label">Thêm người dùng </span>
          <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
          <li>
            <a href="{{route('themnguoidung')}}">
              <span>Thêm</span>
            </a>
          </li>   
        </ul>
      </li>
    </ul>
    <p class="menu-label">About</p>
    <ul class="menu-list">
      <li>
        <a href="https://justboil.me" onclick="alert('Coming soon'); return false" target="_blank" class="has-icon">
          <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
          <span class="menu-item-label">Premium Demo</span>
        </a>
      </li>
      <li>
        <a href="https://justboil.me/tailwind-admin-templates" class="has-icon">
          <span class="icon"><i class="mdi mdi-help-circle"></i></span>
          <span class="menu-item-label">About</span>
        </a>
      </li>
      <li>
        <a href="https://github.com/justboil/admin-one-tailwind" class="has-icon">
          <span class="icon"><i class="mdi mdi-github-circle"></i></span>
          <span class="menu-item-label">GitHub</span>
        </a>
      </li>
    </ul>
  </div>
</aside>





<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
    <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
      <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
      <span>Premium Demo</span>
    </a>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Dashboard
    </h1>
    <button class="button light">Button</button>
  </div>
</section>

  <section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Clients
              </h3>
              <h1>
                {{$user->count()}}
              </h1>
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Sales
              </h3>
              <h1>
              <?php $grandTotal = 0; ?>
                @foreach($bill as $tong)
                    <?php $grandTotal += $tong->total; ?>
                @endforeach

                {{ $grandTotal }} $

              </h1>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Performance
              </h3>
              <h1>
                256%
              </h1>
            </div>
            <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-6">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-finance"></i></span>
          Performance
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="chart-area">
          <div class="h-full">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div></div>
              </div>
            </div>
            <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block" style="height: 400px; width: 1197px;"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="notification blue">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>Table</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div>

    
  </section>
  <script>
  function toggleIcon() {
  var iconElement = document.getElementById('toggleIcon');
  var menuElement = document.getElementById('menu');
  // Kiểm tra xem biểu tượng hiện tại là gì và chuyển đổi thành biểu tượng khác
  if (iconElement.classList.contains('mdi-arrow-right-drop-circle-outline')) {
    iconElement.classList.remove('mdi-arrow-right-drop-circle-outline');
    iconElement.classList.add('mdi-arrow-left-drop-circle-outline');
    iconElement.style.transform = 'rotate(180deg)';
    menuElement.style.opacity = '0'; // Ẩn menu
  } else {
    iconElement.classList.remove('mdi-arrow-left-drop-circle-outline');
    iconElement.classList.add('mdi-arrow-right-drop-circle-outline');
    iconElement.style.transform = 'rotate(0deg)';
    menuElement.style.opacity = '1'; // Hiển thị menu
  }

  // Thực hiện các hành động khác sau khi bấm vào biểu tượng (nếu cần)
  // Ví dụ biểu tượng không xoay
}

</script>