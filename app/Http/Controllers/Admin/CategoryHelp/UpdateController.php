<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryHelp\UpdateRequest;
use App\Models\CategoryHelp;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $slug)
    {
        $categories_asked_question = CategoryHelp::whereSlug($slug)->firstOrFail();
        $data = $request->validated();
        $categories_asked_question->update($data);
        return redirect()->route('admin.category_question.index');
    }
}
