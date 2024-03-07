<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function loginCheck(Request $request)
    {
        $request->validate([
            'user_name'    => 'required',
            'password' => 'required|min:8'
        ]);

        // login by user_name or email
        $fieldType = filter_var($request->user_name, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        $request->merge([$fieldType => $request->user_name]);
        if (auth()->attempt($request->only($fieldType, 'password'))) {
            if (auth()->user()->status == 1) {
                return redirect()->route('profile');
            } else {
                auth()->logout();
                return redirect()->back()->with('error', 'Your account is not active!');
            }
        } else {
            return redirect()->back()->with('error', 'User name & password was invalid!');
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
