<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <title>Formulir kategori - super admin</title>
    @include('layouts admin.header')
    {{-- page css --}}
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="{{ asset('assets admin/assets/') }}/vendor/libs/dropzone/dropzone.css" />
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
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
                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Formulir kategori</h4>

                <!-- Bootstrap Validation -->
                <div class="col-md">
                    <div class="card">
                      <h5 class="card-header">Kategori</h5>
                      <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="defaultInput" class="form-label">category</label>
                                <input id="defaultInput" @error('category') is-invalid @enderror name="category"
                                    class="form-control" type="text" placeholder=" category" autofocus
                                    value="{{ old('category') }}" />
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Icon</label>
                                <input class="form-control" name="media" type="file" id="formFile"/>
                            </div>
                          <div class="row">
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary submit">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="card-body">
                      </div>
                    </div>
                </div>
                  <!-- /Bootstrap Validation -->
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
    <script src="{{ asset('assets admin/assets/') }}/js/forms-extras.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.submit', function(e){
            var notificationid = $(this).attr('data-id');
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
            title: "Simpan kategori?",
            text: "kategori yang anda simpan bisa di edit kembali",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, simpan sekarang"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "kategori berhasil disimpan",
                text: "Selamat menikmati hari anda",
                icon: "success"
                });
            }
            });
        });
    </script>
  </body>
</html>