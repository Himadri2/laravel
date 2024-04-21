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
                <h3>Location</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Location</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section Start -->
<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" action="{{ route('location.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Your Location</h3>
                    
                        <div class="col-md-4">
                            <label for="city" class="form-label">Building</label>
                            <input type="text" class="form-control" id="city" name="building" placeholder="Build number">

                        </div>

                        <div class="col-md-4">
                            <label for="country" class="form-label">Street</label>
                            <input type="text" class="form-control" id="city" name="street" placeholder="St">
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">Area</label>
                            <input type="text" class="form-control" id="city" name="area" placeholder="Area">
                        </div>
                        <div class="col-md-12">
                            <label for="locality" class="form-label">Locality</label>
                            <input type="text" class="form-control" id="locality" name="locality"
                                placeholder="Home, Work,...">
                        </div>
                    </div>

                    <button class="btn btn-solid-default mt-4" type="submit">Save</button>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- Cart Section End -->
@endsection