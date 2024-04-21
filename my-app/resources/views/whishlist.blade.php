@extends('layouts.base')

@push('styles')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet"> --}}
    <style>
        a.disabled,
        a.disabled:hover .fas {
            color: grey !important;
            cursor: not-allowed;
        }
        form button.icon{
            background-color: #eff2f7;
            border: 1px solid #eff2f7;
            margin: 0 5px;
        }
        button{
        color: var(--theme-color);
        -webkit-transition: 0.5s ease;
        transition: 0.5s ease;
        text-decoration: none;
        }
        td form{
            float: left;
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
                <h3>Wishlist</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
        @if(!$wishlists->isEmpty())
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table cart-table wishlist-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">availability</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wishlist)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.productDetails',['slug'=> $wishlist->product->slug]) }}">
                                            <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $wishlist->product->image }}"
                                                class=" blur-up lazyload" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('shop.productDetails',['slug'=> $wishlist->product->slug]) }}" class="font-light">{{ $wishlist->product->name }}</a>
                                    </td>
                                    <td>
                                        <p class="fw-bold">${{ $wishlist->product->sale_price ? $wishlist->product->sale_price : $wishlist->product->regular_price }}</p>
                                    </td>
                                    <td>
                                        <p>
                                            @if ($wishlist->product->stock_status == 'instock')
                                                In Stock
                                            @else
                                                Out Off Stock
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <a href="" class="icon">
                                            <form method="post" action="{{ route('wishlist.storeToCart') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $wishlist->product_id }}">
                                                <input type="hidden" name="quantity_ordered" id="qty" value="1">
                                                <button type="submit" class="icon"><i class="fas fa-shopping-cart"></i></button>
                                            </form>
                                        </a>
                                       
                                        <a href="" class="icon">
                                            <form  action="{{ route('wishlist.destroy',['id' => $wishlist->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="icon"><i class="fas fa-times"></i></button>
                                            </form>
                                        </a>
                                        
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your Wishlist is empty!</h2>
                    <h5 class="mt-3">Add Items to it now.</h5>
                    <a href="{{ route('shop.index') }}" class="btn btn-warning mt-5">Shop Now</a>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- Cart Section End -->   
@endsection
