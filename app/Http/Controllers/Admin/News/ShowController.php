<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;


class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();
        return view('admin.news.show', compact('news'));
    }
}
