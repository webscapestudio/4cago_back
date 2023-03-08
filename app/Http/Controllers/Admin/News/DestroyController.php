<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;


class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
