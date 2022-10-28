<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['postsCount'] = Post::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
