<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $tag = Tag::whereSlug($slug)->firstOrFail();
        return view('admin.tags.show', compact('tag'));
    }
}
