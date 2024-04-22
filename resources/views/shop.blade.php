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
                <h3>Shop</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('app.index') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 category-side col-md-4">
                <div class="category-option">
                    <div class="button-close mb-3">
                        <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                    </div>
                    <div class="accordion category-name" id="accordionExample">
                        <div class="accordion-item category-rating">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    Brand
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body category-scroll">
                                    <ul class="category-list">
                                        @foreach ($brands as $brand )
                                            <li>
                                                <div class="form-check custome-form-check">
                                                    <input class="checkbox_animated check-it" id="br{{ $brand->id }}" name="brands" @if(in_array($brand->id,explode(',',$brand_val))) checked='checked' @endif
                                                        value="{{ $brand->id }}" type="checkbox" onchange="filterProductsByBrand(this)" >
                                                    <label class="form-check-label">{{ $brand->name }}</label>
                                                    <p class="font-light">({{ $brand->products->count() }})</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    
                        <div class="accordion-item category-rating">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix">
                                    Category
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne">
                                <div class="accordion-body category-scroll">
                                    <ul class="category-list">
                                        @foreach ($categories as $category)
                                            <li>
                                                <div class="form-check custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct{{ $category->id }}" name="categories" 


                                                    @if(in_array($category->id,explode(',',$category_val))) checked='checked' @endif
                                                        type="checkbox" value="{{ $category->id }}" 
                                                        onchange="filterProductsByCategorey(this)">
                                                    <label class="form-check-label">{{ $category->name }}</label>
                                                    <p class="font-light">({{ $category->products->count() }})</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-product col-lg-9 col-12 ratio_30">

                <div class="row g-4">
                    <!-- label and featured section -->
                    <div class="col-md-12">
                        <ul class="short-name">


                        </ul>
                    </div>

                    <div class="col-12">
                        <div class="filter-options">
                            <div class="select-options">
                                <div class="page-view-filter">
                                    <div class="dropdown select-featured">
                                        <select class="form-select" name="orderby" id="orderby">
                                            <option value="-1" {{ $order == -1? 'selected':'' }}>Default</option>
                                            <option value="1" {{ $order == 1? 'selected':'' }}>Date, New To Old</option>
                                            <option value="2" {{ $order == 2? 'selected':'' }}>Date, Old To New</option>
                                            <option value="3" {{ $order == 3? 'selected':'' }}>Price, Low To High</option>
                                            <option value="4" {{ $order == 4? 'selected':'' }}>Price, High To Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="dropdown select-featured">
                                    <select class="form-select" name="size" id="pagesize">
                                        <option value="12" {{ $size == 12? 'selected':'' }} >12 Products Per Page</option>
                                        <option value="24" {{ $size == 24? 'selected':'' }} >24 Products Per Page</option>
                                        <option value="52" {{ $size == 52? 'selected':'' }} >52 Products Per Page</option>
                                        <option value="100" {{ $size == 100? 'selected':'' }} >100 Products Per Page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid-options d-sm-inline-block d-none">
                                <ul class="d-flex">
                                    <li class="two-grid">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('assets/svg/grid-2.svg') }}" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="three-grid d-md-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('assets/svg/grid-3.svg') }}" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn active d-lg-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('assets/svg/grid.svg') }}" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('assets/svg/list.svg') }}" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                                        <img src="assets/images/fashion/product/front/{{ $product->image }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="{{ route('shop.productDetails',['slug' => $product->slug]) }}">
                                        <img src="assets/images/fashion/product/back/{{ $product->image }}"
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
                {{ $products->withQueryString()->links('pagination.default')}}
            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->

<form id='filterProducts' action="{{ route('shop.index') }}" method="GET">
    @csrf
    <input type="hidden" name="page" id="page" value="{{$page}}">
    <input type="hidden" name="size" id="size" value="{{$size}}">
    <input type="hidden" name="order" id="order" value="{{$order}}">
    <input type="hidden" name="brands" id="brands" value="{{ $brand_val }}">
    <input type="hidden" name="categories" id="categories" value="{{ $category_val }}">
</form>

@endsection
@push('scripts')
    <script>
        $(function() {
            $("#pagesize").on("change", function(){
            $('#size').val($("#pagesize option:selected").val());
            $('#filterProducts').submit();
            });

            $("#orderby").on("change", function(){
                $('#order').val($("#orderby option:selected").val());
                $('#filterProducts').submit();
            });
        });
        

        function filterProductsByBrand(brand){
            var brands = '';
            $("input[name='brands']:checked").each(function(){
                if(brands == '')
                    brands += this.value;
                else
                    brands += (',' + this.value);
            });
            $('#brands').val(brands);
            $('#filterProducts').submit();
        }

        function filterProductsByCategorey(category){
            var categories = '';
            $("input[name='categories']:checked").each(function(){
                if(categories == '')
                    categories += this.value;
                else
                    categories += (',' + this.value);
            });
            $('#categories').val(categories);
            $('#filterProducts').submit();
        }
    </script>
@endpush