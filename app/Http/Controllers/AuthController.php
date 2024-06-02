<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter a password.',
        ]);

        $credentials = $request->only('email', 'password');

        // Check if the user with the given email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // User does not exist
            return redirect()->route('signin')->with('error', 'No account found with this email address.');
        }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();

            // Check the user's role
            if ($user->role === 'user') {
                return redirect()->intended('index'); // redirect to home if role is 'user'
            }
            if ($user->role === 'rider') {
                return redirect()->route('dashboard/rider/index');
            }
            if ($user->role === 'merchant') {
                return redirect()->route('/dashboard/merchant/index');
            } else {
                return redirect()->intended('/dashboard/admin/index');
            }
        }

        return redirect()->route('signin')->with('error', 'Invalid email or password.');
    }

    public function signup(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'The password must be at least 8 characters long.',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number = '',
            'password' => Hash::make($request->password),
        ]);

        // Redirect the user after sign-up
        return redirect()->route('signin')->with('success', 'Sign-up successful! Please log in.');
    }
}
