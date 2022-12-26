<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Requests\Admin\Help\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Help;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $asked_question = Help::create([
            'title' =>  $request->title,
            'content' =>  $request->content,
            'published' =>  $request->published,
            'category_help_id' =>  $request->category_help_id,
        ]);
        $asked_question->save($data);

        return redirect()->route('admin.asked_question.index');
    }
}
