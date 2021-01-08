<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Mockery\Matcher\HasKey;

class RegisterController extends Controller
{
    public function home() {
        return view('layouts.home');
    }

        public function post() {
        return view('layouts.post');
    }

    public function index() {
        return view('auth.register');
    }

     public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',

        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard')->with('successMessage', 'User was sucessfully added!');
    }

}