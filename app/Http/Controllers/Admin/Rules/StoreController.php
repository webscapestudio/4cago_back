<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Requests\Admin\Rules\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Rules;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $rules = Rules::create([
            'title' =>  $request->title,
            'content' =>  $request->content,
            'published' =>  $request->published,
        ]);
        $rules->save();

        return redirect()->route('admin.rule.index');
    }
}
