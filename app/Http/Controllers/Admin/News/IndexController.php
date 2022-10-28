<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }
}
