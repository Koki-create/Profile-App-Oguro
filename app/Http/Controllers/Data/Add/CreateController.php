<?php

namespace App\Http\Controllers\Data\Add;

use App\Http\Controllers\Controller;
use Illuminate\Http\Requests\Data\CreateRequest;
use App\Models\Data;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $category = $request->category;
        if ($category == 'バックエンド') {
            $categoryId = 1;
        } elseif ($category == 'フロントエンド') {
            $categoryId = 2;
        } else {
            $categoryId = 3;
        }

        $data = new Data;
        $data->user_id = $request->userId;
        $data->category_id = $categoryId;
        $data->name = $request->dataItem();
        $data->time = $request->time();
        $data->month = $request->month;
        $data->save();

        session()->flash('create_complete', true);
        return redirect()->back();
    }
}
