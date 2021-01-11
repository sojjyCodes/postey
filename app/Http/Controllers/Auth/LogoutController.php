<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function index() {

    }

    public function store(Request $request) {
     auth()->attempt($request->only('email', 'password'));
        return redirect()->route('dashboard')->with('successMessage', 'User was sucessfully Logged Out!');
    }
}