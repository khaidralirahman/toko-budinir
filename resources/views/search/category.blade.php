<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Pencarian Kategori</title>
    @include('layouts.header')
</head>

<body>
    <!-- Modal -->
    {{-- @include('layouts.modal') --}}
    @include('layouts.navbar')
    <!--End header-->
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <h1 class="mb-15">Hasil pencarian dari {{ $category->category }}</h1>
                            <div class="breadcrumb">
                                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Kategori <span></span> {{ $category->category }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-12">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Kami menemukan<strong class="text-brand"> {{ $products->count() }}</strong> produk untuk kamu</p>
                        </div>
                    </div>
                    <div class="row product-grid">
                        @forelse ($products as $item)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="/detail-produk/{{ $item->slug }}">
                                                <img class="default-img" src="{{ asset('assets/head_photo/' . $item->head_photo) }}" alt="" />
                                                <img class="hover-img" src="{{ asset('assets/head_photo_back/' . $item->head_photo_back) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="
                                                @if ($item->label == 'Discount')
                                                    hot
                                                @elseif ($item->label == 'Terlaris')
                                                    sale
                                                @elseif ($item->label == 'Cuci Gudang')
                                                    new
                                                @endif
                                            ">
                                                {{ $item->label }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="/detail-produk/{{ $item->slug }}">{{ $item->categories->category }}</a>
                                        </div>
                                        <h2><a href="/detail-produk/{{ $item->slug }}">{{ $item->name }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 100%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted">(5.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a href="">Khadijah Store</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>Rp.{{ $item->price }}</span>
                                                @if($item->discount)
                                                <span class="old-price">Rp.{{ $item->discount }}</span>
                                                @endif
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="/detail-produk/{{ $item->slug }}"><i class="fi-rs-shopping-cart mr-5"></i>detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3>Produk tidak ditemukan</h3>
                        @endforelse
                    </div>
                    <!--product grid-->
                    {{-- <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                    <!--End Deals-->
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
    <!-- Preloader Start -->
    {{-- @include('layouts.preloader') --}}
    <!-- Vendor JS-->
    @include('layouts.script')
</body>

</html>
