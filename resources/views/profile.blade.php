@extends('layouts.app')

@section('content')
<div class="d-none">
    <div class="bg-primary border-bottom p-3 d-flex align-items-center">
        <a class="toggle togglew toggle-2" href="#"><span></span></a>
        <h4 class="fw-bold m-0 text-white">Profile</h4>
    </div>
</div>
<!-- profile -->
<div class="container position-relative">
    <div class="py-5 osahan-profile row">
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                <a href="profile.html" class="">
                    <div class="d-flex align-items-center p-3">
                        <div class="left me-3">
                            <img alt="#" src="https://ui-avatars.com/api/?name={{ $user->name }}" class="img-fluid rounded-circle header-user me-2 header-user">
                        </div>
                        <div class="right">
                            <h6 class="mb-1 fw-bold text-warning">{{ $user->name }}</h6>
                            <p class="text-muted m-0 small">{{ $user->email }}</p>
                        </div>
                    </div>
                </a>
                <div class="osahan-credits d-flex align-items-center p-3 bg-light">
                    <p class="m-0">Rapidodo Points</p>
                    <h5 class="text-primary m-0 ms-auto">&#8369;</h5>
                </div>
                <!-- profile-details -->
                <div class="bg-white profile-details">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="d-flex w-100 align-items-center border-bottom p-3">
                        <div class="left me-3">
                            <h6 class="fw-bold mb-1 text-dark">Address</h6>
                            <p class="small text-muted m-0">Add or remove a delivery address</p>
                        </div>
                        <div class="right ms-auto">
                            <span class="fw-bold m-0"><i class="feather-chevron-right text-warning h6 m-0"></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="rounded shadow-sm p-4 bg-white">
                <h5 class="mb-4">My account</h5>
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
                <div id="edit_profile">
                    <div>
                        <form action="{{ route('update') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="pb-1">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="pb-1">Mobile Number</label>
                                <input type="number" class="form-control" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="pb-1">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-primary w-100">Save Changes</button>
                            </div>
                        </form>

                    </div>
                    <div class="additional">
                        <div class="change_password my-3">
                            <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Change Password
                                <i class="feather-arrow-right ms-auto"></i></a>
                        </div>
                        <div class="deactivate_account">
                            <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Deactivate Account
                                <i class="feather-arrow-right ms-auto"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection