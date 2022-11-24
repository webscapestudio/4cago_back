<?php

namespace App\Http\Controllers\News\Favourite;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function __invoke(News $news)
    {
        $news = News::find($news->id);
        if (Auth::user()->hasFavouritedNews($news)) :
            $news->favourite()->where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
        endif;
        $news->favourite()->create(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }
}
