@extends('layouts.base')

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
                    <h3>Cart</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index') }}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            @if(!$carts->isEmpty())
                <div class="row">
                    <div class="col-md-12 text-center">
                        <table class="table cart-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">image</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">total</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <input type="hidden" name="cart_id" class="id" value="{{ $cart->id }}">
                                        <td>
                                            <a href="{{ route('shop.productDetails',['slug' => $cart->product->slug]) }}">
                                                <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $cart->product->image }}" class="blur-up lazyloaded"
                                                    alt="{{ $cart->product->name }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('shop.productDetails',['slug' => $cart->product->slug]) }}">{{ $cart->product->name }}</a>
                                            <div class="mobile-cart-content row">
                                                <div class="col">
                                                    <div class="qty-box">
                                                        <div class="input-group">
                                                            <input type="text" name="quantity" class="form-control input-number"
                                                                value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h2>${{ $cart->product->sale_price ? $cart->product->sale_price : $cart->product->regular_price }}</h2>
                                                </div>
                                                <div class="col">
                                                    <h2 class="td-color">
                                                        <a href="javascript:void(0)">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h2>${{ $cart->product->sale_price ? $cart->product->sale_price : $cart->product->regular_price }}</h2>
                                        </td>
                                        <td>
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" name="quantity_ordered" data-id="{{ $cart->id }}" class="form-control input-number" value="{{ $cart->quantity_ordered }}" onchange="updateQuantity(this)">

                                                    <form id="updateCartQty" action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="id" id='id' >
                                                        <input type="hidden" name="quantity_ordered" id="quantity_ordered">
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h2 class="td-color">${{ $cart->total_price }}</h2>
                                        </td>
                                        <td>
                                            <form  action="{{ route('cart.destroy', ['id' => $cart->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-md-5 mt-4">
                        <div class="row">
                            <div class="col-sm-7 col-5 order-1">
                                <div class="left-side-button text-end d-flex d-block justify-content-end">
                                        <form id="clear" action="{{ route('cart.clear') }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('cart.clear') }}"
                                            onclick="event.preventDefault();document.getElementById('clear').submit();"
                                            class="text-decoration-underline theme-color d-block text-capitalize">clear
                                            all items</a>
                                        </form>
                                </div>
                            </div>
                            <div class="col-sm-5 col-7">
                              
                            </div>
                        </div>
                    </div>

                    <div class="cart-checkout-section">
                        <div class="row g-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="left-side-button float-start">
                                    <a href="{{ route('shop.index') }}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                        <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 ">
                               
                            </div>
                        
                            <div class="col-lg-4">
                                <div class="cart-box">
                                    <div class="cart-box-details">
                                        <div class="total-details">
                                            <div class="top-details">
                                                <h3>Cart Totals</h3>
                                                <h6>Sub Total <span>${{ $cart->sum('total_price') }}</span></h6>
                                                <h6>Tax <span>$5.00</span></h6>
                                                <h6>Total <span>${{ round($cart->sum('total_price') + 5.00) }}</span></h6>
                                            </div>
                                            <div class="bottom-details">
                                                <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Your Cart is empty!</h2>
                        <h5 class="mt-3">Add Items to it now.</h5>
                        <a href="{{ route('shop.index') }}" class="btn btn-warning mt-5">Shop Now</a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        function updateQuantity(qty){
            $('#id').val($(qty).data('id'));
            $('#quantity_ordered').val($(qty).val());
            $('#updateCartQty').submit();
        }
    </script>
@endpush