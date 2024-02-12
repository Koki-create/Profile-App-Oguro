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
}
