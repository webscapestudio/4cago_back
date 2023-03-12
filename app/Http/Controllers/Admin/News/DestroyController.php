<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;


class DestroyController extends Controller
{
    public function __invoke($slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();
        $news->comments()->where('commentable_id', $news->id)->delete();
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
