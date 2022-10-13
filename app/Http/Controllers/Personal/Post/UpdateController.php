<?php

namespace App\Http\Controllers\Personal\Post;


use App\Http\Requests\Personal\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $data = $request->except('slug');
        $post = $this->service->update($data, $post);

        return redirect()->route('personal.main.index');
    }
}
