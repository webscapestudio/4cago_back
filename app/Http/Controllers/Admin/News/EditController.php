<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke($slug)
    {
        $tags = Tag::all();
        $news = News::whereSlug($slug)->firstOrFail();
        return view('admin.news.edit',  compact('news', 'tags'));
    }
}
