<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;


class ShowController extends Controller
{
    public function __invoke(News $news)
    {
        return view('admin.news.show', compact('news'));
    }
}
