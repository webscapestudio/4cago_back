<?php

namespace App\Http\Controllers\News\Dislike;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($id)
    {
        $new = News::find($id);

        if (Auth::user()->hasDislikedNews($new)) {
            $new->dislike()->where('user_id', Auth::user()->id)->delete();
        } else {
            $new->dislike()->create(['user_id' => Auth::user()->id])->save();
        }
        $newCount = News::find($id);
        return response()->json($newCount->dislike->count());
    }
}
