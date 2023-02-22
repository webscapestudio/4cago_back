<?php

namespace App\Http\Controllers\News\Like;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($id)
    {
        $new = News::find($id);
        if (Auth::user()->hasLikedNews($new)) {
            $new->like()->where('user_id', Auth::user()->id)->delete();
        } else {
            $new->like()->create(['user_id' => Auth::user()->id])->save();
        }

        $newCount = News::find($id);

        return response()->json($newCount->like->count());
    }
}
