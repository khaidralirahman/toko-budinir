<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Cari Produk - Admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/pickr/pickr-themes.css" />

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('layouts admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          @include('layouts admin.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Table/</span>Produk</h4>
                <!-- Basic Bootstrap Table -->

                <div class="card">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="col">
                            <h5 class="card-header" style="padding: 25px 0px 10px 25px;">Tabel Produk</h5>
                            <p style="padding: 0px 0px 0px 25px">Disini tempat untuk melihat dan menambah Produk</p>
                        </div>
                        <a href="/admin/product/form" class="btn btn-primary" style="height: fit-content; padding: 15px 30px 15px 30px; margin-top: 20px; margin-right: 20px;">Tambah Produk</a>

                    </div>
                    <form action="{{ route('admin.search') }}" method="GET">
                        @csrf
                        <div class="col-md-12 d-flex justify-flex-start justify-content-space-between align-items-center ">
                            <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">cari Produk</h5>
                                <input
                                    type="search"
                                    name="name"
                                    class="form-control"
                                    placeholder="cari produk berdasarkan nam"/>
                              </div>
                              <div  style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">kategori</h5>
                                <select id="categories" class="form-select" name="categories_id">
                                    <option value="" disabled selected>pilih kategori</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ old('category') === $item->category ? 'selected' : '' }}>
                                        {{ $item->category }}
                                    </option>
                                    @endforeach
                                </select>
                              </div>
                              <div style="display: flex; align-items: center; height: fit-content; margin-right: 10px; width: 100%;">
                                <h5 class="card-header" style="font-size: 16px;">tanggal</h5>
                                <input
                                  type="text"
                                  name="updated_at"
                                  class="form-control"
                                  placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                  id="flatpickr-range" />
                              </div>
                            <div style="margin-right: 20px; width: 30%;" >
                                <button type="submit" class="btn btn-outline-primary">
                                    Cari data
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>

                        </div>
                    </form>
                    <div class="table-responsive text-nowrap">
                        <h5 class="card-header d-flex justify-content-center" style="margin: 0px 30px;color: font-size: 20px;">hasil pencarian</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Status</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($search as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->categories->category }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->discount }}</td>
                                <td><span class="badge
                                    @if($item->is_active == '1') bg-label-success
                                    @elseif($item->is_active == '0') bg-label-danger
                                    @endif
                                    me-1">{{ $item->is_active == '1' ? 'Aktif' : 'Tidak Aktif' }}</span>
                                </td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('product.toggleStatus', $item->id) }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item status" type="submit">
                                                    <i class="{{ $item->is_active ? 'ti ti-toggle-right me-2' : 'ti ti-toggle-left me-2' }}"></i>
                                                    {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                </button>
                                            </form>
                                            <a class="dropdown-item" href="{{ route('product.edit', $item->id) }}"><i class="ti ti-pencil me-2"></i> Ubah</a>
                                            <form action="{{ route('product.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item delete"><i
                                                        class="ti ti-trash me-2"></i> Hapus</button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <h5 class="card-header d-flex justify-content-center" style="font-size: 16px; width: 100%;">produk tidak ditemukan</h5>
                            @endforelse
                        </tbody>
                    </table>
                    </div>

                </div>
                <!--/ Basic Bootstrap Table -->

            </div>




            <!-- / Content -->

            <!-- Footer -->
            @include('layouts admin.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('layouts admin.script')
    <!-- Vendors JS -->
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/form-layouts.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/form-validation.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/pickr/pickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/forms-pickers.js"></script>
  </body>
</html>
