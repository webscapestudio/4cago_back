<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(News $news)
    {
        $tags = Tag::all();
        return view('admin.news.edit',  compact('news', 'tags'));
    }
}
