<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="/" class="mb-15"><img src="{{ asset('assets/') }}/imgs/theme/logo.png" alt="logo" style="width: 300px;"/></a>
                            {{-- <p class="font-lg text-heading">Awesome grocery store website template</p> --}}
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{ asset('assets/') }}/imgs/theme/icons/icon-location.svg" alt="" /><strong>Alamat: </strong> <span>Jl. Bina Mukti No. 7, Komplek Buciper, Kota Cimahi-40512</span></li>
                            <li><img src="{{ asset('assets/') }}/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Hubungi kami:</strong><span>085222944494</span></li>
                            <li><img src="{{ asset('assets/') }}/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>Email:</strong><span>afaga.rahadyan.iu@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">Navigasi</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/">Home</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Kategori</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @forelse ($categories as $item)
                                        <li>
                                            <a href="{{ route('product.category', $item->category) }}">{{ $item->category }}</a>
                                        </li>
                                    @empty
                                        <li>
                                            <a href="/">Belum ada kategori</a>
                                        </li>
                                    @endforelse
                    </ul>
                </div>
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12">
                <p class="font-sm mb-0">&copy; <script>
                    document.write(new Date().getFullYear());
                  </script>
                    <strong class="text-brand">KawanLab4 </strong>All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
