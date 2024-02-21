<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

       return redirect()->route('user.showLogin');
   }

   public function showLogin()
   {
       return view('user.login');
   }

   public function showEdit()
   {
       return view('user.profile-edit');
   }

}
