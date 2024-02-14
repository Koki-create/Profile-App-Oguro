<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('top');
        }
        
        return back()->withErrors([
            'email' => 'メールアドレス、もしくはパスワードが間違っています',
            'password' => 'メールアドレス、もしくはパスワードが間違っています',
        ]);
    }
}
