<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.edit', compact('post', 'categories', 'tags'));
    }
}
