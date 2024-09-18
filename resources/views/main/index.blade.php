<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Afagathelabel</title>
    @include('layouts.header')
</head>

<body>
    <!-- Modal -->
    {{-- @include('layouts.modal') --}}
    @include('layouts.navbar')
    <!--End header-->
    <main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @forelse ($poster as $item )
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('assets/media/' . $item->media) }})">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40" style="color: {{ $item->color }}">
                                    {{ $item->title }}
                                </h1>
                                <p class="mb-65" style="color: {{ $item->color }}">{{ $item->subtitle }}</p>
                            </div>
                        </div>
                        @empty

                        <div class="single-hero-slider single-animation-wrap" style="background-image: url(assets/imgs/slider/slider-1.png)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Don’t miss amazing<br />
                                    grocery deals
                                </h1>
                                <p class="mb-65">Sign up for the daily newsletter</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>Popular Products</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-all" data-bs-toggle="tab" data-bs-target="#tab-all" type="button" role="tab" aria-controls="tab-all" aria-selected="true">All</button>
                        </li>
                        @foreach($categories as $index => $category)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-{{ $category->id }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $category->id }}" type="button" role="tab" aria-controls="tab-{{ $category->id }}" aria-selected="false">{{ $category->category }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <!-- All Products Tab -->
                    <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="nav-tab-all">
                        <div class="row product-grid-4">
                            @foreach ($products as $item)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="/detail-produk/{{ $item->slug }}">
                                                    <img class="default-img" src="{{ asset('assets/head_photo/' . $item->head_photo) }}" alt="" />
                                                    <img class="hover-img" src="{{ asset('assets/head_photo_back/' . $item->head_photo_back) }}" alt="" />
                                                </a>
                                            </div>
                                            @if($item->label)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot" style="background-color: {{ $item->label->color }};">
                                                        {{ $item->label->label }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                @if($item->categories && $item->categories->category)
                                                    <a href="{{ route('product.category', $item->categories->category) }}">{{ $item->categories->category }}</a>
                                                @else
                                                    <span>Tidak ada kategori</span> <!-- Optional: Display a placeholder text -->
                                                @endif
                                            </div>
                                            <h2><a href="/detail-produk/{{ $item->slug }}">{{ $item->name }}</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 100%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted">(5.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a href="">{{ $item->store }}</a></span>
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
                            @endforeach
                        </div>
                    </div>

                    <!-- Individual Category Tabs -->
                    @foreach($categories as $index => $category)
                        <div class="tab-pane fade" id="tab-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-tab-{{ $category->id }}">
                            <div class="row product-grid-4">
                                @foreach ($products->where('categories_id', $category->id) as $item)
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="/detail-produk/{{ $item->slug }}">
                                                        <img class="default-img" src="{{ asset('assets/head_photo/' . $item->head_photo) }}" alt="" />
                                                        <img class="hover-img" src="{{ asset('assets/head_photo_back/' . $item->head_photo_back) }}" alt="" />
                                                    </a>
                                                </div>
                                                @if($item->label)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot" style="background-color: {{ $item->label->color }};">
                                                        {{ $item->label->label }}
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="{{ route('product.category', $item->categories->category) }}">{{ $item->categories->category }}</a>
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
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class="">Daily Best Sells</h3>
                    <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100">Bring nature into your home</h2>
                                <a href="/" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @forelse ($products5 as $item )
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="/detail-produk/{{ $item->slug }}">
                                                            <img class="default-img" src="{{ asset('assets/head_photo/' . $item->head_photo) }}" alt="" />
                                                            <img class="hover-img" src="{{ asset('assets/head_photo_back/' . $item->head_photo_back) }}" alt="" />
                                                        </a>
                                                    </div>
                                                    @if($item->label)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot" style="background-color: {{ $item->label->color }};">
                                                        {{ $item->label->label }}
                                                    </span>
                                                </div>
                                            @endif
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        @if($item->categories && $item->categories->category)
                                                            <a href="{{ route('product.category', $item->categories->category) }}">{{ $item->categories->category }}</a>
                                                        @else
                                                            <span>Tidak ada kategori</span> <!-- Optional: Display a placeholder text -->
                                                        @endif
                                                    </div>
                                                    <h2><a href="/detail-produk/{{ $item->slug }}">{{ $item->name }}</a></h2>
                                                    <div class="product-rate-cover">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 100%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted">(5.0)</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-small text-muted">By <a href="">{{ $item->store }}</a></span>
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
                                        @empty

                                        @endforelse
                                        <!--End product Wrap-->
                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->
                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
    <!-- Preloader Start -->
    {{-- @include('layouts.preloader') --}}
    <!-- Vendor JS-->
    @include('layouts.script')
</body>

</html>
