@extends('layouts.base')
@section('content')
     <!-- Breadcrumb section start -->
     <section class="breadcrumb-section section-b-space">
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
                    <h3>User Dashboard</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab" data-bs-target="#dash" type="button"><i class="fas fa-angle-right"></i>Profile</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order" type="button"><i class="fas fa-angle-right"></i>Orders</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="2-tab" data-bs-toggle="tab" data-bs-target="#wishlist" type="button"><i class="fas fa-angle-right"></i>Wishlist</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="3-tab" data-bs-toggle="tab" data-bs-target="#save" type="button"><i class="fas fa-angle-right"></i>Saved
                                Address</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="4-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button"><i class="fas fa-angle-right"></i>Payment</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link font-light" id="6-tab" data-bs-toggle="tab" data-bs-target="#security" type="button"><i class="fas fa-angle-right"></i>Security</button>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="filter-button dash-filter dashboard">
                        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dash">
                            <div class="dashboard-right">
                                <div class="dashboard">
                                    <div class="page-title title title1 title-effect">
                                        <h2>Personal Details</h2>
                                    </div>
                                    <div class="welcome-msg">
                                        <h6 class="font-light">Hello, <span>{{ Auth::user()->name }} !</span></h6>
                                        <p class="font-light">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="order-box-contain my-4">
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/box.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/box1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">total order</h5>
                                                            <h3>{{ App\Models\Cart::where('user_id', Auth::id())->get()->count() }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/sent.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/sent1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">pending orders</h5>
                                                            <h3>{{ App\Models\Cart::where([['user_id', Auth::id()], ['status', 'Pending']])->get()->count() }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/wishlist.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/wishlist1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">wishlist</h5>
                                                            <h3>{{ App\Models\Wishlist::where('user_id', Auth::id())->get()->count() }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-account box-info">
                                        <div class="row">
                                            <div class="col">
                                                <div class="box">
                                                    <div class="box-title">
                                                        <h4>Contact Information</h4><a href="{{ route('user.edit',['id' => Auth::user()->id]) }}">Edit</a>
                                                    </div>
                                                    <div class="box-content">
                                                        <h6 class="font-light"> <span style="font-weight: bold">Name:</span> {{ Auth::user()->name }}</h6>
                                                        <h6 class="font-light"> <span style="font-weight: bold">Email Address:</span> {{ Auth::user()->email}}</h6>
                                                        <h6 class="font-light"><span style="font-weight: bold">Phone Number:</span> {{ Auth::user()->phone_number}}</h6>
                                                        @foreach ($locations as $location)
                                                            <h6 class="font-light"><span style="font-weight: bold">{{ $location->position }}:</span> {{ $location->building }} {{$location->street  }} St, {{ $location->area }}</h6>
                                                        @endforeach
                                                        <a href="{{ route('user.changepassword',['id'=> Auth::user()->id]) }}">Change Password</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
                            @if(!$carts->isEmpty())
                                <div class="box-head mb-3">
                                    <h3>My Order</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table cart-table">
                                        <thead>
                                            <tr class="table-head">
                                                <th scope="col">image</th>
                                                <th scope="col">Product Details</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart )
                                            <tr>
                                                <td>
                                                    <a href="details.php">
                                                        <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $cart->product->image }}" class="blur-up lazyload" alt="">
                                                    </a>
                                                </td>
                            
                                                <td>
                                                    <p class="fs-6 m-0">{{ $cart->product->name }}</p>
                                                </td>
                                                <td>
                                                    <p style="pointer-events: none;margin: 0 !important;padding: 4px 10px;border-radius: 5px;font-size: 12px !important;color: #fff !important;" 
                                                    @if ($cart->status == 'Pending')
                                                        class="btn-warning btn btn-sm"
                                                    @else
                                                        class="btn-success btn btn-sm" 
                                            
                                                    @endif >{{ $cart->status }}</p>
                                                </td>
                                                <td>
                                                    <p class="mt-0">{{ $cart->quantity_ordered }}</p>
                                                </td>
                                                <td>
                                                    <p class="theme-color fs-6">${{ $cart->total_price }}</p>
                                                </td>
                                                <td>
                                                    @if($cart->status == 'Pending')
                                                        <a href="{{ route('cart.index') }}">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('shop.productDetails',['slug'=> $cart->product->slug]) }}">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="wishlist">
                            @if(!$wishlists->isEmpty())
                                <div class="box-head mb-3">
                                    <h3>My Wishlish</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table cart-table">
                                        <thead>
                                            <tr class="table-head">
                                                <th scope="col">image</th>
                                                <th scope="col">Product Details</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Availability</th>
                                                <th scope="col">View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wishlists as $wishlist)
                                                <tr>
                                                    <td>
                                                        <a href="details.php">
                                                            <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $wishlist->product->image }} " class="blur-up lazyload" alt="">
                                                        </a>
                                                    </td>
                                                
                                                    <td>
                                                        <p class="fs-6 m-0">{{ $wishlist->product->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="theme-color fs-6">${{ $wishlist->product->sale_price ? $wishlist->product->sale_price : $wishlist->product->regular_price ; }}</p>
                                                    </td>
                                                    <td>
                                                            @if ($wishlist->product->stock_status == 'instock')
                                                                <p class="btn btn-success btn-sm m-0" style="pointer-events: none;margin: 0 !important;padding: 4px 10px;border-radius: 5px;font-size: 12px !important;color: #fff !important;">In Stock</p>
                                                            @else
                                                                <p class="btn btn-warning btn-sm m-0" style="pointer-events: none;margin: 0 !important;padding: 4px 10px;border-radius: 5px;font-size: 12px !important;color: #fff !important;">Out Of Stock</p>
                                                            @endif
                                                    </td>
                                                    <td>
                        
                                                        {{-- <a href="{{ route('shop.productDetails',['slug'=> $wishlist->product->slug]) }}">
                                                            <i class="far fa-eye"></i>
                                                        </a> --}}
                                                        {{-- <a href="{{ route('wishlist.storeToCart') }}" class="btn btn-solid-default btn-sm fw-bold" onclick="event.preventDefault();document.getElementById('addToCart').submit();">Move to
                                                            Cart</a> --}}
                                                            <form id="addToCart" method="post" action="{{ route('wishlist.storeToCart') }}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $wishlist->product_id }}">
                                                                <input type="hidden" name="quantity_ordered" id="qty" value="1">
                                                                <button type="submit" class="btn btn-solid-default btn-sm fw-bold">Move To Cart</i></button>
                                                            </form>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            
                                        </tbody>
                                    </table>
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

                        <div class="tab-pane fade dashboard" id="save">
                            <div class="box-head">
                                <h3>Save Address</h3>
                                <form class=" fw-bold ms-auto" action="{{ route('location.create') }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-solid-default btn-sm" ><i class="fas fa-plus"></i>
                                        Add New Address</button>
                                </form>
                            </div>
                            @if(!$locations->isEmpty())                   
                                <div class="save-details-box">
                                    <div class="row g-3">
                                        @foreach ($locations as $location )
                                            <div class="col-xl-4 col-md-6">
                                                <div class="save-details">
                                                    <div class="save-name">
                                                        <h5>{{ Auth::user()->name }}</h5>
                                                        <div class="save-position">
                                                            <h6>{{ $location->position }}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="save-address">
                                                        <p class="font-light">{{ $location->building }} {{ $location->street }} St,</p>
                                                        
                                                        <p class="font-light">{{ $location->area }}</p>
                                                    </div>
                                                    <div class="mobile">
                                                        <p class="font-light mobile">{{ Auth::user()->phone_number }}</p>
                                                    </div>


                                                    <div class="button">
                                                        <form  class=" fw-bold ms-auto" action="{{ route('location.edit', ['id' => $location->id]) }}" method="get">
                                                            @csrf
                                                            <button style="border-radius: 4px !important" type="submit" class="btn btn-success btn-sm">Edit</button>
                                                        </form>

                                                        <form class="fw-bold ms-auto" action="{{ route('location.destroy', ['id' => $location->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button style="border-radius: 4px !important" type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2>Your Locations List is empty!</h2>
                                        <h5 class="mt-3">Please Add It!</h5>
                                        
                                    </div>
                                </div>
                            @endif

                        </div>

                        <div class="tab-pane fade dashboard" id="pay">
                            <div class="box-head">
                                <h3>Card & Payment</h3>
                                <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#addPayment"><i class="fas fa-plus"></i>
                                    Add New Card</button>
                            </div>

                            <div class="card-details-section">
                                <div class="row g-4">
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details">
                                                <div class="card-number">
                                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                </div>

                                                <div class="valid-detail">
                                                    <div class="title">
                                                        <span>valid</span>
                                                        <span>thru</span>
                                                    </div>
                                                    <div class="date">
                                                        <h3>12/23</h3>
                                                    </div>
                                                    <div class="primary">
                                                        <span class="badge bg-pill badge-light">primary</span>
                                                    </div>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>mark jecno</h5>
                                                    </div>
                                                    <div class="card-img">
                                                        <img src="assets/images/payment-icon/1.jpg" class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <a data-bs-toggle="modal" data-bs-target="#addPayment" href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="edit-card-mobile">
                                            <a data-bs-toggle="modal" data-bs-target="#addPayment" href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                delete</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details card-visa">
                                                <div class="card-number">
                                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                </div>

                                                <div class="valid-detail">
                                                    <div class="title">
                                                        <span>valid</span>
                                                        <span>thru</span>
                                                    </div>
                                                    <div class="date">
                                                        <h3>12/23</h3>
                                                    </div>
                                                    <div class="primary">
                                                        <span class="badge bg-pill badge-light">primary</span>
                                                    </div>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>{{ Auth::user()->name }}</h5>
                                                    </div>
                                                    <div class="card-img">
                                                        <img src="assets/images/payment-icon/2.jpg" class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <a data-bs-toggle="modal" data-bs-target="#addPayment" href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="edit-card-mobile">
                                            <a data-bs-toggle="modal" data-bs-target="#addPayment" href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                delete</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6">
                                        <div class="payment-card-detail">
                                            <div class="card-details dabit-card">
                                                <div class="card-number">
                                                    <h4>XXXX - XXXX - XXXX - 2548</h4>
                                                </div>

                                                <div class="valid-detail">
                                                    <div class="title">
                                                        <span>valid</span>
                                                        <span>thru</span>
                                                    </div>
                                                    <div class="date">
                                                        <h3>12/23</h3>
                                                    </div>
                                                    <div class="primary">
                                                        <span class="badge bg-pill badge-light">primary</span>
                                                    </div>
                                                </div>

                                                <div class="name-detail">
                                                    <div class="name">
                                                        <h5>mark jecno</h5>
                                                    </div>
                                                    <div class="card-img">
                                                        <img src="assets/images/payment-icon/3.jpg" class="img-fluid blur-up lazyloaded" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="edit-card">
                                                <a data-bs-toggle="modal" data-bs-target="#addPayment" href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                                <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                    delete</a>
                                            </div>
                                        </div>

                                        <div class="edit-card-mobile">
                                            <a data-bs-toggle="modal" data-bs-target="#addPayment" href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                            <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade dashboard-security dashboard" id="security">
                            <div class="box-head">
                                <h3>Delete Your Account</h3>
                            </div>
                            <div class="security-details">
                                <h5 class="font-light mt-3">Hi <span> {{ Auth::user()->name }},</span>
                                </h5>
                                <p class="font-light mt-1">We Are Sorry To Here You Would Like To Delete Your Account.
                                </p>
                            </div>

                            <div class="security-details-1 mb-0">
                                <div class="page-title">
                                    <h4 class="fw-bold">Note</h4>
                                </div>
                                <p class="font-light">Deleting your account will permanently remove your profile,
                                    personal settings, and all other associated information. Once your account is
                                    deleted, You will be logged out and will be unable to log back in.</p>

                                <p class="font-light mb-4">If you understand and agree to the above statement, and would
                                    still like to delete your account, than click below</p>

                                <form action="{{ route('user.delete',['id' => Auth::user()->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-solid-default btn-sm fw-bold rounded" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Your
                                        Account</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- user dashboard section end -->

    <!-- Subscribe Section Start -->
    <section class="subscribe-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="subscribe-details">
                        <h2 class="mb-3">Subscribe Our News</h2>
                        <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our fresh
                            and fantastic Products.</h6>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                    <div class="subsribe-input">
                        <div class="input-group">
                            <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                            <button class="btn btn-solid-default" type="button">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->
@endsection
