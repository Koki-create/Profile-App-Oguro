<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Data;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $userId = Auth::user()->id;
        $currentMonth = Carbon::now()->month;

        $data_b = Data::where('user_id', $userId)
                        ->where('category_id', 1) 
                        ->where('month', $currentMonth)
                        ->get();

        $data_h = Data::where('user_id', $userId)
                        ->where('category_id', 2) 
                        ->where('month', $currentMonth)
                        ->get();

        $data_i = Data::where('user_id', $userId)
                        ->where('category_id', 3) 
                        ->where('month', $currentMonth)
                        ->get();
                        
        return view('data.index', compact('currentMonth', 'data_b', 'data_h', 'data_i'));

    }
}
