<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;
use App\Models\Help;


class EditController extends Controller
{
    public function __invoke($slug)
    {
        $asked_question = Help::whereSlug($slug)->firstOrFail();
        $categories_help = CategoryHelp::all();
        return view('admin.faq.asked_questions.edit', [
            'asked_questions' => [],
        ], compact('asked_question', 'categories_help'));
    }
}
