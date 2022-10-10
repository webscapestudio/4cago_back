<?php

namespace App\Http\Controllers\Personal\Post;


use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.create', compact('categories', 'posts', 'tags'));
    }
}
