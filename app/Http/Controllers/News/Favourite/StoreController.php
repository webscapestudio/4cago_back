<?php

namespace App\Http\Controllers\News\Favourite;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke($id)
    {
        $new = News::find($id);
        if (Auth::user()->hasFavouritedNews($new)) :
            $new->favourite()->where('user_id', Auth::user()->id)->delete();
            return response()->json($new);
        endif;
        $new->favourite()->create(['user_id' => Auth::user()->id]);

        return response()->json($new);
    }
}
