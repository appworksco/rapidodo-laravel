<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Sign in route
Route::get('/signin', function () {
    return view('auth.signin');
})->name('signin');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin.submit');

// Sign up route
Route::get('/signup', function () {
    Auth::routes(['verify' => true]);
    return view('auth.signup');
})->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

// Home route
Route::get('/index', function () {
    $user = Auth::user();
    return view('index', compact('user'));
})->middleware('auth')->name('index');

// Sign out
Route::post('/signout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/signin'); // Redirect to the sign-in page after logout
})->name('signout');

// Route that need authentication
Route::middleware('auth')->get('/', function () {
    // Route logic
});





// Profile route
Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile', compact('user'));
})->middleware('auth')->name('profile');
Route::post('/update', [UserController::class, 'update'])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
