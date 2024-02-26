<?php

namespace App\Http\Controllers\Data\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $category = $request->category;
        $month = $request->month;
        return view('data.add', [
            'category' => $category,
            'month' => $month
        ]);
    }
}
