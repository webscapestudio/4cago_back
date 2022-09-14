<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CreateController extends Controller
{
    public function __invoke()
    {
        $category = Category::all();
        return view('admin.posts.index', compact('category'));
    }

}
