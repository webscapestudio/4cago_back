<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rules\UpdateRequest;
use App\Models\Help;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Help $asked_question)
    {
        $data = $request->validated();

        $asked_question->update($data, ['category_help_id' =>  $request->category_help_id]);
        $asked_question->update(['category_help_id' =>  $request->category_help_id]);
        return view('admin.faq.asked_questions.show', compact('asked_question'));
    }
}
