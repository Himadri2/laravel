@extends('layouts.base')

@push('styles')
<link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo2.css') }}">
<style>
    nav svg{
        height: 20px;
    }
    .product-box .product-details h5 {
    width: 100%;
}
</style>
@endpush

@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
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
            <div class="col-12">
                <h3>Products of {{ $category->name }}</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('app.index') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section start -->
<section class="section-b-space">
    <div class="container">
            <div class="category-product col-lg-9 col-12 ratio_30">
                <div class="row g-4">
                    <!-- label and featured section -->
                    <div class="col-md-12">
                        <ul class="short-name">

                        </ul>
                    </div>
                </div>
                <!-- label and featured section -->

                <!-- Prodcut setion -->
                <div
                    class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">

                    @foreach ($products as $product)
                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}">
                                        <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $product->image }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}">
                                        <img src="{{ asset('assets/images/fashion/product/back') }}/{{ $product->image }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
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
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{ $product->category->name }}</span>
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
                                
                                <div class="main-price">
                                    <a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}" class="font-default">
                                        <h5 class="ms-0">{{ $product->name }}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">{{ $product->category->name }}</span>
                                        <p class="font-light">{{$product->short_description}}</p>
                                    </div>
                                    <h3 class="theme-color">${{ $product->regular_price }}</h3>
                                    <button class="btn listing-content">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->


@endsection