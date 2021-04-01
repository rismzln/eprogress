<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {

        return view('auth.login');
    }

    public function store (Request $request)
    {

        // Auth::login($request->only('email','password'));
        if (!Auth::attempt($request->only('email','password'))) {
            // Authentication passed...
            return back()->with('status', 'Invalid Login Details');
        }

        return view('welcome');

    }
}
