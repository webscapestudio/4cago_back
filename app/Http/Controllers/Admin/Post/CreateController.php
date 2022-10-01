<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }
 
}
