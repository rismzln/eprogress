<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(Request $request)
    {


        return view('auth.register');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'mykad' => 'required|max:255',
            'email' => 'required|max:255',
            'user_type' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'parentID' => $request->mykad,
            'username' => $request->username,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password),
        ]);

        $login = User::where('username','=', $request->username )->first();

        Auth::login($login);

        // dd($login);
        // dd(Auth::user());

        return back();

    }

}
