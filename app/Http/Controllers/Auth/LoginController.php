<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // sign the user in
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        // redirect
        return redirect()->route('dashboard');
    }
}
