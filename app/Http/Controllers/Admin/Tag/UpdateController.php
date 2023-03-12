<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $slug)
    {
        $tag = Tag::whereSlug($slug)->firstOrFail();
        $data = $request->validated();
        $tag->update($data);
        return view('admin.tags.show', compact('tag'));
    }
}
