<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Detail produk</title>
    @include('layouts.header')
</head>

<body>
    <!-- Modal -->
    {{-- @include('layouts.modal') --}}
    @include('layouts.navbar')
    <!--End header-->
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    @if($product->categories && $product->categories->category)
                        <span></span> <a href="#">{{ $product->categories->category }}</a> <span></span>{{ $product->name }}
                    @else
                        <span></span> <a href="#">Tidak ada kategori</a> <span></span>{{ $product->name }}
                    @endif
                </div>

            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @if($product->media)
                                            @foreach(json_decode($product->media) as $media)
                                                <figure class="border-radius-10">
                                                    <img src="{{ asset($media) }}" alt="product image" />
                                                </figure>
                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        @if($product->media)
                                        @foreach(json_decode($product->media) as $media)
                                            <div>
                                                <img src="{{ asset($media) }}" alt="product image" />
                                            </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    @if($product->label)
                                        <span class="stock-status out-stock" style="background: {{ $product->label->color }};">{{ $product->label->label }}</span>
                                    @endif
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 100%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{ $product->views }} views)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">Rp. {{ $product->price }}</span>
                                            <span>
                                                @if($product->discount)
                                                    <span class="old-price font-md ml-15">Rp.{{ $product->discount }}</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="detail-extralink mb-50">
                                        <div class="product-extra-link2">
                                            {{-- <a href="{{ $product->link }}" target="blank" class="button-add-to-cart"><i class="fi-rs-shopping-cart">shopee</a> --}}
                                            <a href="{{ $product->link }}" target="blank" class="tombol tombol-add-to-cart" style="display: flex; align-items: center; justify-content: center; gap: 5px; width: 150px; background: #3bb77e; color: white;"><i class="fi-rs-shopping-cart"></i>Beli</a>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        @if($product->categories && $product->categories->category)
                                            <ul class="mr-50 float-start">
                                                <li class="mb-5">Type: <span class="text-brand">{{ $product->categories->category }}</span></li>
                                            </ul>
                                            <ul class="float-start">
                                                <li class="mb-5">Tags: <a href="#" rel="tag">{{ $product->categories->category }}</a></li>
                                            </ul>
                                            @else
                                            <ul class="mr-50 float-start">
                                                <li class="mb-5">Type: <span class="text-brand">tidak ada kategori</span></li>
                                            </ul>
                                            <ul class="float-start">
                                                <li class="mb-5">Tags: <a href="#" rel="tag">tidak ada tag</a></li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Deskripsi Produk</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Info lainnya</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>Stand Up</th>
                                                    <td>
                                                        <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>Folded (w/o wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 18.5″W x 16.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>Folded (w/ wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 24″W x 18.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="door-pass-through">
                                                    <th>Door Pass Through</th>
                                                    <td>
                                                        <p>24</p>
                                                    </td>
                                                </tr>
                                                <tr class="frame">
                                                    <th>Frame</th>
                                                    <td>
                                                        <p>Aluminum</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-wo-wheels">
                                                    <th>Weight (w/o wheels)</th>
                                                    <td>
                                                        <p>20 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-capacity">
                                                    <th>Weight Capacity</th>
                                                    <td>
                                                        <p>60 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="width">
                                                    <th>Width</th>
                                                    <td>
                                                        <p>24″</p>
                                                    </td>
                                                </tr>
                                                <tr class="handle-height-ground-to-handle">
                                                    <th>Handle height (ground to handle)</th>
                                                    <td>
                                                        <p>37-45″</p>
                                                    </td>
                                                </tr>
                                                <tr class="wheels">
                                                    <th>Wheels</th>
                                                    <td>
                                                        <p>12″ air / wide track slick tread</p>
                                                    </td>
                                                </tr>
                                                <tr class="seat-back-height">
                                                    <th>Seat back height</th>
                                                    <td>
                                                        <p>21.5″</p>
                                                    </td>
                                                </tr>
                                                <tr class="head-room-inside-canopy">
                                                    <th>Head room (inside canopy)</th>
                                                    <td>
                                                        <p>25″</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_color">
                                                    <th>Color</th>
                                                    <td>
                                                        <p>Black, Blue, Red, White</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_size">
                                                    <th>Size</th>
                                                    <td>
                                                        <p>M, S</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
