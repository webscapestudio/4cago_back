<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __invoke(Request $request)
    {
        $news_all = News::where('published', '1')->paginate(6);
        return response()->json($news_all);
    }
}
