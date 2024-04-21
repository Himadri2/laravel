@extends('layouts.base')
@section('content')
<section class="pt-0 poster-section">
    <div class="poster-image slider-for custome-arrow classic-arrow">
        <div>
            <img src="{{ asset('assets/images/furniture-images/poster/1.png') }}" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="{{ asset('assets/images/furniture-images/poster/2.png') }}" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="{{ asset('assets/images/furniture-images/poster/3.png') }}" class="img-fluid blur-up lazyload" alt="">
        </div>
    </div>
    <div class="slider-nav image-show">
        <div>
            <div class="poster-img">
                <img src="{{ asset('assets/images/furniture-images/poster/t2.jpg') }}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="poster-img">
                <img src="{{ asset('assets/images/furniture-images/poster/t1.jpg') }}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>

        </div>
        <div>
            <div class="poster-img">
                <img src="{{ asset('assets/images/furniture-images/poster/t3.jpg') }}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-contain">
        <div class="banner-left">
            <h4>Sale <span class="theme-color">35% Off</span></h4>
            <h1>New Latest <span>Dresses</span></h1>
            <p>BUY ONE GET ONE <span class="theme-color">FREE</span></p>
        </div>
    </div>
</section>

<!-- banner section start -->
<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{ route('shop.index') }}" class="banner-img">
                        <img src="{{ asset('assets/images/fashion/banner/1.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <span class="font-dark-30">26% <span>OFF</span></span>
                    </div>
                    <a href="{{ route('shop.index') }}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">New Hoodie</h2>
                            <span>BUY ONE GET ONE FREE</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{ route('shop.index') }}" class="banner-img">
                        <img src="{{ asset('assets/images/fashion/banner/2.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <span class="font-dark-30">50% <span>OFF</span></span>
                    </div>
                    <a href="{{ route('shop.index') }}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Women Fashion</h2>
                            <span>New offer 50% off</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{ route('shop.index') }}" class="banner-img">
                        <img src="{{ asset('assets/images/fashion/banner/3.jpg') }}" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="{{ route('shop.index') }}" class="heart-wishlist">
                            <i class="far fa-heart"></i>
                        </a>
                        <span class="font-dark-30">36% <span>OFF</span></span>
                    </div>
                    <a href="{{ route('shop.index') }}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">New Jacket</h2>
                            <span>BUY ONE GET ONE FREE</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section end -->

<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    </div>
                @endif
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Latest Collection</h2>
                    <h5><a href="{{ route('shop.index') }}" class="btn btn-warning">Shop Now</a></h5>
                </div>
            </div>
        </div>
        <style>
            .r-price {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .r-price .main-price {
                width: 100%;
            }

            .r-price .rating {
                padding-left: auto;
            }

            .product-style-3.product-style-chair .product-title {
                text-align: left;
                width: 100%;
            }

            @media (max-width:600px) {

                .product-box p,
                .product-box a {
                    text-align: left;
                }

                .product-style-3.product-style-chair .main-price {
                    text-align: right !important;
                }
            }
        </style>
        <div class="row g-sm-4 g-3">
            @if ($products)
                @foreach ($products as $product)
                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <a href="{{ route('shop.productDetails', ['slug' => $product->slug]) }}">
                                    <img src="{{ asset('/assets/images/fashion/product/front') }}/{{ $product->image }}"
                                        class="w-100 bg-img blur-up lazyload" alt="">
                                </a>
                                <div class="label-block">
                                        @if ($product->sale_price)
                                            <span class="label label-theme">{{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100) }}% off</span>
                                        @endif
                                </div>
                                <div class="cart-wrap">
                                    <ul>
                                        <li>
                                            <form method="post"  action="{{ route('carts.store') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity_ordered" id="qty" value="1">
                                                <button type="submit" style="border: none !important" class="addtocart-btn"> <i data-feather="shopping-cart"></i></button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="get"  action="{{ route('shop.productDetails', ['slug' => $product->slug]) }}">
                                                @csrf
                                                <button type="submit" style="border: none !important" class="addtocart-btn"> <i data-feather="eye"></i></button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="post" action="{{ route('wishlist.store') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="user_id"  >
                                                <button type="submit" style="border: none !important" class="wishlist"> <i data-feather="heart"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-style-3 product-style-chair">
                                <div class="product-title d-block mb-0">
                                    <div class="r-price">
                                        <div class="theme-color">
                                            @if ($product->sale_price)
                                                ${{ $product->sale_price }}
                                            @else
                                                ${{ $product->regular_price }}
                                            @endif    
                                        </div>
                                        <div class="main-price">
                                            <ul class="rating mb-1 mt-0">
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="font-light mb-sm-2 mb-0">{{ $product->name }}</p>
                                    <a href="{{ route('shop.productDetails', ['slug' => $product->slug]) }}" class="font-default">
                                        <h5>{{ $product->short_description }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                
            @endif

        </div>
    </div>
</section>

  <!-- category section start -->
  <section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Our Category</h2>
                    <h5 class="text-color">Our collection</h5>
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <h2 class="light-text">Top</h2>
                        <h2 class="top-spacing">Our Top</h2>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    @foreach ($categories as $category)
                        <div>
                            <a href="{{ route('app.categoryProducts',['id' => $category->id]) }}" class="category-wrap category-padding">
                                <img src="{{ asset('assets/images/fashion/category') }}/{{ $category->image }}" class="bg-img blur-up lazyload"
                                    alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">{{ $category->name }}</h3>
                                    <span class="text-dark">Fashion</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->

@endsection