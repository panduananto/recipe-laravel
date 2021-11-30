<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        $request
            ->session()
            ->flash('registrationSuccess', 'Registration success. You may now log in.');

        return redirect(route('login.index'));
    }
}
