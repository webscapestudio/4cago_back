<?php

namespace App\Http\Controllers\Personal\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post, Category $category)
    {
        $posts = Post::all();

        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.edit', [
            'category' => $category,
            'categories'  => Category::with('childrenCategories')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ], compact('categories', 'posts', 'post', 'tags'));
    }
}
