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
                <h2 class="text-dark my-0">Welcome Back</h2>
                <p class="text-50">Sign in to continue</p>
                @if ($errors->any())
                <div class="alert alert-danger pb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger pb-0">
                    <ul>
                        <li>{{ session('error') }}</li>
                    </ul>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success pb-0">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
                @endif
                <form class="mt-5 mb-4 needs-validation" action="{{ route('signin') }}" method="post" novalidate>
                    @csrf
                    <div class="form-group">
                        <label class="text-dark pb-1">Email:</label>
                        <input type="email" placeholder="Enter Email" class="form-control py-1" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="text-dark pb-1">Password:</label>
                        <input type="password" placeholder="Enter Password" id="password" class="form-control py-1" name="password" required>
                        <div>
                            <input type="checkbox" class="mt-2" onclick="showHidePassword()"> Show Password
                        </div>
                    </div>
                    <button class="btn btn-lg bg-primary text-uppercase w-100" name="submit">Sign In</button>
                </form>
                <a href="/forgot-password" class="text-decoration-none">
                    <p class="text-center">Forgot your password?</p>
                </a>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="/signup">
                        <p class="text-center m-0">Don't have an account? Sign up</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection