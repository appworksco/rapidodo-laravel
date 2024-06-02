@extends('layouts.sign')

@section('content')
<div class="login-page vh-100">
    <video loop autoplay muted id="vid">
        <source src="{{ asset('vid/bg.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="col-12 col-sm-12 col-md-6 ms-sm-auto px-0">
            <div class="px-5 col-12 mx-auto">
                <h2 class="text-dark my-0">Hello There</h2>
                <p class="text-50">Sign Up to continue</p>
                @if ($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="mt-5 mb-4 needs-validation" action="{{ route('signup') }}" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <label class="text-dark pb-1">Name: <span class="small">ex. Juan Dela Cruz</span></label>
                        <input type="text" placeholder="Enter Name" class="form-control py-1" name="name" required>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark pb-1">Email:</label>
                        <input type="email" placeholder="Enter Email" class="form-control py-1" name="email" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark pb-1">Password:</label>
                        <input type="password" placeholder="Enter Password" id="password" class="form-control py-1" name="password" required>
                        <div class="invalid-feedback">Please enter a password.</div>
                        <div>
                            <input type="checkbox" class="mt-2" onclick="showHidePassword()"> Show Password
                        </div>
                    </div>
                    <input type="hidden" name="role">
                    <button class="btn btn-lg bg-primary text-uppercase w-100" type="submit">Sign Up</button>
                </form>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/signin">
                        <p class="text-center m-0">Already had an account? Sign in</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection