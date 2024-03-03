<?php

namespace App\Http\Controllers\Data\Delete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $dataId = $request->input('dataId');
        $data = Data::where('id', $dataId)->firstOrFail();
        $data->delete();

        $data_item = $data->name;
        
        session()->flash('delete_complete', true);
        session()->flash('data_item', $data_item);

        return redirect()->back();

    }
}
