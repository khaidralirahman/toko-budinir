<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="#" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{ asset('assets/') }}/imgs/theme/logo.png" alt="" width="40px" height="40px">
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Super admin</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      {{-- <li class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a href="/admin/dashboard" class="menu-link">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li> --}}
      <li class="menu-item {{ Request::is('admin/product') ? 'active' : '' }}">
        <a href="/admin/product" class="menu-link">
            <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
            <div data-i18n="Produk">Produk</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('admin/categories') ? 'active' : '' }}">
        <a href="/admin/categories" class="menu-link">
            <i class="menu-icon tf-icons ti ti-category"></i>
            <div data-i18n="Kategori">Kategori</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('admin/label') ? 'active' : '' }}">
        <a href="/admin/label" class="menu-link">
            <i class="menu-icon tf-icons ti ti-tags"></i>
            <div data-i18n="Label">Label</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('admin/logo') ? 'active' : '' }}">
        <a href="/admin/logo" class="menu-link">
            <i class="menu-icon tf-icons ti ti-photo-edit"></i>
            <div data-i18n="Logo">Logo</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('admin/poster') ? 'active' : '' }}">
        <a href="/admin/poster" class="menu-link">
            <i class="menu-icon tf-icons ti ti-photo-edit"></i>
            <div data-i18n="Poster">Poster</div>
        </a>
      </li>
      {{-- <li class="menu-item {{ Request::is('admin/tentang-saya') ? 'active' : '' }}">
        <a href="/admin/tentang-saya" class="menu-link">
            <i class="menu-icon tf-icons ti ti-user"></i>
            <div data-i18n="Tentang saya">Tentang saya</div>
        </a>
      </li> --}}
    </ul>
  </aside>
  <!-- / Menu -->
