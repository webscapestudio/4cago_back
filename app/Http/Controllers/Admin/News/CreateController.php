<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.news.create', compact('categories', 'tags'));
    }
}
