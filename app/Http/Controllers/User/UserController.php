<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Data;

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

    $userId = Auth::user()->id;
    $currentMonth = Carbon::now()->month;
    $previousMonth = Carbon::now()->subMonth()->month;
    $beforePreviousMonth = Carbon::now()->subMonths(2)->month;
    
    // 現在の月
    $data_b_current = Data::where('user_id', $userId)
                          ->where('category_id', 1)
                          ->where('month', $currentMonth)
                          ->sum('time');
    
    $data_h_current = Data::where('user_id', $userId)
                          ->where('category_id', 2)
                          ->where('month', $currentMonth)
                          ->sum('time');
    
    $data_i_current = Data::where('user_id', $userId)
                          ->where('category_id', 3)
                          ->where('month', $currentMonth)
                          ->sum('time');
    
    // 前月
    $data_b_previous = Data::where('user_id', $userId)
                           ->where('category_id', 1)
                           ->where('month', $previousMonth)
                           ->sum('time');
    
    $data_h_previous = Data::where('user_id', $userId)
                           ->where('category_id', 2)
                           ->where('month', $previousMonth)
                           ->sum('time');
    
    $data_i_previous = Data::where('user_id', $userId)
                           ->where('category_id', 3)
                           ->where('month', $previousMonth)
                           ->sum('time');
    
    // 前々月
    $data_b_beforePrevious = Data::where('user_id', $userId)
                                 ->where('category_id', 1)
                                 ->where('month', $beforePreviousMonth)
                                 ->sum('time');
    
    $data_h_beforePrevious = Data::where('user_id', $userId)
                                 ->where('category_id', 2)
                                 ->where('month', $beforePreviousMonth)
                                 ->sum('time');
    
    $data_i_beforePrevious = Data::where('user_id', $userId)
                                 ->where('category_id', 3)
                                 ->where('month', $beforePreviousMonth)
                                 ->sum('time');
                            
       return view('user.top', compact('data_b_current', 'data_h_current', 'data_i_current',
                                         'data_b_previous', 'data_h_previous', 'data_i_previous',
                                         'data_b_beforePrevious', 'data_h_beforePrevious', 'data_i_beforePrevious'
                                        ));
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
