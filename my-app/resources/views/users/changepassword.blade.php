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
                <h3>Change Password</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                <form class="needs-validation" method="POST" action="{{ route('user.donechangepassword',['id' => Auth::user()->id]) }}">
                    @csrf
                    @method('put')
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Your Password</h3>
                        <div class="col-md-6">
                            <label for="pass" class="form-label">New Password</label>
                            <input type="password"  id="pass" class="form-control" name="password">
                            @error('password')
                            <span class="text-danger mt-3">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="compass" class="form-label">Confirm Password</label>
                            <input type="password"  id="compass" class="form-control" name="password_confirmation">
                        </div>

                    </div>
                    <button class="btn btn-solid-default mt-4" type="submit">Update</button>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- Cart Section End -->
@endsection