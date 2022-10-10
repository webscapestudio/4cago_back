<?php

namespace App\Http\Controllers\Personal\Post;


use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.create', compact('categories', 'tags'));
    }
}
