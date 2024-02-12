<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function showSignup(Request $request)
    {
        return view('user.sign-up');
    }

    public function top()
   {
       return view('user.top');
   }

   public function logout()
   {
       Auth::logout();

       return redirect('/login');
   }

   public function showLogin()
   {
       return view('user.login');
   }

   public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('top');
        }

        return back();
    }
}
