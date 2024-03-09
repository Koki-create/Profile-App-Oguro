<?php

namespace App\Http\Controllers\Data\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $dataId = $request->input('dataId');
        $inputTime = $request->input('inputTime');
        $selectedMonth = $request->input('month');

        $data = Data::where('id', $dataId)->firstOrFail();
        $data->time = $inputTime;
        $data->save();

        $data_item = $data->name;
        
        session()->flash('update_complete', true);
        session()->flash('data_item', $data_item);
        session()->put('selectedMonth', $selectedMonth);

        return redirect()->back();

    }
}
