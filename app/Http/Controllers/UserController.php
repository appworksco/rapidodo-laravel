<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => ['required', 'regex:/^0[0-9]{10}$/'],
            'email' => 'required|email|max:255',
        ], [
            'mobile_number.regex' => 'The mobile number must be 11 digits and start with 0.',
        ]);

        $user = auth()->user(); // Assuming you are updating the authenticated user

        $user->name = $request->input('name');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
