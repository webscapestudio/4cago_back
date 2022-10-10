<?php

namespace App\Http\Controllers\Personal\Post;


use App\Http\Requests\Personal\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data, $post);

        return view('personal.posts.show', compact('post'));
    }
}
