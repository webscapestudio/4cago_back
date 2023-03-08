<?php

namespace App\Http\Controllers\Admin\CategoryHelp;

use App\Http\Controllers\Controller;
use App\Models\CategoryHelp;

class ShowController extends Controller
{
    public function __invoke($slug)
    {
        $categories_asked_question = CategoryHelp::whereSlug($slug)->firstOrFail();
        return view('admin.faq.categories_asked_questions.show', compact('categories_asked_question'));
    }
}
