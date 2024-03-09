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

        if ($request->month) {
            $selectedMonth = $request->month;
            session(['selectedMonth' => $selectedMonth]);
        } else {
            $selectedMonth = session('selectedMonth', $currentMonth);
        }

        $data_b = Data::where('user_id', $userId)
                        ->where('category_id', 1) 
                        ->where('month', $selectedMonth)
                        ->orderBy('created_at', 'ASC')
                        ->get();
                        
                        $data_h = Data::where('user_id', $userId)
                        ->where('category_id', 2) 
                        ->where('month', $selectedMonth)
                        ->orderBy('created_at', 'ASC')
                        ->get();
                        
                        $data_i = Data::where('user_id', $userId)
                        ->where('category_id', 3) 
                        ->where('month', $selectedMonth)
                        ->orderBy('created_at', 'ASC')
                        ->get();
                        
        return view('data.index', compact('currentMonth', 'selectedMonth', 'data_b', 'data_h', 'data_i'));

    }
}
