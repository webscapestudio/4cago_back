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
        if (Auth::user()->hasDislikedNews($new)) :
            $new->dislike()->where('user_id', Auth::user()->id)->delete();
            return response()->json($new);
        endif;
        $new->dislike()->create(['user_id' => Auth::user()->id]);

        return response()->json($new);
    }
}
