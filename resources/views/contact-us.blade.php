@extends('layouts.base')
@push('styles')
    <style>
        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: black;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
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
                <h3>Contact Us</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section> <!-- Contact Section Start -->
<section class="contact-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="materialContainer">
                    <div class="material-details">
                        <div class="title title1 title-effect mb-1 title-left">
                            <h2>Contact Us</h2>
                            <p class="ms-0 w-100">Your email address will not be published. Required fields are
                                marked *</p>
                        </div>
                    </div>
                        <form class="row g-4 mt-md-1 mt-2" action="{{ route('mail.store') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                @if (!Auth::user())
                                    placeholder="Enter your full name"
                                @else
                                    value = "{{ Auth::user()->name }}"
                                @endif
                                 required="">
                            </div>
                           
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                @if (!Auth::user())
                                    placeholder="Enter your email address"
                                @else
                                    value="{{ Auth::user()->email }}"
                                @endif
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                @if (!Auth::user())
                                    placeholder="Enter your phone number"
                                @else
                                    value="{{ Auth::user()->phone_number }}"
                                @endif
                                    required="">
                            </div>
    
                            <div class="col-12">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="5" required=""></textarea>
                            </div>
    
                            <div class="col-auto">
                                <button class="btn btn-solid-default" type="submit">Send Mail</button>
                            </div>
                        </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="contact-details">
                    <div>
                        <h2>Let's get in touch</h2>
                        <h5 class="font-light">We're open for any suggestion or just to have a chat</h5>
                        <div class="contact-box">
                            <div class="contact-icon">
                                <i data-feather="map-pin"></i>
                            </div>
                            <div class="contact-title">
                                <h4>Address :</h4>
                                <p>NIT, Faridabad, Haryana, India</p>
                            </div>
                        </div>

                        <div class="contact-box">
                            <div class="contact-icon">
                                <i data-feather="phone"></i>
                            </div>
                            <div class="contact-title">
                                <h4>Phone Number :</h4>
                                <p>+1 0000000000</p>
                            </div>
                        </div>

                        <div class="contact-box">
                            <div class="contact-icon">
                                <i data-feather="mail"></i>
                            </div>
                            <div class="contact-title">
                                <h4>Email Address :</h4>
                                <p>contact@fashionshop.in</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection