<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EditRequest $request)
    {
        // 自己紹介文の更新
        $user = Auth::user();
        $user->introduction = $request->introduction();
        $user->save();

        // アバター画像の更新
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
    
            // 古い画像を削除
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
    
            // 新しい画像のパスを保存
            $user->update(['image' => $path]);
        }
    
        return redirect()->route('user.top');
    }
        







}
