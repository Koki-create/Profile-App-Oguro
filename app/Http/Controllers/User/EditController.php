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
        
        // アバター画像の更新
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $url = Storage::url($path);
            
            // 古い画像を削除
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            
            // 画像のパスを新たなものに書き換え
            $user->image = $path;
        }
        
        // 更新内容を保存
        $user->save();

        return redirect()->route('user.top');
    }
}
