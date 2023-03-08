<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;


class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $asked_question = Help::whereSlug($slug)->firstOrFail();
        return view('admin.faq.asked_questions.show', compact('asked_question'));
    }
}
