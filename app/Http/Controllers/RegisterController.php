<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $role = \App\Models\Role::where('name', 'Admin')->first();
        if ($role) {
            $data['role_id'] = $role->id;
        }
        $user = User::create($data);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/login');
    }
}