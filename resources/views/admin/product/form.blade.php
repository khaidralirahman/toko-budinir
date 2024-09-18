<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Tambah Produk - super admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/dropzone/dropzone.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Produk</h4>


                    <!-- Add Product -->
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                          <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-1 mt-3">Tambah Produk Baru</h4>
                              <p class="text-muted">Orders placed across your store</p>
                          </div>
                          <div class="d-flex align-content-center flex-wrap gap-3">
                              <button type="submit" class="btn btn-primary">Publis Produk</button>
                          </div>
                      </div>

                      <div class="row">
                          <!-- First column-->
                          <div class="col-12 col-lg-8">
                              <!-- Product Information -->
                              <div class="card mb-4">
                                  <div class="card-header">
                                      <h5 class="card-title mb-0">Informasi Produk</h5>
                                  </div>
                                  <div class="card-body">
                                      <div class="mb-3">
                                          <label class="form-label" for="ecommerce-product-name">Nama Produk</label>
                                          <input
                                              type="text"
                                              class="form-control"
                                              id="ecommerce-product-name"
                                              placeholder="Nama Produk"
                                              name="name"
                                              aria-label="Nama Produk" />
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label" for="ecommerce-product-name">Thumbnail foto bagian depan</label>
                                          <input
                                              type="file"
                                              class="form-control"
                                              id="ecommerce-product-name"
                                              placeholder="Thumbnail foto bagian depan"
                                              name="head_photo"
                                              aria-label="Thumbnail foto bagian depan" />
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label" for="ecommerce-product-name">Thumbnail foto bagian belakang</label>
                                          <input
                                              type="file"
                                              class="form-control"
                                              id="ecommerce-product-name"
                                              placeholder="Thumbnail foto bagian belakang"
                                              name="head_photo_back"
                                              aria-label="Thumbnail foto bagian belakang" />
                                      </div>
                                      <div class="mb-3">
                                          <label class="form-label" for="ecommerce-product-name">Nomor Hp yang bisa dihubungi</label>
                                          <input
                                              type="text"
                                              class="form-control"
                                              id="ecommerce-product-name"
                                              placeholder="Nomor Hp yang bisa dihubungi"
                                              name="phone"
                                              aria-label="Nomor Hp yang bisa dihubungi" />
                                      </div>
                                      <!-- Description -->
                                      <div class="mb-3">
                                          <label for="description" class="form-label">Deskripsi (opsional)</label>
                                          <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                                          <trix-editor input="description" placeholder="Tulis sesuatu..."></trix-editor>
                                      </div>
                                      <form class="form-repeater">
                                          <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                              <div class="row">
                                                <div class="mb-3 col-lg-6 col-xl-10 col-12 mb-0">
                                                  <label class="form-label" for="form-repeater-1-1">Masukan Media</label>
                                                  <input type="file" id="form-repeater-1-1" name="media[]" class="form-control" placeholder="input tag" value="{{ old('question') }}"/>
                                                </div>
                                                <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                  <button class="btn btn-label-danger mt-4" data-repeater-delete>
                                                    <i class="ti ti-x ti-xs me-1"></i>
                                                    <span class="align-middle">Delete</span>
                                                  </button>
                                                </div>
                                              </div>
                                              <hr />
                                            </div>
                                          </div>
                                          <div class="mb-0">
                                            <button class="btn btn-primary" data-repeater-create>
                                              <i class="ti ti-plus me-1"></i>
                                              <span class="align-middle">Add</span>
                                            </button>
                                          </div>
                                        </form>
                                  </div>
                              </div>
                              <!-- /Product Information -->
                          </div>

                          <!-- Second column -->
                          <div class="col-12 col-lg-4">
                              <!-- Pricing Card -->
                              <div class="card mb-4">
                                  <div class="card-header">
                                      <h5 class="card-title mb-0">Harga</h5>
                                  </div>
                                  <div class="card-body">
                                    <!-- Base Price -->
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-product-price">Harga Produk</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ecommerce-product-price"
                                            placeholder="Harga Produk"
                                            name="price"
                                            aria-label="Harga Produk"
                                            oninput="formatPrice(this)" />
                                    </div>
                                    <!-- Discounted Price -->
                                    <div class="mb-3">
                                        <label class="form-label" for="ecommerce-product-discount-price">Harga Discount (opsional)</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ecommerce-product-discount-price"
                                            placeholder="Harga Discount"
                                            name="discount"
                                            aria-label="Harga Discount"
                                            oninput="formatPrice(this)" />
                                    </div>
                                </div>
                              </div>
                              <!-- /Pricing Card -->

                              <!-- Organize Card -->
                              <div class="card mb-4">
                                  <div class="card-header">
                                      <h5 class="card-title mb-0">Organize</h5>
                                  </div>
                                  <div class="card-body">
                                      <!-- Category -->
                                      <div class="mb-3">
                                        <label class="form-label" for="ecommerce-product-name">Nama toko</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ecommerce-product-name"
                                            placeholder="Masukan nama toko"
                                            name="store"
                                            aria-label="Product title" />
                                        </div>
                                      <div class="mb-3 col ecommerce-select2-dropdown">
                                          <label class="form-label mb-1" for="category-org">Kategori</label>
                                          <select id="category-org" class="select2 form-select" name="categories_id" data-placeholder="Select Category">
                                              <option value="">pilih Kategori</option>
                                              @foreach ($categories as $item)
                                                  <option value="{{ $item->id }}">{{ $item->category }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <!-- Status -->
                                      <div class="mb-3 col ecommerce-select2-dropdown">
                                          <label class="form-label mb-1" for="status-org">Label</label>
                                          <select id="status-org" class="select2 form-select" name="labels_id" data-placeholder="Published">
                                              <option value="">Pilih label</option>
                                              @foreach ($label as $item)
                                                  <option value="{{ $item->id }}">{{ $item->label }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="mb-3 col ecommerce-select2-dropdown">
                                          <label class="form-label mb-1" for="status-org">Status</label>
                                          <select id="status-org" class="select2 form-select" name="is_active" data-placeholder="Published">
                                              <option value="1">Publis Produk</option>
                                              <option value="0">Draft</option>
                                          </select>
                                      </div>
                                      <div class="mb-3">
                                        <label class="form-label" for="ecommerce-product-name">Ukuran</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ecommerce-product-name"
                                            placeholder="Masukan ukuran"
                                            name="size"
                                            aria-label="Product title" />
                                        </div>
                                      <div class="mb-3">
                                        <label class="form-label" for="ecommerce-product-name">Warna</label>
                                        <div class="col-md-12">
                                            <input class="form-control" type="color" name="color"  />
                                        </div>
                                    </div>
                                      <div class="mb-3">
                                        <label class="form-label" for="ecommerce-product-name">Link</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="ecommerce-product-name"
                                            placeholder="Masukan Link"
                                            name="link"
                                            aria-label="Product title" />
                                    </div>
                                  </div>
                              </div>
                              <!-- /Organize Card -->
                          </div>
                          <!-- /Second column -->
                      </div>
                  </form>

                  </div>
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

    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/quill/katex.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/quill/quill.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/dropzone/dropzone.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/vendor/libs/tagify/tagify.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/app-ecommerce-product-add.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/forms-file-upload.js"></script>
    <script src="{{ asset('assets admin/assets/') }}/js/forms-extras.js"></script>
    <!-- Main JS -->
    {{-- <script src="{{ asset('assets admin/assets/') }}/js/main.js"></script> --}}

    <!-- Page JS -->
    {{-- <script src="{{ asset('assets admin/assets/') }}/vendor/libs/tagify/tagify.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.submit', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Simpan Artikel?",
            text: "Artikel yang anda simpan bisa di edit kembali",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, simpan sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Artikel berhasil disimpan",
                text: "Selamat menikmati hari anda",
                icon: "success"
                });
            }
            });
        });
    </script>
    <script>
    function formatPrice(input) {
        // Remove all characters except numbers
        let value = input.value.replace(/[^0-9]/g, '');

        // Format number with dot as thousand separators
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Update input value
        input.value = value;
    }
    </script>
  </body>
</html>
